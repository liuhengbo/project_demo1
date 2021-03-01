<?php
namespace App\Helpers;
use EasyWeChat\Factory;

class WechatHelper
{
    const WECHAT_LOGIN_SCENE = 'wechat_login';
    public $app;

    public $config = [
        'app_id'        => 'wx74baf9ad2b192c1b',
        'secret'        => 'd2ee1dc2d00a29b1abec180ac5d5adea',
        'token' => 'TestToken',
        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',
    ];


    public function __construct()
    {
        $this->app = Factory::officialAccount($this->config);
    }

    public function handle_text($message)
    {

    }

    /**
     * 获取登录二维码网址
     * @return string
     */
    public function getWxPic()
    {
        $result = $this->app->qrcode->temporary(self::WECHAT_LOGIN_SCENE,3600*24);
        $qr_result = $this->app->qrcode->url($result['ticket']);
        return $qr_result;
    }
}