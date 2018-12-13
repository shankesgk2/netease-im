<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-09
 * Time: 10:32
 */

namespace shankesgk2\NetEaseIM\Traits;

use shankesgk2\NetEaseIM\Exception\CodeStatus;
use shankesgk2\NetEaseIM\Exception\NetEaseIMException;

/**
 * 网易云通信ID 用户名片、设置、关系托管
 * @package shankesgk2\NetEaseIM\Traits
 */
trait UserTrait
{
    // 添加好友类型
    private $ADD_FRIEND_DIRECT = 1;           // 1直接加好友
    private $ADD_FRIEND_TYPE_REQUEST = 2;     // 2请求加好友
    private $ADD_FRIEND_TYPE_AGREE = 3;      // 3同意加好友
    private $ADD_FRIEND_TYPE_REJECT = 4;     // 4拒绝加好友

    // 好友操作类型
    private $SPECIAL_RELATION_TYPE_BLACK_LIST = 1; // 黑名单
    private $SPECIAL_RELATION_TYPE_MUTE = 2; // 静音

    //消息类型
    private $MSG_OPE_POINT_TO_POINT = 0;  // 点对点消息
    private $MSG_OPE_CHAT_ROOM = 1;    // 群消息

    private $nimserver_user_create_action = '/nimserver/user/create.action';
    private $nimserver_user_update_action = '/nimserver/user/update.action';
    private $nimserver_user_refresh_token_action = '/nimserver/user/refreshToken.action';
    private $nimserver_user_block_action = '/nimserver/user/block.action';
    private $nimserver_user_unblock_action = '/nimserver/user/unblock.action';
    private $nimserver_user_update_uinfo_action = '/nimserver/user/updateUinfo.action';
    private $nimserver_user_get_uinfos_action = '/nimserver/user/getUinfos.action';
    private $nimserver_user_set_donnop_action = '/nimserver/user/setDonnop.action';
    private $nimserver_user_set_mute_action = '/nimserver/user/mute.action';
    private $nimserver_user_set_mute_av_action = '/nimserver/user/muteAv.action';
    private $nimserver_friend_add_action = '/nimserver/friend/add.action';
    private $nimserver_friend_update_action = '/nimserver/friend/update.action';
    private $nimserver_friend_delete_action = '/nimserver/friend/delete.action';
    private $nimserver_friend_get_action = '/nimserver/friend/get.action';
    private $nimserver_user_set_special_relation_action = '/nimserver/user/setSpecialRelation.action';
    private $nimserver_user_list_black_and_mute_list_action = '/nimserver/user/listBlackAndMuteList.action';
    private $nimserer_msg_send_msg = 'https://api.netease.im/nimserver/msg/sendMsg.action';

