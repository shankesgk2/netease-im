<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-10
 * Time: 15:06
 */

namespace shankesgk2\NetEaseIM\Traits;

use shankesgk2\NetEaseIM\Exception\CodeStatus;

/**
 * 消息功能
 * @package shankesgk2\NetEaseIM\Traits
 */
Trait MessageTrait
{
    /**
     * 消息类型
     *  0 表示文本消息,
     *  1 表示图片，
     *  2 表示语音，
     *  3 表示视频，
     *  4 表示地理位置信息，
     *  6 表示文件，
     *  100 自定义消息类型
     */
    private $MSG_TYPE_TXT = 0;
    private $MSG_TYPE_IMG = 1;
    private $MSG_TYPE_AUDIO = 2;
    private $MSG_TYPE_VIDEO = 3;
    private $MSG_TYPE_LOC = 4;
    private $MSG_TYPE_FILE = 5;
    private $MSG_TYPE_CUSTOM = 100;
    private $MSG_OPE_POINT_TO_POINT = 0;
    private $nimserver_msg_send_msg = '/nimserver/msg/sendMsg.action';
    private $nimserver_msg_send_batch_msg = '/nimserver/msg/sendBatchMsg.action';
    private $nimserver_msg_send_attach_msg = '/nimserver/msg/sendAttachMsg.action';
    private $nimserver_msg_send_batch_attach_msg = '/nimserver/msg/sendBatchAttachMsg.action';
    private $nimserver_msg_upload = '/nimserver/msg/upload.action';
    private $nimserver_msg_file_upload = '/nimserver/msg/fileUpload.action';
    private $nimserver_msg_recall = '/nimserver/msg/recall.action';
    private $nimserver_msg_broadcast_msg = '/nimserver/msg/broadcastMsg.action';

    /**
     * 发送普通消息
     * @param string $from
     * @param string $ope 0：点对点个人消息，1：群消息，其他返回414
     * @param string $to ope==0是表示accid即用户id，ope==1表示tid即群id
     * @param string $type 0 表示文本消息,
     *                       1 表示图片，
     *                       2 表示语音，
     *                       3 表示视频，
     *                       4 表示地理位置信息，
     *                       6 表示文件，
     *                       100 自定义消息类型
     * @param array $body
     * @param array $option 发消息时特殊指定的行为选项,Json格式，可用于指定消息的漫游，存云端历史，发送方多端同步，推送，消息抄送等特殊行为;option中字段不填时表示默认值
     *                       option示例:
     *                       {"push":false,"roam":true,"history":false,"sendersync":true,"route":false,"badge":false,"needPushNick":true}
     *
     *                       字段说明：
     *                       1. roam: 该消息是否需要漫游，默认true（需要app开通漫游消息功能）；
     *                       2. history: 该消息是否存云端历史，默认true；
     *                       3. sendersync: 该消息是否需要发送方多端同步，默认true；
     *                       4. push: 该消息是否需要APNS推送或安卓系统通知栏推送，默认true；
     *                       5. route: 该消息是否需要抄送第三方；默认true (需要app开通消息抄送功能);
     *                       6. badge:该消息是否需要计入到未读计数中，默认true;
     *                       7. needPushNick: 推送文案是否需要带上昵称，不设置该参数时默认true;
     * @param string $pushContent ios推送内容，不超过150字符，option选项中允许推送（push=true），此字段可以指定推送内容
     * @param array $payload ios 推送对应的payload,必须是JSON,不能超过2k字符
     * @param array $ext 开发者扩展字段，长度限制1024字符
     * @param array $forcePushList 发送群消息时的强推（@操作）用户列表
     *                                 格式为JSONArray，如["accid1","accid2"]。若forcepushall为true，则forcepushlist为除发送者外的所有有效群成员
     * @param string $forcePushContent 发送群消息时，针对强推（@操作）列表forcepushlist中的用户，强制推送的内容
     * @param bool $forcePushAll 发送群消息时，强推（@操作）列表是否为群里除发送者外的所有有效成员，true或false，默认为false
     *
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function messageSendMsg(
        $from,
        $ope,
        $to,
        $type,
        array $body,
        array $option = [],
        $pushContent = '',
        array $payload = [],
        array $ext = [],
        array $forcePushList = [],
        $forcePushContent = '',
        $forcePushAll = false
    )
    {
        $optionDefault = [
            'push' => true,
            'roam' => true,
            'history' => true,
            'sendersync' => true,
            'route' => true,
            'badge' => true,
            'needPushNick' => true
        ];
        if (empty($option)) {
            $option = $optionDefault;
        } else {
            $option = array_merge($optionDefault, $option);
        }
        $data = [
            'from' => $from,
            'ope' => $ope,
            'to' => $to,
            'type' => $type,
            'body' => json_encode($body),
            'option' => json_encode($option),
            'pushcontent' => $pushContent,
            'ext' => json_encode($ext),
            'forcepush' => json_encode($forcePushList),
            'forcepushcontent' => $forcePushContent,
            'forcepushall' => $forcePushAll
        ];
        $data = $this->arrCheckAndPush($data, 'payload', $payload);
        $result = $this->post($this->nimserver_msg_send_msg, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 给个人发送文本消息封装
     * @param string $from 发送者accid
     * @param string $to 个人用户accid
     * @param string $msg 消息内容
     * @param string $pushContent ios推送内容
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function messageSendTxtMsgToUser($from, $to, $msg, $pushContent)
    {
        return $this->messageSendMsg(
            $from,
            $this->MSG_OPE_POINT_TO_POINT,
            $to,
            $this->MSG_TYPE_TXT,
            ['msg' => $msg],
            [],
            $pushContent
        );
    }

    /**
     * 给个人发送自定义消息封装
     * @param string $from 发送者accid
     * @param string $to 个人用户accid
     * @param string $msg 消息内容
     * @param string $pushContent ios推送内容
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function messageSendCustomMsgToUser($from, $to, $msg, $pushContent)
    {
        return $this->messageSendMsg(
            $from,
            $this->MSG_OPE_POINT_TO_POINT,
            $to,
            $this->MSG_TYPE_CUSTOM,
            ['msg' => $msg],
            [],
            $pushContent
        );
    }

    /**
     * 批量发送点对点普通消息
     * 1.给用户发送点对点普通消息，包括文本，图片，语音，视频，地理位置和自定义消息。
     * 2.最大限500人，只能针对个人,如果批量提供的帐号中有未注册的帐号，会提示并返回给用户。
     * 3.此接口受频率控制，一个应用一分钟最多调用120次，超过会返回416状态码，并且被屏蔽一段时间；
     * 具体消息参考官方文档。
     * @param $fromAccid
     * @param $toAccids
     * @param $type
     * @param array $body
     * @param array $option
     * @param string $pushcontent
     * @param string $payload
     * @param array $ext
     * @param string $bid
     * @param string $useYidun
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgSendBatchMsg($fromAccid, $toAccids, $type, $body, $option = [], $pushcontent = '', $payload = '', $ext = [], $bid = '', $useYidun = '')
    {
        $optionDefault = [
            'push' => true,
            'roam' => true,
            'history' => true,
            'sendersync' => true,
            'route' => true,
            'badge' => true,
            'needPushNick' => true
        ];
        if (empty($option)) {
            $option = $optionDefault;
        } else {
            $option = array_merge($optionDefault, $option);
        }
        $data = [
            'fromAccid' => $fromAccid,
            'toAccids' => $toAccids,
            'type' => $type,
            'body' => json_encode($body),
            'option' => json_encode($option),
            'pushcontent' => $pushcontent,
            'ext' => json_encode($ext),
            'bid' => $bid,
            'useYidun' => (int)$useYidun
        ];
        $data = $this->arrCheckAndPush($data, 'payload', $payload);
        $result = $this->post($this->nimserver_msg_send_batch_msg, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 发送自定义系统通知
     * 1.自定义系统通知区别于普通消息，方便开发者进行业务逻辑的通知；
     * 2.目前支持两种类型：点对点类型和群类型（仅限高级群），根据msgType有所区别。
     * 应用场景：如某个用户给另一个用户发送好友请求信息等，具体attach为请求消息体，第三方可以自行扩展，建议是json格式
     * @param string $from 发送者accid
     * @param int $msgtype 0：点对点自定义通知，1：群消息自定义通知，其他返回414
     * @param string $to msgtype==0是表示accid即用户id，msgtype==1表示tid即群id
     * @param array $attach
     * @param array $option
     * @param string $pushcontent
     * @param string $payload
     * @param string $sound
     * @param int $save
     * @return bool|array true 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgSendAttachMsg($from, int $msgtype, $to, array $attach, array $option = [], $pushcontent = '', $payload = '', $sound = '', $save = 2)
    {
        $optionDefault = [
            'badge' => true,
            'needPushNick' => false,
            'route' => true
        ];
        if (empty($option)) {
            $option = $optionDefault;
        } else {
            $option = array_merge($optionDefault, $option);
        }

        $data = [
            'from' => $from,
            'msgtype' => $msgtype,
            'to' => $to,
            'attach' => json_encode($attach),
            'pushcontent' => $pushcontent,
            'sound' => $sound,
            'save' => $sound,
            'option' => json_encode($option),
        ];
        $data = $this->arrCheckAndPush($data, 'payload', $payload);
        $result = $this->post($this->nimserver_msg_send_attach_msg, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 批量发送点对点自定义系统通知
     * 1.系统通知区别于普通消息，应用接收到直接交给上层处理，客户端可不做展示；
     * 2.目前支持类型：点对点类型；
     * 3.最大限500人，只能针对个人,如果批量提供的帐号中有未注册的帐号，会提示并返回给用户；
     * 4.此接口受频率控制，一个应用一分钟最多调用120次，超过会返回416状态码，并且被屏蔽一段时间；
     * 应用场景：如某个用户给另一个用户发送好友请求信息等，具体attach为请求消息体，第三方可以自行扩展，建议是json格式
     * @param string $fromAccid 发送者accid
     * @param array $toAccids ["aaa","bbb"]（JSONArray对应的accid，如果解析出错，会报414错误），最大限500人
     * @param array $attach 自定义通知内容，第三方组装的字符串，建议是JSON串，最大长度4096字符
     * @param string $pushcontent
     * @param string $payload
     * @param string $sound
     * @param int $save
     * @param array $option
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgSendBatchAttachMsg($fromAccid, $toAccids, $attach, $option = [], $pushcontent = '', $payload = '', $sound = '', $save = 2)
    {
        $optionDefault = [
            'badge' => true,
            'needPushNick' => false,
            'route' => true
        ];
        if (empty($option)) {
            $option = $optionDefault;
        } else {
            $option = array_merge($optionDefault, $option);
        }
        $data = [
            'fromAccid' => $fromAccid,
            'toAccids' => json_encode($toAccids),
            'attach' => json_encode($attach),
            'pushcontent' => $pushcontent,
            'sound' => $sound,
            'save' => (int)$save,
            'option' => json_encode($option)
        ];
        $data = $this->arrCheckAndPush($data, 'payload', $payload);
        $result = $this->post($this->nimserver_msg_send_batch_attach_msg, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 文件上传
     * 文件上传，字符流需要base64编码，最大15M。
     * @param $content
     * @param string $type
     * @param string $ishttps
     * @param string $expireSec
     * @param string $tag
     * @return string|array $result['url'] 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgUpload($content, $type = '', $ishttps = '', $expireSec = '', $tag = '')
    {
        $result = $this->post($this->nimserver_msg_upload, [
            'content' => $content,
            'type' => $type,
            'ishttps' => $ishttps,
            'expireSec' => $expireSec,
            'tag' => $tag
        ]);
        if ($result['code'] == 200) {
            return $result['url'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 文件上传（multipart方式）
     * 文件上传，最大15M
     * @param $content
     * @param string $type
     * @param string $ishttps
     * @param string $expireSec
     * @param string $tag
     * @return string|array $result['url'] 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgFileUpload($content, $type = '', $ishttps = '', $expireSec = '', $tag = '')
    {
        $result = $this->post($this->nimserver_msg_file_upload, [
            'content' => $content,
            'type' => $type,
            'ishttps' => $ishttps,
            'expireSec' => $expireSec,
            'tag' => $tag
        ]);
        if ($result['code'] == 200) {
            return $result['url'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 消息撤回
     * 消息撤回接口，可以撤回一定时间内的点对点与群消息
     * @param string $deleteMsgid 要撤回消息的msgid
     * @param int $timetag 要撤回消息的创建时间
     * @param int $type 7:表示点对点消息撤回，8:表示群消息撤回，其它为参数错误
     * @param string $from 发消息的accid
     * @param string $to 如果点对点消息，为接收消息的accid,如果群消息，为对应群的tid
     * @param string $msg 可以带上对应的描述
     * @param string $ignoreTime 1表示忽略撤回时间检测，其它为非法参数，如果需要撤回时间检测，不填即可
     * @return bool|array true 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgRecall($deleteMsgid, $timetag, $type, $from, $to, $msg = '', $ignoreTime = '')
    {
        $data = [
            'deleteMsgid' => $deleteMsgid,
            'timetag' => $timetag,
            'type' => $type,
            'from' => $from,
            'to' => $to,
            'msg' => $msg
        ];
        $data = $this->arrCheckAndPush($data, 'ignoreTime', $ignoreTime);
        $result = $this->post($this->nimserver_msg_recall, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 发送广播消息
     * 1、广播消息，可以对应用内的所有用户发送广播消息，广播消息目前暂不支持第三方推送（APNS、小米、华为等）；
     * 2、广播消息支持离线存储，并可以自定义设置离线存储的有效期，最多保留最近100条离线广播消息；
     * 3、此接口受频率控制，一个应用一分钟最多调用10次，一天最多调用1000次，超过会返回416状态码；
     * 4、该功能目前需申请开通，详情可咨询您的客户经理。
     * @param string $body 广播消息内容，最大4096字符
     * @param string $from 发送者accid
     * @param bool $isOffline 是否存离线，true或false，默认false
     * @param int $ttl 存离线状态下的有效期，单位小时，默认7天
     * @param array $targetOs 目标客户端，默认所有客户端，jsonArray，格式：['ios','aos','pc','web','mac']
     * @return array $result['msg'] 或 ['error'=>true,'message'=>$message]
     */
    public function messageMsgBroadcastMsg($body, $from = '', $isOffline = false, $ttl = 168, $targetOs = [])
    {
        $result = $this->post($this->nimserver_msg_broadcast_msg, [
            "body" => $body,
            "from" => $from,
            "isOffline" => $isOffline,
            "ttl" => $ttl,
            "targetOs" => $targetOs
        ]);
        if ($result['code'] == 200) {
            return $result['msg'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }
}
