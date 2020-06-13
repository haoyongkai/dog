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
    'out_trade_no'     => '41234123', // 囤主题 www.tzhuti.com    订单号
    'total_fee'        => '101', // 囤主题 www.tzhuti.com    订单金额，**单位：分**
    'body'             => '订单描述', // 囤主题 www.tzhuti.com    订单描述
    'spbill_create_ip' => '127.0.0.1', // 囤主题 www.tzhuti.com    支付人的 IP
    'openid'           => 'ol0Q_uJUcrb1DOjmQRycmSpLjRmo', // 囤主题 www.tzhuti.com    支付人的 openID
    'notify_url'       => 'http:// 囤主题 www.tzhuti.com   localhost/notify.php', // 囤主题 www.tzhuti.com    定义通知URL
];

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('wechat')->gateway('mp')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


