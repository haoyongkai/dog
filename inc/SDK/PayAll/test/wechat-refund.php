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

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

// 囤主题 www.tzhuti.com    订单退款参数
$payOrder = [
    'out_trade_no'  => '56737188841424', // 囤主题 www.tzhuti.com    原商户订单号
    'out_refund_no' => '567371888414240', // 囤主题 www.tzhuti.com    退款订单号
    'total_fee'     => '1',   // 囤主题 www.tzhuti.com    原订单交易总金额
    'refund_fee'    => '1',  // 囤主题 www.tzhuti.com    申请退款金额
];

try {
    $options = $pay->driver('wechat')->gateway('transfer')->refund($payOrder);
    echo '<pre>';
    var_dump($options);
} catch (Exception $e) {
    echo "创建订单失败，" . $e->getMessage();
}