<?php


namespace App\Helpers;


class RedisHelper
{
    public static $redis;

    private static $config = [
        'host'=>'127.0.0.1',
        'port'=>'6379',
    ];


    /**
     * @return \Redis
     */
    public static function instance(){
        if(!self::$redis){
            self::connectRedis();
        }
        return self::$redis;
    }


    private static function connectRedis()
    {
        self::$redis = new \Redis();
        self::$redis->connect(self::$config['host'],self::$config['port']);
    }

}