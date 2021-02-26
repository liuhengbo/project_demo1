<?php
namespace Helpers;
use EasyWeChat\Factory;

class WechatHelper
{

    private $app;

    public $config = [
        'app_id'        => 'wx3cf0f39249eb0exx',
        'secret'        => 'f1c242f4f28f735d4687abb469072axx',

        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',
    ];


    public function __construct()
    {
        $this->app = Factory::officialAccount($this->config);
    }


    public function getWxPic()
    {

    }
}