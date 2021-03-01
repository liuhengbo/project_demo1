<?php


namespace App\Controllers;


use App\Helpers\WechatHelper;

class WechatLoginCodeController extends BaseController
{

    public function run(){
        $expired = 24*3600;
        $wechat_user_flag = request()->get('wechat_user_flag');
        if(!$wechat_user_flag){
            $wechat_user_flag = $this->buildWechatUserFlag();
        }
        if($this->redis->get($wechat_user_flag)){
            $qr_code_url =  $this->redis->get($wechat_user_flag);
        }else{

            $wechatHelper =  new WechatHelper();
            $qr_code_url = $wechatHelper->getWxPic();
            $this->redis->set($wechat_user_flag,$qr_code_url,$expired);
        }
        $result_data = [
            'qr_code_url' => $qr_code_url,
            'wechat_user_flag'=>$wechat_user_flag,

        ];
        success($result_data);
    }

    private function buildWechatUserFlag()
    {
        return session_create_id('userflag');
    }
}