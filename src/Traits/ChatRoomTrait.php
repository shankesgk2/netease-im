<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-11
 * Time: 11:10
 */

namespace shankesgk2\NetEaseIM\Traits;

use shankesgk2\NetEaseIM\Exception\CodeStatus;
use shankesgk2\NetEaseIM\Exception\NetEaseIMException;

/**
 * 聊天室
 * @package shankesgk2\NetEaseIM\Traits
 */
trait ChatRoomTrait
{
    private $MEMBER_ROLE_OPT_ADMIN = 1; // 管理员
    private $MEMBER_ROLE_OPT_CUSTOM = 2; // 普通用户
    private $MEMBER_ROLE_OPT_BLACK_LIST = -1; // 黑名单
    private $MEMBER_ROLE_OPT_BLOCK = -2; // 禁言
    private $CLIENT_TYPE_WEB_LINK = 1;
    private $CLIENT_TYPE_COMMON_LINK = 2;
    private $CHATROOM_MSG_TYPE_TXT = 0;         // 文本消息
    private $CHATROOM_MSG_TYPE_IMG = 1;         // 图片消息
    private $CHATROOM_MSG_TYPE_AUDIO = 2;       // 语音消息
    private $CHATROOM_MSG_TYPE_VIDEO = 3;       // 视频消息
    private $CHATROOM_MSG_TYPE_LOC = 4;         // 地理位置消息
    private $CHATROOM_MSG_TYPE_FILE = 6;        // 文件消息
    private $CHATROOM_MSG_TYPE_TIPS = 10;       // tips 消息
    private $CHATROOM_MSG_TYPE_CUSTOM = 100;    // 自定义消息

    private $nimserver_chatroom_create_action = '/nimserver/chatroom/create.action';
    private $nimserver_chatroom_get_action = '/nimserver/chatroom/get.action';
    private $nimserver_chatroom_get_batch_action = '/nimserver/chatroom/getBatch.action';
    private $nimserver_chatroom_update_action = '/nimserver/chatroom/update.action';
    private $nimserver_chatroom_toggle_close_stat_action = '/nimserver/chatroom/toggleCloseStat.action';
    private $nimserver_chatroom_set_member_role_action = '/nimserver/chatroom/setMemberRole.action';
    private $nimserver_chatroom_request_addr_action = '/nimserver/chatroom/requestAddr.action';
    private $nimserver_chatroom_send_msg_action = '/nimserver/chatroom/sendMsg.action';
    private $nimserver_chatroom_add_robot_action = '/nimserver/chatroom/addRobot.action';
    private $nimserver_chatroom_remove_robot_action = '/nimserver/chatroom/removeRobot.action';
    private $nimserver_chatroom_temporary_mute = '/nimserver/chatroom/temporaryMute.action';
    private $nimserver_chatroom_queue_init = '/nimserver/chatroom/queueInit.action';
    private $nimserver_chatroom_queue_offer = '/nimserver/chatroom/queueOffer.action';
    private $nimserver_chatroom_queue_poll = '/nimserver/chatroom/queuePoll.action';
    private $nimserver_chatroom_queue_list = '/nimserver/chatroom/queueList.action';
    private $nimserver_chatroom_queue_drop = '/nimserver/chatroom/queueDrop.action';
    private $nimserver_chatroom_mute_room = '/nimserver/chatroom/muteRoom.action';
    private $nimserver_stats_chatroom_topn = '/nimserver/stats/chatroom/topn.action';
    private $nimserver_chatroom_members_by_page = '/nimserver/chatroom/membersByPage.action';
    private $nimserver_chatroom_query_member = '/nimserver/chatroom/queryMembers.action';
    private $nimserver_chatroom_update_my_room_role = '/nimserver/chatroom/updateMyRoomRole.action';
    private $nimserver_chatroom_queue_batch_update_elements = '/nimserver/chatroom/queueBatchUpdateElements.action';
    private $nimserver_chatroom_query_user_room_ids = '/nimserver/chatroom/queryUserRoomIds.action';

