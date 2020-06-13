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

// 囤主题 www.tzhuti.com    原商户订单号
$out_trade_no = '56737188841424';

// 囤主题 www.tzhuti.com    申请退款金额
$refund_fee = '1.00';

try {
    $result = $pay->driver('alipay')->gateway('transfer')->refund($out_trade_no, $refund_fee);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}