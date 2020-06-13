<?php

// 囤主题 www.tzhuti.com    +----------------------------------------------------------------------
// 囤主题 www.tzhuti.com    | pay-php-sdk
// 囤主题 www.tzhuti.com    +----------------------------------------------------------------------
// 囤主题 www.tzhuti.com    | 版权所有 2014~2017 广州楚才信息科技有限公司 [ http:// 囤主题 www.tzhuti.com   www.cuci.cc ]
// 囤主题 www.tzhuti.com    +----------------------------------------------------------------------
// 囤主题 www.tzhuti.com    | 开源协议 ( https:// 囤主题 www.tzhuti.com   mit-license.org )
// 囤主题 www.tzhuti.com    +----------------------------------------------------------------------
// 囤主题 www.tzhuti.com    | github开源项目：https:// 囤主题 www.tzhuti.com   github.com/zoujingli/pay-php-sdk
// 囤主题 www.tzhuti.com    +----------------------------------------------------------------------

include '../init.php';

// 囤主题 www.tzhuti.com    加载配置参数
$config = require(__DIR__ . '/config.php');

// 囤主题 www.tzhuti.com    支付参数
$options = [
    'out_trade_no' => '4312412343', // 囤主题 www.tzhuti.com    订单号
    'total_amount' => '13', // 囤主题 www.tzhuti.com    订单金额，单位：元
    'subject'      => '订单商品标题', // 囤主题 www.tzhuti.com    订单商品标题
    'auth_code'    => '123456', // 囤主题 www.tzhuti.com    授权码
    'notify_url'   => 'http:// 囤主题 www.tzhuti.com   localhost/notify.php', // 囤主题 www.tzhuti.com    定义通知URL
];

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('alipay')->gateway('pos')->apply($options);
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


