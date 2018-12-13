<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-11
 * Time: 10:07
 */

namespace shankesgk2\NetEaseIM\Traits;

use shankesgk2\NetEaseIM\Exception\CodeStatus;

/**
 * 群组功能(高级群)
 * @package shankesgk2\NetEaseIM\Traits
 */
trait TeamTrait
{
    private $nimserver_team_create = '/nimserver/team/create.action';
    private $nimserver_team_join_teams = '/nimserver/team/joinTeams.action';
    private $nimserver_team_add = '/nimserver/team/add.action';
    private $nimserver_team_query = '/nimserver/team/query.action';
    private $nimserver_team_query_detail = '/nimserver/team/queryDetail.action';
    private $nimserver_team_get_mark_read_info = '/nimserver/team/getMarkReadInfo.action';
    private $nimserver_team_update = '/nimserver/team/update.action';
    private $nimserver_team_remove = '/nimserver/team/remove.action';
    private $nimserver_team_kick = '/nimserver/team/kick.action';
    private $nimserver_team_change_owner = '/nimserver/team/changeOwner.action';
    private $nimserver_team_add_manager = '/nimserver/team/addManager.action';
    private $nimserver_team_remove_manager = '/nimserver/team/removeManager.action';
    private $nimserver_team_update_team_nick = '/nimserver/team/updateTeamNick.action';
    private $nimserver_team_mute_team = '/nimserver/team/muteTeam.action';
    private $nimserver_team_mute_tlist = '/nimserver/team/muteTlist.action';
    private $nimserver_team_leave = '/nimserver/team/leave.action';
    private $nimserver_team_mute_tlist_all = '/nimserver/team/muteTlistAll.action';
    private $nimserver_team_list_team_mute = '/nimserver/team/listTeamMute.action';
    /**
     * 管理后台建群时，
     * 0不需要被邀请人同意加入群，
     * 1需要被邀请人同意才可以加入群。
     * 其它会返回414
     */
    private $CREATE_AGREE_NO_NEED_AGREE = 0;
    private $CREATE_AGRENT_NEED_AGREE = 1;
    /**
     * 群建好后，sdk操作时，
     * 0不用验证，
     * 1需要验证,
     * 2不允许任何人加入。
     * 其它返回414
     */
    private $CREATE_JOIN_MODE_NO_NEED_VERIFY = 0;
    private $CREATE_JOIN_MODE_NEED_VERIFY = 1;
    private $CREATE_JOIN_MODE_NO_ALLOW = 2;
    /**
     * 被邀请人同意方式，
     *
     * 0-需要同意(默认)
     * 1-不需要同意。其它返回414
     */
    private $CREATE_BE_INVITED_MODE_NEED_ALLOW = 0;
    private $CREATE_BE_INVITED_MODE_NO_NEED_ALLOW = 1;
    /**
     * 0-管理员(默认),
     * 1-所有人
     * 其它返回414
     */
    private $PERMISSION_MODE_ADMIN = 0;
    private $PERMISSION_MODE_EVERYBODY = 1;
    /**
     * 1表示带上群成员列表，
     * 0表示不带群成员列表，只返回群信息
     */
    private $QUERY_OPE_NO_MEMBER_LIST = 0;
    private $QUERY_OPE_MEMBER_LIST = 1;
    /**
     * 1:群主解除群主后离开群，
     * 2：群主解除群主后成为普通成员。
     * 其它414
     */
    private $CHANGE_OWNER_LEAVE_GROUP = 1;
    private $CHANGE_OWNER_NOT_LEAVE_GROUP = 2;

