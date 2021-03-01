<?php


namespace App\Controllers;


use App\Helpers\RedisHelper;

class BaseController
{

    protected $redis;

    public function __construct()
    {
        $this->redis = RedisHelper::instance();
        // *代表允许任何网址请求
        header('Access-Control-Allow-Origin:*');
        // 允许请求的类型
        header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
        // 设置是否允许发送 cookies
        header('Access-Control-Allow-Credentials: true');
        // 设置允许自定义请求头的字段
        header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin');
    }
}