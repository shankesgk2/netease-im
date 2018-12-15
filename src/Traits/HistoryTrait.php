<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-11
 * Time: 14:56
 */

namespace shankesgk2\NetEaseIM\Traits;

use shankesgk2\NetEaseIM\Exception\CodeStatus;

/**
 * 历史记录
 * @package shankesgk2\NetEaseIM\Traits
 */
trait HistoryTrait
{
    private $nimserver_history_query_session_msg = '/nimserver/history/querySessionMsg.action';
    private $nimserver_history_query_team_msg = '/nimserver/history/queryTeamMsg.action';
    private $nimserver_history_query_chatroom_msg = '/nimserver/history/queryChatroomMsg.action';
    private $nimserver_history_delete_history_message = '/nimserver/history/deleteHistoryMessage.action';
    private $nimserver_history_query_user_event = '/nimserver/history/queryUserEvent.action';
    private $nimserver_history_delete_media_file = '/nimserver/history/deleteMediaFile.action';
    private $nimserver_history_query_broadcast_msg = '/nimserver/history/queryBroadcastMsg.action';
    private $nimserver_history_query_broadcast_msg_by_id = '/nimserver/history/queryBroadcastMsgById.action';

    /**
     * 单聊云端历史消息查询
     * @param string $from 发送者accid
     * @param string $to 接收者accid
     * @param string $begintime 开始时间，ms
     * @param string $endtime 截止时间，ms
     * @param int $limit 本次查询的消息条数上限(最多100条),小于等于0，或者大于100，会提示参数错误
     * @param int $reverse 1按时间正序排列，2按时间降序排列。其它返回参数414错误.默认是按降序排列
     * @param string|null $type 查询指定的多个消息类型，类型之间用","分割，不设置该参数则查询全部类型消息格式示例： 0,1,2,3；类型支持： 1:图片，2:语音，3:视频，4:地理位置，5:通知，6:文件，10:提示，11:Robot，100:自定义
     * @return array
     */
    public function historyQuerySessionMsg(string $from, string $to, string $begintime, string $endtime = null, int $limit = 100, int $reverse = 2, string $type = null)
    {
        $data = [
            'from' => $from,
            'to' => $to,
            'begintime' => $begintime,
            'endtime' => $endtime === null ? round(microtime(true) * 1000) : $endtime,
            'limit' => $limit,
            'reverse' => $reverse
        ];
        $data = $this->arrCheckAndPush($data, 'type', $type);
        $result = $this->post($this->nimserver_history_query_session_msg, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 群聊云端历史消息查询
     * @param string $tid 群id
     * @param string $accid 查询用户对应的accid
     * @param string $begintime 开始时间，ms
     * @param string $endtime 截止时间，ms
     * @param int $limit 本次查询的消息条数上限(最多100条),小于等于0，或者大于100，会提示参数错误
     * @param int $reverse 1按时间正序排列，2按时间降序排列。其它返回参数414错误.默认是按降序排列
     * @param string|null $type 查询指定的多个消息类型，类型之间用","分割，不设置该参数则查询全部类型消息格式示例： 0,1,2,3；类型支持： 1:图片，2:语音，3:视频，4:地理位置，5:通知，6:文件，10:提示，11:Robot，100:自定义
     * @return array
     */
    public function historyQueryTeamMsg(string $tid, string $accid, string $begintime, string $endtime = null, int $limit = 100, int $reverse = 2, string $type = null)
    {
        $data = [
            'tid' => $tid,
            'accid' => $accid,
            'begintime' => $begintime,
            'endtime' => $endtime === null ? round(microtime(true) * 1000) : $endtime,
            'limit' => $limit,
            'reverse' => $reverse
        ];
        $data = $this->arrCheckAndPush($data, 'type', $type);
        $result = $this->post($this->nimserver_history_query_team_msg, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }


    /**
     * 聊天室云端历史消息查询
     * 此接口有频控限制，每分钟可调用不超过1200次
     * @param int $roomid 聊天室id
     * @param string $accid 查询用户对应的accid
     * @param string $timetag 查询的时间戳锚点，13位。reverse=1时timetag为起始时间戳，reverse=2时timetag为终止时间戳
     * @param int $limit 本次查询的消息条数上限(最多200条),小于等于0，或者大于200，会提示参数错误
     * @param int $reverse 1按时间正序排列，2按时间降序排列。其它返回参数414错误.默认是按降序排列
     * @param string|null $type 查询指定的多个消息类型，类型之间用","分割，不设置该参数则查询全部类型消息格式示例： 0,1,2,3；类型支持： 1:图片，2:语音，3:视频，4:地理位置，5:通知，6:文件，10:提示，11:Robot，100:自定义
     * @return array
     */
    public function historyQueryChatroomMsg(int $roomid, string $accid, string $timetag, int $limit = 100, int $reverse = 2, string $type = null)
    {
        $data = [
            'roomid' => $roomid,
            'accid' => $accid,
            'timetag' => $timetag,
            'limit' => $limit,
            'reverse' => $reverse
        ];
        $data = $this->arrCheckAndPush($data, 'type', $type);
        $result = $this->post($this->nimserver_history_query_chatroom_msg, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 删除聊天室云端历史消息
     * @param int $roomid 聊天室id
     * @param string $fromAcc 消息发送者的accid
     * @param int $msgTimetag 消息的时间戳，单位毫秒，应该拿到原始消息中的时间戳为参数
     * @return bool|array
     */
    public function historyDeleteHistoryMessage(int $roomid, string $fromAcc, int $msgTimetag)
    {
        $data = [
            'roomid' => $roomid,
            'fromAcc' => $fromAcc,
            'msgTimetag' => $msgTimetag
        ];
        $result = $this->post($this->nimserver_history_delete_history_message, $data);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 用户登录登出事件记录查询
     * 跟据时间段查询用户的登录登出记录，每次最多返回100条。
     * 不提供分页支持，第三方需要跟据时间段来查询。
     * @param string $accid 要查询用户的accid
     * @param string $begintime 开始时间，ms
     * @param string $endtime 截止时间，ms
     * @param int $limit 本次查询的消息条数上限(最多100条),小于等于0，或者大于100，会提示参数错误
     * @param int $reverse 1按时间正序排列，2按时间降序排列。其它返回参数414错误。默认是按降序排列
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function historyQueryUserEvents(string $accid, string $begintime, string $endtime, int $limit = 100, int $reverse = 2)
    {
        $data = [
            'accid' => $accid,
            'begintime' => $begintime,
            'endtime' => $endtime === null ? round(microtime(true) * 1000) : $endtime,
            'limit' => $limit,
            'reverse' => $reverse
        ];
        $result = $this->post($this->nimserver_history_query_user_event, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 删除音视频/白板服务器录制文件
     * @param int $channelid 需要删除的文件的通道号
     * @return array|bool true 或 ['error'=>true,'message'=>$message]
     */
    public function historyDeleteMediaFile(int $channelid)
    {
        $result = $this->post($this->nimserver_history_delete_media_file, ['channelid' => $channelid]);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 批量查询广播消息
     * @param int $broadcastId 查询的起始ID，0表示查询最近的limit条。默认0。
     * @param int $limit 查询的条数，最大100。默认100。
     * @param int $type 查询的类型，1表示所有，2表示查询存离线的，3表示查询不存离线的。默认1。
     * @return array $result['msgs'] 或 ['error'=>true,'message'=>$message]
     */
    public function historyQueryBroadcastMsg(int $broadcastId = 0, int $limit = 100, int $type = 1)
    {
        $data = [
            'broadcastId' => $broadcastId,
            'limit' => $limit,
            'type' => $type
        ];
        $result = $this->post($this->nimserver_history_query_broadcast_msg, $data);
        if ($result['code'] == 200) {
            return $result['msgs'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 查询单条广播消息
     * @param int $broadcastId 广播消息ID，应用内唯一。
     * @return array $result['msg'] 或 ['error'=>true,'message'=>$message]
     */
    public function historyQueryBroadcastMsgById(int $broadcastId)
    {
        $result = $this->post($this->nimserver_history_query_broadcast_msg_by_id, ['broadcastId' => $broadcastId]);
        if ($result['code'] == 200) {
            return $result['msg'];
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }
}
