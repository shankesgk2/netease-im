<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-09
 * Time: 10:40
 */

namespace shankesgk2\NetEaseIM\Exception;


class NetEaseIMException extends \Exception
{
    public function __construct(string $message = '', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}