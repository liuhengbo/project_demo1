<?php

require __DIR__ . '/vendor/autoload.php';


$wechatHelper = new \App\Helpers\WechatHelper();
$wechatApp = $wechatHelper->app;

$wechatApp->server->push(function ($message) use ($wechatHelper){
    return "数据为：".json_encode($message,256);
    if($message){
        $method = 'handle_'.$message['MsgType'];
        if(method_exists($wechatHelper,$method)){
            $openid = $message['FormUserName'];
            return call_user_func_array([$wechatHelper,$method],[$message]);
        }else{
            return "方法不存在";
        }
    }
});

$response = $wechatApp->server->serve();

$response->send();
exit();