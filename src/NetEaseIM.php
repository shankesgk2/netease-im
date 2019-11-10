<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-08
 * Time: 17:00
 */

namespace shankesgk2\NetEaseIM;

use Exception as ExceptionAlias;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use shankesgk2\NetEaseIM\Exception\NetEaseIMException;
use shankesgk2\NetEaseIM\Traits\ChatRoomTrait;
use shankesgk2\NetEaseIM\Traits\HistoryTrait;
use shankesgk2\NetEaseIM\Traits\MessageTrait;
use shankesgk2\NetEaseIM\Traits\SmsTrait;
use shankesgk2\NetEaseIM\Traits\TeamTrait;
use shankesgk2\NetEaseIM\Traits\UserTrait;

/**
 * 网易云信API
 * @package shankesgk2\NetEaseIM
 */
class NetEaseIM
{
    use SmsTrait;
    use UserTrait;
    use HistoryTrait;
    use ChatRoomTrait;
    use TeamTrait;
    use MessageTrait;

    protected $debug = false;
    protected $baseUrl = 'https://api.netease.im';
    protected $client;
    protected $appKey;
    protected $appSecret;
    /**
     * @var string 随机数
     */
    protected $Nonce;

    /**
     * @var int 当前时间,秒数
     */
    protected $CurTime;
    protected $CheckSum;

    /**
     * NetEaseIM constructor.
     * @param $appKey
     * @param $appSecret
     */
    public function __construct($appKey = null, $appSecret = null)
    {
        $appKey = $appKey ?: config('neteaseim.appKey');
        $appSecret = $appSecret ?: config('neteaseim.appSecret');
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    /**
     * 组装网易云接口必要数据,发送http post请求
     * @param $url
     * @param $data
     * @return mixed
     * @return array
     * @throws ExceptionAlias
     * @throws NetEaseIMException
     */
    public function post($url, $data)
    {
        $options = [
            RequestOptions::TIMEOUT => config('neteaseim.httpTimeout'),
            RequestOptions::CONNECT_TIMEOUT => config('neteaseim.httpTimeout'),
            RequestOptions::DEBUG => $this->debug,
            RequestOptions::VERIFY => config('neteaseim.httpSslVerifypeer'),
            RequestOptions::FORCE_IP_RESOLVE => 'v4',
            RequestOptions::HEADERS => $this->getHeaders(),
            RequestOptions::BODY => http_build_query($data),
        ];
        $content = $this->getClient()->post($url, $options)->getBody()->getContents();
        $result = \GuzzleHttp\json_decode($content, true); // Array
        if (!$result) {
            throw new NetEaseIMException('json decode error: ' . $content);
        }
        return $result;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function getClient()
    {
        if (empty($this->client)) {
            $this->client = new Client(['base_uri' => $this->baseUrl]);
        }
        return $this->client;
    }

    /**
     * @return array
     * @return array
     * @throws ExceptionAlias
     */
    private function getHeaders()
    {
        $nonce = $this->buildNonce();
        $curTime = (string)time();
        $checkSum = $this->buildCheckSum($this->appSecret, $nonce, $curTime);
        return [
            'AppKey' => $this->appKey,  //开发者平台分配的AppKey
            'Nonce' => $nonce,          //随机数（最大长度128个字符）
            'CurTime' => $curTime,      //当前UTC时间戳
            'CheckSum' => $checkSum,    //SHA1(AppSecret + Nonce + CurTime)，三个参数拼接的字符串，进行SHA1哈希计算，转化成16进制字符(String、小写)
            'Content-Type' => 'application/x-www-form-urlencoded;charset=utf-8',
        ];
    }

    /**
     * @return string
     * @return string
     * @throws ExceptionAlias
     */
    private function buildNonce()
    {
        return bin2hex(random_bytes(64));
    }

    /**
     * @param string $appSecret
     * @param string $nonce
     * @param int $curTime
     * @return string
     */
    private function buildCheckSum($appSecret, $nonce, $curTime)
    {
        return sha1($appSecret . $nonce . $curTime);
    }

    /**
     * 设置\GuzzleHttp\Client调试
     * @param bool $debug
     * @return void
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * 布尔转字符串
     * @param bool $bool
     * @return string
     */
    public function boolConvertToString($bool)
    {
        return true === $bool ? 'true' : 'false';
    }

    /**
     * 数组检查追加
     * @param $array
     * @param string $key
     * @param string $value
     * @return array
     */
    public function arrCheckAndPush($array, $key, $value)
    {
        if ($value) {
            return array_merge($array, [$key => json_encode($value)]);
        }
        return $array;
    }
}
