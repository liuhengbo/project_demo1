<?php


function success($data = [],$info="成功",$isRet = 1){
    $result_data = [
        'isRet'=>$isRet,
        'info'=>$info,
        'data'=>$data
    ];
    echo json_encode($result_data,256);
    exit;
}

function request(){
    return \Helpers\RequestHelper::getInstance();
}