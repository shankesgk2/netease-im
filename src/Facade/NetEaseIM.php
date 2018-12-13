<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-08
 * Time: 16:58
 */

namespace shankesgk2\NetEaseIM\Facade;

use Illuminate\Support\Facades\Facade;

class NetEaseIM extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'neteaseim';
    }
}