    /**
     * 创建云信ID
     * 1.第三方帐号导入到云信平台；
     * 2.注意accid，name长度以及考虑管理秘钥token
     *
     * @param string $accid [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param string $name [云信ID昵称，最大长度64字节，用来PUSH推送时显示的昵称]
     * @param array $props [json属性，第三方可选填，最大长度1024字节]
     * @param string $icon [云信ID头像URL，第三方可选填，最大长度1024]
     * @param string $token [云信ID可以指定登录token值，最大长度128字节，并更新，如果未指定，会自动生成token，并在创建成功后返回]
     * @param string $sign 用户签名，最大长度256字符
     * @param string $email 用户email，最大长度64字符
     * @param string $birth 用户生日，最大长度16字符
     * @param string $mobile 用户mobile，最大长度32字符，只支持国内号码
     * @param int $gender 用户性别，0表示未知，1表示男，2女表示女，其它会报参数错误
     * @param string $ex 用户名片扩展字段，最大长度1024字符，用户可自行扩展，建议封装成JSON字符串
     * @return array
     */
    public function userCreateUserId(
        $accid,
        $name = '',
        $props = [],
        $icon = '',
        $token = '',
        $sign = '',
        $email = '',
        $birth = '',
        $mobile = '',
        $gender = 0,
        $ex = ''
    )
    {
        $data = [
            'accid' => $accid,
            'name' => $name,
            'props' => json_encode($props),
            'icon' => $icon,
            'token' => $token,
            'sign' => $sign,
            'email' => $email,
            'birth' => $birth,
            'mobile' => $mobile,
            'gender' => $gender,
            'ex' => $ex,
        ];
        $result = $this->post($this->nimserver_user_create_action, $data);
        if ($result['code'] == 200) {
            return $result['info'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 更新云信ID
     *
     * @param string $accid [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @param string $name [云信ID昵称，最大长度64字节，用来PUSH推送时显示的昵称]
     * @param array $props [json属性，第三方可选填，最大长度1024字节]
     * @param string $token [云信ID可以指定登录token值，最大长度128字节，并更新，如果未指定，会自动生成token，并在创建成功后返回]
     * @return array|bool
     */
    public function userUpdateUserId($accid, $name = '', $props = [], $token = '')
    {
        $data = ['accid' => $accid, 'name' => $name, 'props' => json_encode($props), 'token' => $token];
        $result = $this->post($this->nimserver_user_update_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 更新并获取新token
     * @param  $accid [云信ID，最大长度32字节，必须保证一个APP内唯一（只允许字母、数字、半角下划线_、@、半角点以及半角-组成，不区分大小写，会统一小写处理）]
     * @return array $result [返回array数组对象]
     */
    public function userRefreshToken($accid)
    {
        $data = ['accid' => $accid];
        $result = $this->post($this->nimserver_user_refresh_token_action, $data);
        if ($result['code'] == 200) {
            return $result['info'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 封禁网易云通信ID
     * @param string $accId
     * @param bool $needKick 是否踢掉被禁用户, 默认 false
     * @return bool|array
     */
    public function userBlockUser($accId, $needKick = false)
    {
        $data = ['accid' => $accId, 'needkick' => $needKick];
        $result = $this->post($this->nimserver_user_block_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 解封网易云通信ID
     * @param string $accId
     * @return bool|array
     */
    public function userUnBlockUser($accId)
    {
        $data = ['accid' => $accId];
        $result = $this->post($this->nimserver_user_unblock_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 更新用户名片
     * @param string $accId
     * @param string $name 用户昵称，最大长度64字符
     * @param string $icon 用户icon，最大长度1024字符
     * @param string $sign 用户签名，最大长度256字符
     * @param string $email 用户email，最大长度64字符
     * @param string $birth 用户生日，最大长度16字符
     * @param string $mobile 用户mobile，最大长度32字符，只支持国内号码
     * @param string $gender 用户性别，0表示未知，1表示男，2女表示女，其它会报参数错误
     * @param string $ex 用户名片扩展字段，最大长度1024字符，用户可自行扩展，建议封装成JSON字符串
     * @return bool|array
     */
    public function userUpdateUserInfo(
        $accId,
        $name = null,
        $icon = null,
        $sign = null,
        $email = null,
        $birth = null,
        $mobile = null,
        $gender = null,
        $ex = null
    )
    {
        $data = ['accid' => $accId];
        $params = ['name', 'icon', 'sign', 'email', 'birth', 'mobile', 'gender', 'ex'];
        foreach ($params as $param) {
            if (!is_null($$param)) {
                $data[$param] = $$param;
            }
        }
        $result = $this->post($this->nimserver_user_update_uinfo_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 获取用户名片
     * @param array $accIds 最多可以200个
     * @return array
     */
    public function userGetUserInfo(array $accIds)
    {
        $data = ['accids' => json_encode($accIds)];
        $result = $this->post($this->nimserver_user_get_uinfos_action, $data);
        if ($result['code'] == 200) {
            return $result['uinfos'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 设置桌面端在线时，移动端是否需要推送
     * @param string $accId
     * @param bool $donnopOpen 桌面端在线时，移动端是否不推送：true:移动端不需要推送，false:移动端需要推送
     * @return bool|array
     */
    public function userSetDonnop($accId, $donnopOpen = false)
    {
        $data = ['accid' => $accId, 'donnopOpen' => $this->boolConvertToString($donnopOpen)];
        $result = $this->post($this->nimserver_user_set_donnop_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 账号全局禁言
     * 设置或取消账号的全局禁言状态；账号被设置为全局禁言后，不能发送“点对点”、“群”、“聊天室”消息
     * @param string $accid 用户帐号
     * @param bool $mute 是否全局禁言：true：全局禁言，false：取消全局禁言
     * @return bool|array
     */
    public function userMute($accid, $mute = true)
    {
        $data = ['accid' => $accid, 'mute' => $this->boolConvertToString($mute)];
        $result = $this->post($this->nimserver_user_set_mute_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 账号全局禁用音视频
     * 账号被设置为禁用音视频后，不能发起点对点音视频、创建多人音视频、发起点对点白板、创建多人白板
     * @param string $accid 用户帐号
     * @param bool $mute 是否全局禁用音视频：true：全局禁用音视频，false：取消全局禁用音视频
     * @return bool|array
     */
    public function userMuteAv($accid, $mute = true)
    {
        $data = ['accid' => $accid, 'mute' => $this->boolConvertToString($mute)];
        $result = $this->post($this->nimserver_user_set_mute_av_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 添加好友
     * @param string $accId 加好友发起者accid
     * @param string $fAccId 加好友接收者accid
     * @param string $type 1直接加好友，2请求加好友，3同意加好友，4拒绝加好友
     * @param string $msg
     * @throws NetEaseIMException
     * @return bool|array
     */
    public function userAddFriend($accId, $fAccId, $type, $msg = '')
    {
        $support = [
            $this->ADD_FRIEND_DIRECT,
            $this->ADD_FRIEND_TYPE_REQUEST,
            $this->ADD_FRIEND_TYPE_AGREE,
            $this->ADD_FRIEND_TYPE_REJECT
        ];
        if (!in_array($type, $support)) {
            throw new NetEaseIMException('type must in:' . implode(', ', $support));
        }
        $data = ['accid' => $accId, 'faccid' => $fAccId, 'type' => $type, 'msg' => $msg];
        $result = $this->post($this->nimserver_friend_add_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 更新好友相关信息
     * @param string $accId 发起者accid
     * @param string $fAccId 要修改朋友的accid
     * @param string $alias 给好友增加备注名，限制长度128
     * @return bool|array
     */
    public function userUpdateFriend($accId, $fAccId, $alias)
    {
        $data = ['accid' => $accId, 'faccid' => $fAccId, 'alias' => $alias];
        $result = $this->post($this->nimserver_friend_update_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 删除好友
     * @param string $accId 发起者accid
     * @param string $fAccId 要删除的好友accid
     * @return bool|array
     */
    public function userDeleteFriend($accId, $fAccId)
    {
        $data = ['accid' => $accId, 'faccid' => $fAccId];
        $result = $this->post($this->nimserver_friend_delete_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 获取好友关系
     * @param string $accId 发起者accid
     * @param int $createTime 更新时间戳，接口返回该时间戳之后有更新的好友列表
     * @return array
     */
    public function userGetFriend($accId, $createTime = 0)
    {
        $data = ['accid' => $accId, 'createtime' => $createTime];
        $result = $this->post($this->nimserver_friend_get_action, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 设置黑名单/静音
     * @param string $accId
     * @param string $targetAcc
     * @param int $relationType 本次操作的关系类型,1:黑名单操作，2:静音列表操作
     * @param int $value 操作值，0:取消黑名单或静音，1:加入黑名单或静音
     * @return bool|array
     * @throws NetEaseIMException
     */
    public function userSetSpecialRelation($accId, $targetAcc, $relationType, $value)
    {
        if (!in_array($relationType, [$this->SPECIAL_RELATION_TYPE_BLACK_LIST, $this->SPECIAL_RELATION_TYPE_MUTE])) {
            throw new NetEaseIMException('check relationType');
        }
        $data = ['accid' => $accId, 'targetAcc' => $targetAcc, 'relationType' => $relationType, 'value' => $value];
        $result = $this->post($this->nimserver_user_set_special_relation_action, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 查看/获取 指定用户的黑名单和静音列表
     * @param string $accId
     * @return array
     */
    public function userListBlackAndMuteList($accId)
    {
        $data = ['accid' => $accId];
        $result = $this->post($this->nimserver_user_list_black_and_mute_list_action, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }
}
