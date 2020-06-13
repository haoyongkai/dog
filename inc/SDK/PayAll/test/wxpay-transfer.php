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
    'partner_trade_no' => '42134122', // 囤主题 www.tzhuti.com   商户订单号
    'openid'           => 'ol0Q_uJUcrb1DOjmQRycmSpLjRmo', // 囤主题 www.tzhuti.com   收款人的openid
    'check_name'       => 'NO_CHECK', // 囤主题 www.tzhuti.com   NO_CHECK：不校验真实姓名\FORCE_CHECK：强校验真实姓名
    // 囤主题 www.tzhuti.com    're_user_name'     => '张三', // 囤主题 www.tzhuti.com   check_name为 FORCE_CHECK 校验实名的时候必须提交
    'amount'           => '101', // 囤主题 www.tzhuti.com   企业付款金额，单位为分
    'desc'             => '帐户提现', // 囤主题 www.tzhuti.com   付款说明
    'spbill_create_ip' => '192.168.0.1', // 囤主题 www.tzhuti.com   发起交易的IP地址
];

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('wechat')->gateway('transfer')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