    /**
     * 创建群组
     *
     * 创建高级群，以邀请的方式发送给用户；
     * custom 字段是给第三方的扩展字段，第三方可以基于此字段扩展高级群的功能，构建自己需要的群；
     * 建群成功会返回tid，需要保存，以便于加人与踢人等后续操作；
     * 每个用户可创建的群数量有限制，限制值由 IM 套餐的群组配置决定，可登录管理后台查看。
     * @param string $tname 群名称，最大长度64字符
     * @param string $owner 群主用户帐号，最大长度32字符
     * @param string $icon 群头像，最大长度1024字符
     * @param array $members ["aaa","bbb"](JSONArray对应的accid，如果解析出错会报414)，一次最多拉200个成员
     * @param string $custom 自定义高级群扩展属性，第三方可以跟据此属性自定义扩展自己的群属性。（建议为json）,最大长度1024字符
     * @param string $msg 邀请发送的文字，最大长度150字符
     * @param string $announcement 群公告，最大长度1024字符
     * @param string $intro 群描述，最大长度512字符
     * @param int $mAgree 管理后台建群时，0不需要被邀请人同意加入群，1需要被邀请人同意才可以加入群。其它会返回414
     * @param int $joinMode 群建好后，sdk操作时，0不用验证，1需要验证,2不允许任何人加入。其它返回414
     * @param int $beInviteMode 被邀请人同意方式，0-需要同意(默认),1-不需要同意。其它返回414
     * @param int $inviteMode 谁可以邀请他人入群，0-管理员(默认),1-所有人。其它返回414
     * @param int $uptInfoMode 谁可以修改群资料，0-管理员(默认),1-所有人。其它返回414
     * @param int $upCustomMode 谁可以更新群自定义属性，0-管理员(默认),1-所有人。其它返回414
     *
     * @return array
     */
    public function teamCreate(
        $tname,
        $owner,
        $icon,
        array $members,
        $custom = '',
        $msg = 'msg',
        $announcement = '',
        $intro = '',
        $mAgree = null,
        $joinMode = null,
        $beInviteMode = null,
        $inviteMode = null,
        $uptInfoMode = null,
        $upCustomMode = null
    )
    {
        $data = [
            'tname' => $tname,
            'owner' => $owner,
            'members' => json_encode($members),
            'announcement' => $announcement,
            'intro' => $intro,
            'msg' => $msg,
            'magree' => $mAgree === null ? $this->CREATE_AGREE_NO_NEED_AGREE : $mAgree,
            'joinmode' => $joinMode === null ? $this->CREATE_JOIN_MODE_NO_NEED_VERIFY : $joinMode,
            'custom' => $custom,
            'icon' => $icon,
            'beinvitemode' => $beInviteMode === null ? $this->CREATE_BE_INVITED_MODE_NO_NEED_ALLOW : $beInviteMode,
            'invitemode' => $inviteMode === null ? $this->PERMISSION_MODE_EVERYBODY : $inviteMode,
            'uptinfomode' => $uptInfoMode === null ? $this->PERMISSION_MODE_ADMIN : $uptInfoMode,
            'upcustommode' => $upCustomMode === null ? $this->PERMISSION_MODE_EVERYBODY : $upCustomMode,
        ];
        $result = $this->post($this->nimserver_team_create, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 拉人入群
     *
     * @param string $tid 网易云通信服务器产生，群唯一标识，创建群时会返回，最大长度128字符
     * @param string $owner 群主用户帐号，最大长度32字符
     * @param array $members ["aaa","bbb"](JSONArray对应的accid，如果解析出错会报414)，一次最多拉200个成员
     * @param string $msg 邀请发送的文字，最大长度150字符
     * @param int $mAgree 管理后台建群时，0不需要被邀请人同意加入群，1需要被邀请人同意才可以加入群。其它会返回414
     * @param string $attach 自定义扩展字段，最大长度512
     *
     * @return array 如果邀请的人中存在加群数量超限的情况，会返回faccid
     */
    public function teamAdd($tid, $owner, array $members, $msg, $mAgree = null, $attach = '')
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'members' => json_encode($members),
            'magree' => $mAgree === null ? $this->CREATE_AGREE_NO_NEED_AGREE : $mAgree,
            'msg' => $msg,
        ];
        $data = $this->arrCheckAndPush($data, 'attach', $attach);
        $result = $this->post($this->nimserver_team_add, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 踢人出群
     *
     * @param string $tid 网易云通信服务器产生，群唯一标识，创建群时会返回，最大长度128字符
     * @param string $owner 群主用户帐号，最大长度32字符
     * @param string $member 被移除人的accid，用户账号，最大长度字符
     * @param string $attach 自定义扩展字段，最大长度512
     *
     * @return array|bool
     */
    public function teamKick($tid, $owner, $member, $attach)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'member' => $member,
            'attach' => $attach
        ];
        $result = $this->post($this->nimserver_team_kick, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 解散群
     *
     * @param string $tid 网易云通信服务器产生，群唯一标识，创建群时会返回，最大长度128字符
     * @param string $owner 群主用户帐号，最大长度32字符
     *
     * @return array|bool
     */
    public function teamRemove($tid, $owner)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner
        ];
        $result = $this->post($this->nimserver_team_remove, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 更新群组
     *
     * @param string $tid 易云通信服务器产生，群唯一标识，创建群时会返回
     * @param string $tname 群名称，最大长度64字符
     * @param string $owner 群主用户帐号，最大长度32字符
     * @param string $icon 群头像，最大长度1024字符
     * @param string $custom 自定义高级群扩展属性，第三方可以跟据此属性自定义扩展自己的群属性。（建议为json）,最大长度1024字符
     * @param string $announcement 群公告，最大长度1024字符
     * @param string $intro 群描述，最大长度512字符
     * @param int $joinMode 群建好后，sdk操作时，0不用验证，1需要验证,2不允许任何人加入。其它返回414
     * @param int $beInviteMode 被邀请人同意方式，0-需要同意(默认),1-不需要同意。其它返回414
     * @param int $inviteMode 谁可以邀请他人入群，0-管理员(默认),1-所有人。其它返回414
     * @param int $uptInfoMode 谁可以修改群资料，0-管理员(默认),1-所有人。其它返回414
     * @param int $upCustomMode 谁可以更新群自定义属性，0-管理员(默认),1-所有人。其它返回414
     *
     * @return array|bool
     */
    public function teamUpdate(
        $tid,
        $tname,
        $owner,
        $icon = '',
        $custom = '',
        $announcement = '',
        $intro = '',
        $joinMode = null,
        $beInviteMode = null,
        $inviteMode = null,
        $uptInfoMode = null,
        $upCustomMode = null
    )
    {
        $data = [
            'tid' => $tid,
            'tname' => $tname,
            'owner' => $owner,
            'announcement' => $announcement,
            'intro' => $intro,
            'joinmode' => $joinMode === null ? $this->CREATE_JOIN_MODE_NO_NEED_VERIFY : $joinMode,
            'custom' => $custom,
            'icon' => $icon,
            'beinvitemode' => $beInviteMode === null ? $this->CREATE_BE_INVITED_MODE_NO_NEED_ALLOW : $beInviteMode,
            'invitemode' => $inviteMode === null ? $this->PERMISSION_MODE_EVERYBODY : $inviteMode,
            'uptinfomode' => $uptInfoMode === null ? $this->PERMISSION_MODE_ADMIN : $uptInfoMode,
            'upcustommode' => $upCustomMode === null ? $this->PERMISSION_MODE_EVERYBODY : $upCustomMode,
        ];
        $result = $this->post($this->nimserver_team_update, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 群信息与成员列表查询
     * 高级群信息与成员列表查询，一次最多查询30个群相关的信息，跟据ope参数来控制是否带上群成员列表；
     * 查询群成员会稍微慢一些，所以如果不需要群成员列表可以只查群信息；
     * 此接口受频率控制，某个应用一分钟最多查询30次，超过会返回416，并且被屏蔽一段时间；
     * 群成员的群列表信息中增加管理员成员admins的返回
     *
     * @param array $tids 群id列表，如["3083","3084"]
     * @param int $ope 1表示带上群成员列表，0表示不带群成员列表，只返回群信息
     *
     * @return array
     */
    public function teamQuery(array $tids, $ope = null)
    {
        $data = [
            'tids' => json_encode($tids),
            'ope' => $ope === null ? $this->QUERY_OPE_MEMBER_LIST : $ope
        ];
        $result = $this->post($this->nimserver_team_query, $data);
        if ($result['code'] == 200) {
            return $result['tinfos'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }

    }


    /**
     * 获取群组详细信息
     * 查询指定群的详细信息（群信息+成员详细信息）
     *
     * @param string $tid 群id
     *
     * @return array
     */
    public function teamQueryDetail(string $tid)
    {
        $result = $this->post($this->nimserver_team_query_detail, ['tids' => $tid]);
        if ($result['code'] == 200) {
            return $result['tinfos'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 获取群组已读消息的已读详情信息
     * @param string $tid
     * @param string $msgid
     * @param string $fromAccid
     * @param bool $snapshot
     * @return mixed
     */
    public function teamGetMarkReadInfo(string $tid, string $msgid, string $fromAccid, bool $snapshot = false)
    {
        $result = $this->post($this->nimserver_team_get_mark_read_info, [
            'tid' => $tid,
            'msgid' => $msgid,
            'fromAccid' => $fromAccid,
            'snapshot' => $snapshot
        ]);
        if ($result['code'] == 200) {
            return $result['data'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 移交群主
     * 转换群主身份；
     * 群主可以选择离开此群，还是留下来成为普通成员。
     * @param string $tid 网易云通信服务器产生，群唯一标识，创建群时会返回，最大长度128字符
     * @param string $owner 群主用户帐号，最大长度32字符
     * @param string $newOwner 新群主帐号，最大长度32字符
     * @param int $leave 1:群主解除群主后离开群，2：群主解除群主后成为普通成员。其它414
     *
     * @return array|bool
     */
    public function TeamChangeOwner($tid, $owner, $newOwner, $leave = null)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'newowner' => $newOwner,
            'leave' => $leave === null ? $this->CHANGE_OWNER_LEAVE_GROUP : $leave
        ];
        $result = $this->post($this->nimserver_team_change_owner, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 任命管理员
     * 提升普通成员为群管理员，可以批量，但是一次添加最多不超过10个人。
     *
     * @param string $tid 群id
     * @param string $owner 群主用户accid
     * @param array $members 用户accid 数组
     *
     * @return array|bool
     */
    public function teamAddManager($tid, $owner, array $members)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'members' => json_encode($members)
        ];
        $result = $this->post($this->nimserver_team_add_manager, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 移除管理员
     * 解除管理员身份，可以批量，但是一次解除最多不超过10个人
     *
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $owner 群主 accid
     * @param array $members 用户accid 数组
     *
     * @return array|bool
     */
    public function teamRemoveManager($tid, $owner, array $members)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'members' => json_encode($members)
        ];
        $result = $this->post($this->nimserver_team_remove_manager, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 获取某个用户所加入高级群的群信息
     * @param string $accid 要查询用户的accid
     * @return array
     */
    public function teamJoinTeams($accid)
    {
        $result = $this->post($this->nimserver_team_join_teams, ['accid' => $accid]);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 修改群昵称
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $owner 群主 accid
     * @param string $accid 要修改群昵称的群成员 accid
     * @param string $nick accid 对应的群昵称，最大长度32字符
     * @param string $custom 自定义扩展字段，最大长度1024字节
     * @return array|bool
     */
    public function teamUpdateTeamNick($tid, $owner, $accid, $nick, $custom = '')
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'accid' => $accid,
            'nick' => $nick,
            'custom' => $custom
        ];
        $result = $this->post($this->nimserver_team_update_team_nick, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 修改消息提醒开关
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $accid 要操作的群成员accid
     * @param int $ope 1：关闭消息提醒，2：打开消息提醒，其他值无效
     * @return array|bool
     */
    public function teamMuteTeam($tid, $accid, $ope)
    {
        $data = [
            'tid' => $tid,
            'accid' => $accid,
            'ope' => $ope
        ];
        $result = $this->post($this->nimserver_team_mute_team, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 禁言群成员
     *
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $owner 要操作的群成员accid
     * @param string $accid 禁言对象的accid
     * @param int $mute 1-禁言，0-解禁
     *
     * @return array|bool
     */
    public function teamMuteTlist($tid, $owner, $accid, $mute = 0)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'accid' => $accid,
            'mute' => $mute
        ];
        $result = $this->post($this->nimserver_team_mute_tlist, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 主动退群
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $accid 禁言对象的accid
     * @return array|bool
     */
    public function teamLeave($tid, $accid)
    {
        $data = [
            'tid' => $tid,
            'accid' => $accid,
        ];
        $result = $this->post($this->nimserver_team_leave, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 将群组整体禁言
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $owner 要操作的群成员accid
     * @param int $mute 1-禁言，0-解禁
     * @return array|bool
     */
    public function teamMuteTlistAll($tid, $owner, $mute = 0)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
            'mute' => $mute
        ];
        $result = $this->post($this->nimserver_team_mute_tlist_all, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 获取群组禁言列表
     * @param string $tid 群唯一标识，创建群时网易云通信服务器产生并返回
     * @param string $owner 群主的accid
     * @return array
     */
    public function teamListTeamMute($tid, $owner)
    {
        $data = [
            'tid' => $tid,
            'owner' => $owner,
        ];
        $result = $this->post($this->nimserver_team_list_team_mute, $data);
        if ($result['code'] == 200) {
            return $result['mutes'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }
}
