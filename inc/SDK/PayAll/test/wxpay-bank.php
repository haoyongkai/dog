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
    'partner_trade_no' => time(),
    'enc_bank_no'      => '6212263602037318102',
    'enc_true_name'    => '邹景立',
    'bank_code'        => '1002',
    'amount'           => '100',
    'desc'             => '打款测试',
];

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('wechat')->gateway('bank')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

// 囤主题 www.tzhuti.com    查询打款状态
try {
    $reuslt = $pay->driver('wechat')->gateway('bank')->find($options['partner_trade_no']);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}


