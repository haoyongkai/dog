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
    'bill_date' => '2017-11-03', // 囤主题 www.tzhuti.com    账单时间(日账单yyyy-MM-dd,月账单 yyyy-MM)
    'bill_type' => 'signcustomer', // 囤主题 www.tzhuti.com    账单类型(trade指商户基于支付宝交易收单的业务账单,signcustomer是指基于商户支付宝余额收入及支出等资金变动的帐务账单)
];

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('alipay')->gateway('bill')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