    /**
     * 创建聊天室
     * @param string $creator 聊天室属主的账号accid
     * @param string $name 聊天室名称，长度限制128个字符
     * @param string $announcement 公告，长度限制4096个字符
     * @param string $broadcastUrl 直播地址，长度限制1024个字符
     * @param array $ext 扩展字段，最长4096字符
     * @return array
     */
    public function chatRoomCreate($creator, $name, $announcement, $broadcastUrl, $ext = [])
    {
        $data = [
            'creator' => $creator,
            'name' => $name,
            'announcement' => $announcement,
            'broadcasturl' => $broadcastUrl,
            'ext' => json_encode($ext)
        ];
        $result = $this->post($this->nimserver_chatroom_create_action, $data);
        if ($result['code'] == 200) {
            return $result['chatroom'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 查询聊天室信息
     * @param int $roomid 聊天室id
     * @param bool $needOnlineUserCount 是否需要返回在线人数，true或false，默认false
     * @return array
     */
    public function chatRoomGet(int $roomid, $needOnlineUserCount = false)
    {
        $data = ['roomid' => (int)$roomid, 'needOnlineUserCount' => $this->boolConvertToString($needOnlineUserCount)];
        $result = $this->post($this->nimserver_chatroom_get_action, $data);
        if ($result['code'] == 200) {
            return $result['chatroom'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 批量查询聊天室信息
     * @param array $roomids 多个roomid，格式为：["6001","6002","6003"]（JSONArray对应的roomid，如果解析出错，会报414错误），限20个roomid
     * @param bool $needOnlineUserCount 是否需要返回在线人数，true或false，默认false
     * @return array
     */
    public function chatRoomGetBatch(array $roomids, bool $needOnlineUserCount = false)
    {
        $result = $this->post($this->nimserver_chatroom_get_batch_action, [
            'roomids' => json_encode($roomids),
            'needOnlineUserCount' => $this->boolConvertToString($needOnlineUserCount)
        ]);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 更新聊天室信息
     * @param int $roodId 聊天室id
     * @param string $name 聊天室名称 长度限制128个字符
     * @param string $announcement 公告，长度限制4096个字符
     * @param string $broadcastUrl 直播地址，长度限制1024个字符
     * @param array $ext 扩展字段，长度限制4096个字符
     * @param bool $needNotify true或false,是否需要发送更新通知事件，默认true
     * @param array $notifyExt 通知事件扩展字段，长度限制2048
     * @return array
     */
    public function chatRoomUpdate(
        $roodId,
        $name = '',
        $announcement = '',
        $broadcastUrl = '',
        $ext = [],
        $needNotify = true,
        $notifyExt = []
    )
    {
        $data = [
            'roomid' => $roodId,
            'name' => $name,
            'announcement' => $announcement,
            'broadcasturl' => $broadcastUrl,
            'ext' => json_encode($ext),
            'needNotify' => $this->boolConvertToString($needNotify),
            'notifyExt' => json_encode($notifyExt)
        ];
        $result = $this->post($this->nimserver_chatroom_update_action, $data);
        if ($result['code'] == 200) {
            return $result['chatroom'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 修改聊天室开/关闭状态
     * @param int $roomid 聊天室id
     * @param string $operator 操作者账号，必须是创建者才可以操作
     * @param bool $valid true或false，false:关闭聊天室；true:打开聊天室
     * @return array
     */
    public function chatRoomToggleCloseStatus(int $roomid, $operator, $valid)
    {
        $data = [
            'valid' => $this->boolConvertToString($valid),
            'roomid' => (int)$roomid,
            'operator' => $operator
        ];
        $result = $this->post($this->nimserver_chatroom_toggle_close_stat_action, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 设置聊天室内用户角色
     * @param int $roomid 聊天室id
     * @param string $operator 操作者账号accid
     * @param string $target 被操作者账号accid
     * @param string $opt 操作：
     *                          1: 设置为管理员，operator必须是创建者
     *                          2:设置普通等级用户，operator必须是创建者或管理员
     *                          -1:设为黑名单用户，operator必须是创建者或管理员
     *                          -2:设为禁言用户，operator必须是创建者或管理员
     * @param bool $optValue true或false，true:设置；false:取消设置
     * @param array $notifyExt 通知扩展字段，长度限制2048，请使用json格式
     *
     * 备注：
     * 返回的type字段可能为：
     * LIMITED,          //受限用户,黑名单+禁言
     * COMMON,           //普通固定成员
     * CREATOR,          //创建者
     * MANAGER,          //管理员
     * TEMPORARY,        //临时用户,非固定成员
     * @throws NetEaseIMException
     * @return array
     */
    public function chatRoomSetMemberRole(int $roomid, $operator, $target, $opt, $optValue, $notifyExt = [])
    {
        $data = [
            'roomid' => (int)$roomid,
            'operator' => $operator,
            'target' => $target,
            'opt' => $opt,
            'optvalue' => $this->boolConvertToString($optValue),
        ];
        if (!in_array($opt, [
            $this->MEMBER_ROLE_OPT_ADMIN,
            $this->MEMBER_ROLE_OPT_CUSTOM,
            $this->MEMBER_ROLE_OPT_BLACK_LIST,
            $this->MEMBER_ROLE_OPT_BLOCK,
        ])) {
            throw new NetEaseIMException('opt not support');
        }
        $data = $this->arrCheckAndPush($data, 'notifyExt', $notifyExt);
        $result = $this->post($this->nimserver_chatroom_set_member_role_action, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 请求聊天室地址与令牌
     * @param int $roomid 聊天室id
     * @param string $accId 进入聊天室的账号
     * @param int $clientType 1:weblink; 2:commonlink, 默认1
     * @return array
     */
    public function chatRoomRequestAddress(int $roomid, $accId, $clientType = null)
    {
        $data = [
            'roomid' => (int)$roomid,
            'accid' => $accId,
            'clienttype' => $clientType === null ? $this->CLIENT_TYPE_WEB_LINK : $clientType
        ];
        $result = $this->post($this->nimserver_chatroom_request_addr_action, $data);
        if ($result['code'] == 200) {
            return $result['addr'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 发送聊天室消息
     * @param int $roomid 聊天室id
     * @param string $msgId 客户端消息id，使用uuid等随机串，msgId相同的消息会被客户端去重
     * @param string $fromAccId 消息发出者的账号accid
     * @param int $msgType 消息类型：
     *                           0: 表示文本消息，
     *                           1: 表示图片，
     *                           2: 表示语音，
     *                           3: 表示视频，
     *                           4: 表示地理位置信息，
     *                           6: 表示文件，
     *                           10: 表示Tips消息，
     *                           100: 自定义消息类型
     * @param int $resendFlag 重发消息标记，0：非重发消息，1：重发消息，如重发消息会按照msgid检查去重逻辑
     * @param array $attach 消息内容，格式同消息格式示例中的body字段,长度限制2048字符
     * @param array $ext 消息扩展字段，内容可自定义，请使用JSON格式，长度限制4096
     * @param bool $highPriority 可选，true表示是高优先级消息，云信会优先保障投递这部分消息；false表示低优先级消息。默认false。强烈建议应用恰当选择参数，以便在必要时，优先保障应用内的高优先级消息的投递。若全部设置为高优先级，则等于没有设置。
     * @return array
     */
    public function chatRoomSendMsg(
        int $roomid,
        $msgId,
        $fromAccId,
        $msgType = null,
        $resendFlag = 0,
        $attach = [],
        $ext = [],
        $highPriority = false
    )
    {
        $data = [
            'roomid' => (int)$roomid,
            'msgId' => $msgId,
            'fromAccid' => $fromAccId,
            'msgType' => $msgType === null ? $this->CHATROOM_MSG_TYPE_TXT : $msgType,
            'resendFlag' => $resendFlag,
            'attach' => json_encode($attach),
            'ext' => json_encode($ext),
            'highPriority' => $highPriority
        ];
        $result = $this->post($this->nimserver_chatroom_send_msg_action, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 发送聊天室文字消息封装
     * @param  int $roomid 聊天室id
     * @param    string $msgId 客户端消息id，使用uuid等随机串，msgId相同的消息会被客户端去重
     * @param   string $fromAccId 消息发出者的账号accid
     * @param    string $msg 文本消息内容
     * @param int $resendFlag 重发消息标记，0：非重发消息，1：重发消息，如重发消息会按照msgid检查去重逻辑
     * @param array $ext 消息扩展字段，内容可自定义，请使用JSON格式，长度限制4096
     * @return array
     */
    public function chatRoomSendTxtMessage(
        int $roomid,
        $msgId,
        $fromAccId,
        $msg,
        $resendFlag = 0,
        $ext = []
    )
    {
        return $this->chatRoomSendMsg(
            (int)$roomid,
            $msgId,
            $fromAccId,
            $this->CHATROOM_MSG_TYPE_TXT,
            $resendFlag,
            ['msg' => $msg],
            $ext
        );
    }

    /**
     * 往聊天室内添加机器人，机器人过期时间为24小时。
     * @param int $roomid 聊天室id
     * @param array $accIds 机器人账号accid列表，必须是有效账号，账号数量上限100个
     * @param array $roleExt 机器人信息扩展字段，请使用json格式，长度4096字符
     * @param array $notifyExt 机器人进入聊天室通知的扩展字段，请使用json格式，长度2048字符
     *
     * @return array
     */
    public function chatRoomAddRobot(int $roomid, array $accIds, $roleExt = [], $notifyExt = [])
    {
        $data = [
            'roomid' => (int)$roomid,
            'accids' => json_encode($accIds),
            'roleExt' => json_encode($roleExt),
            'notifyExt' => json_encode($notifyExt),
        ];
        $result = $this->post($this->nimserver_chatroom_add_robot_action, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 从聊天室内删除机器人
     * @param int $roomid 聊天室id
     * @param array $accIds 机器人账号accid列表，必须是有效账号，账号数量上限100个
     * @return array
     */
    public function chatRoomRemoveRobot(int $roomid, array $accIds)
    {
        $data = [
            'roomid' => (int)$roomid,
            'accids' => json_encode($accIds),
        ];
        $result = $this->post($this->nimserver_chatroom_remove_robot_action, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 将聊天室内成员设置为临时禁言
     * @param int $roomid
     * @param string $operator 操作者accid,必须是管理员或创建者
     * @param string $target 被禁言的目标账号accid
     * @param string $muteDuration 0:解除禁言;>0设置禁言的秒数，不能超过2592000秒(30天)
     * @param bool $needNotify 操作完成后是否需要发广播，true或false，默认true
     * @param array $notifyExt 通知广播事件中的扩展字段，长度限制2048字符
     * @return array
     */
    public function chatRoomTemporaryMute(int $roomid, $operator, $target, $muteDuration, $needNotify = true, $notifyExt = [])
    {
        $data = [
            'roomid' => (int)$roomid,
            'operator' => $operator,
            'target' => $target,
            'muteDuration' => $muteDuration,
            'needNotify' => $this->boolConvertToString($needNotify),
            'notifyExt' => json_encode($notifyExt)
        ];
        $result = $this->post($this->nimserver_chatroom_temporary_mute, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 往聊天室有序队列中新加或更新元素
     * @param int $roomid 聊天室id
     * @param string $key elementKey,新元素的UniqKey,长度限制128字符
     * @param string $value elementValue,新元素内容，长度限制4096字符
     * @param string $operator 提交这个新元素的操作者accid，默认为该聊天室的创建者，若operator对应的帐号不存在，会返回404错误。若指定的operator不在线，则添加元素成功后的通知事件中的操作者默认为聊天室的创建者；若指定的operator在线，则通知事件的操作者为operator。
     * @param string $transient 这个新元素的提交者operator的所有聊天室连接在从该聊天室掉线或者离开该聊天室的时候，提交的元素是否需要删除。true：需要删除；false：不需要删除。默认false。当指定该参数为true时，若operator当前不在该聊天室内，则会返回403错误。
     * @return array|bool
     */
    public function chatRoomQueueOffer(int $roomid, $key, $value, $operator = null, $transient = null)
    {
        $data = [
            'roomid' => (int)$roomid,
            'key' => $key,
            'value' => $value,
        ];
        $data = $this->arrCheckAndPush($data, 'operator', $operator);
        $data = $this->arrCheckAndPush($data, 'transient', $transient);
        $result = $this->post($this->nimserver_chatroom_queue_offer, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 从队列中取出元素
     * @param int $roomid
     * @param string $key 目前元素的elementKey,长度限制128字符，不填表示取出头上的第一个
     * @return array
     */
    public function chatRoomQueuePoll(int $roomid, $key)
    {
        $data = [
            'roomid' => (int)$roomid,
            'key' => $key,
        ];
        $result = $this->post($this->nimserver_chatroom_queue_poll, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 排序列出队列中所有元素
     * @param int $roomid
     * @return array
     */
    public function chatRoomQueueList(int $roomid)
    {
        $result = $this->post($this->nimserver_chatroom_queue_list, ['roomid' => (int)$roomid]);
        if ($result['code'] == 200) {
            return $result['desc']['list'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 删除清理整个队列
     * @param int $roomid
     * @return array|bool
     */
    public function chatRoomQueueDrop(int $roomid)
    {
        $result = $this->post($this->nimserver_chatroom_queue_drop, ['roomid' => (int)$roomid]);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 初始化队列
     * @param int $roomid
     * @param int $sizeLimit 队列长度限制，0~1000
     * @throws NetEaseIMException
     * @return bool|array
     */
    public function chatRoomQueueInit(int $roomid, $sizeLimit)
    {
        if ($sizeLimit < 0 || $sizeLimit > 1000) {
            throw new NetEaseIMException('Queue length limit，0~1000');
        }
        $data = ['roomid' => (int)$roomid, 'sizeLimit' => $sizeLimit];
        $result = $this->post($this->nimserver_chatroom_queue_init, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 设置聊天室整体禁言状态（仅创建者和管理员能发言）
     * @param int $roomid 聊天室id
     * @param string $operator 操作者accid，必须是管理员或创建者
     * @param bool $mute true或false
     * @param bool $needNotify true或false，默认true
     * @param string $notifyExt 通知扩展字段
     * @return array|bool|mixed|null
     */
    public function chatRoomMuteRoom(int $roomid, string $operator, bool $mute = false, bool $needNotify = true, string $notifyExt = '')
    {
        $data = [
            'roomid' => (int)$roomid,
            'operator' => $operator,
            'mute' => $this->boolConvertToString($mute),
            'needNotify' => $this->boolConvertToString($needNotify),
            'notifyExt' => $notifyExt
        ];
        $result = $this->post($this->nimserver_chatroom_mute_room, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 查询聊天室统计指标TopN
     * @param int $topn topn值，可选值 1~500，默认值100
     * @param int|null $timestamp 需要查询的指标所在的时间坐标点，不提供则默认当前时间，单位秒/毫秒皆可
     * @param string $period 统计周期，可选值包括 hour/day, 默认hour
     * @param string $orderby 取排序值,可选值 active/enter/message,分别表示按日活排序，进入人次排序和消息数排序， 默认active
     * @return array
     */
    public function chatRoomTopn(int $topn = 100, int $timestamp = null, string $period = 'day', string $orderby = 'active')
    {
        $data = [
            'topn' => (int)$topn,
            'timestamp' => $timestamp === null ? time() : $timestamp,
            'period' => $period == 'hour' ? 'hour' : 'day',
            'orderby' => $orderby
        ];
        $result = $this->post($this->nimserver_stats_chatroom_topn, $data);
        if ($result['code'] == 200) {
            return $result['data'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 分页获取成员列表
     * @param int $roomid 聊天室id
     * @param int $type 需要查询的成员类型,0:固定成员;1:非固定成员;2:仅返回在线的固定成员
     * @param int $endtime 单位毫秒，按时间倒序最后一个成员的时间戳,0表示系统当前时间
     * @param int $limit 返回条数，<=100
     * @return array
     */
    public function chatRoomMembersByPage(int $roomid, int $type = 0, int $endtime = 0, int $limit = 100)
    {
        $data = [
            'roomid' => (int)$roomid,
            'type' => (int)$type,
            'endtime' => (int)$endtime,
            'limit' => (int)$limit
        ];
        $result = $this->post($this->nimserver_chatroom_members_by_page, $data);
        if ($result['code'] == 200) {
            return $result['desc']['data'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 批量获取在线成员信息
     * @param int $roomid 聊天室id
     * @param array $accids 账号列表，最多200条
     * @return array
     */
    public function chatRoomQueryMembers(int $roomid, array $accids)
    {
        $data = [
            'roomid' => (int)$roomid,
            'accids' => json_encode($accids)
        ];
        $result = $this->post($this->nimserver_chatroom_query_member, $data);
        if ($result['code'] == 200) {
            return $result['desc']['data'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 变更聊天室内的角色信息
     * @param int $roomid
     * @param string $accid
     * @param bool $save
     * @param bool $needNotify
     * @param string $notifyExt
     * @param string $nick
     * @param string $avator
     * @param string $ext
     * @return array|bool
     */
    public function chatRoomUpdateMyRoomRole(int $roomid, string $accid, bool $save = false, bool $needNotify = false, string $notifyExt = '', string $nick = '', string $avator = '', string $ext = '')
    {
        $data = [
            'roomid' => (int)$roomid,
            'accid' => $accid,
            'save' => $this->boolConvertToString($save),
            'needNotify' => $this->boolConvertToString($needNotify),
            'notifyExt' => $notifyExt,
            'nick' => $nick,
            'avator' => $avator,
            'ext' => $ext
        ];
        $result = $this->post($this->nimserver_chatroom_query_member, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 批量更新聊天室队列元素
     * @param int $roomid
     * @param string $operator
     * @param array $elements
     * @param bool $needNotify
     * @param string $notifyExt
     * @return array
     */
    public function chatRoomQueueBatchUpdateElements(int $roomid, string $operator, array $elements, bool $needNotify = true, string $notifyExt = '')
    {
        $data = [
            'roomid' => (int)$roomid,
            'operator' => $operator,
            'elements' => json_encode($elements),
            'needNotify' => $this->boolConvertToString($needNotify),
            'notifyExt' => $notifyExt
        ];
        $result = $this->post($this->nimserver_chatroom_queue_batch_update_elements, $data);
        if ($result['code'] == 200) {
            return $result['desc'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 查询用户创建的开启状态聊天室列表
     * @param string $creator 聊天室创建者accid
     * @return array
     */
    public function chatRoomQueryUserRoomIds(string $creator)
    {
        $result = $this->post($this->nimserver_chatroom_query_user_room_ids, ['creator' => $creator]);
        if ($result['code'] == 200) {
            return $result['desc']['roomids'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }
}
