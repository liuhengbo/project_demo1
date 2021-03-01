<?php

use App\Controllers\WechatLoginCodeController;

require __DIR__ . '/vendor/autoload.php';


$controller = new WechatLoginCodeController();

$controller->run();

