<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-11
 * Time: 15:56
 */

namespace shankesgk2\NetEaseIM\Traits;

use shankesgk2\NetEaseIM\Exception\CodeStatus;

/**
 * 短信功能
 * @package shankesgk2\NetEaseIM\Traits
 */
trait SmsTrait
{
    private $nimserver_sms_sendcode = '/sms/sendcode.action';
    private $nimserver_sms_verifycode = '/sms/verifycode.action';
    private $nimserver_sms_sendtemplate = '/sms/sendtemplate.action';
    private $nimserver_sms_querystatus = '/sms/querystatus.action';

    /**
     * 发送短信/语音短信验证码
     * @param string $mobile 目标手机号，非中国大陆手机号码需要填写国家代码(如美国：+1-xxxxxxxxxx)或地区代码(如香港：+852-xxxxxxxx)
     * @param int $templateid 模板编号(如不指定则使用配置的默认模版)
     * @param int $authCode 客户自定义验证码，长度为4～10个数字；如果设置了该参数，则codeLen参数无效
     * @param int $codeLen 验证码长度，范围4～10，默认为4
     * @param string|null $deviceId 目标设备号，可选参数
     * @param bool $needUp 是否需要支持短信上行。true:需要，false:不需要；说明：如果开通了短信上行抄送功能，该参数需要设置为true，其它情况设置无效
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function smsSendcode(string $mobile, int $templateid, int $authCode = null, int $codeLen = 4, string $deviceId = null, bool $needUp = false)
    {
        $data = [
            'mobile' => $mobile,
            'templateid' => $templateid,
            'needUp' => $needUp
        ];
        $data = $this->arrCheckAndPush($data, 'authCode', $authCode);
        $data = $this->arrCheckAndPush($data, 'codeLen', $codeLen);
        $data = $this->arrCheckAndPush($data, 'deviceId', $deviceId);
        $result = $this->post($this->nimserver_sms_sendcode, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 校验指定手机号的验证码是否合法。
     * @param string $mobile 目标手机号，非中国大陆手机号码需要填写国家代码(如美国：+1-xxxxxxxxxx)或地区代码(如香港：+852-xxxxxxxx)
     * @param string $code 验证码
     * @return array|bool true 或 ['error'=>true,'message'=>$message]
     */
    public function smsVerifycode(string $mobile, string $code)
    {
        $result = $this->post($this->nimserver_sms_verifycode, [
            'mobile' => $mobile,
            'code' => $code
        ]);
        if ($result['code'] == 200) {
            return true;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 发送模板短信
     * @param int $templateid 模板编号(由客户顾问配置之后告知开发者)
     * @param array $mobiles 接收者号码列表，JSONArray格式,如["186xxxxxxxx","186xxxxxxxx"]，限制接收者号码个数最多为100个；非中国大陆手机号码需要填写国家代码(如美国：+1-xxxxxxxxxx)或地区代码(如香港：+852-xxxxxxxx)
     * @param array $params 短信参数列表，用于依次填充模板，JSONArray格式，每个变量长度不能超过30字，如["xxx","yyy"];对于不包含变量的模板，不填此参数表示模板即短信全文内容
     * @param bool $needUp 是否需要支持短信上行。true:需要，false:不需要；说明：如果开通了短信上行抄送功能，该参数需要设置为true，其它情况设置无效
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function smsSendtemplate(int $templateid, array $mobiles, array $params = [], bool $needUp = false)
    {
        $data = [
            'templateid' => $templateid,
            'mobiles' => json_encode($mobiles),
            'params' => json_encode($params),
            'needUp' => $needUp
        ];
        $result = $this->post($this->nimserver_sms_sendtemplate, $data);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }

    /**
     * 查询通知类和运营类短信发送状态
     * 根据短信的sendid(sendtemplate.action接口中的返回值)，查询短信发送结果。
     * @param int $sendid 发送短信的编号sendid
     * @return array $result 或 ['error'=>true,'message'=>$message]
     */
    public function smsQuerystatus(int $sendid)
    {
        $result = $this->post($this->nimserver_sms_querystatus, ['sendid' => $sendid]);
        if ($result['code'] == 200) {
            return $result;
        } else {
            return CodeStatus::codeStatusWithError($result['code']);
        }
    }
}
