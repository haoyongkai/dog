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

// 囤主题 www.tzhuti.com    参考请求参数  https:// 囤主题 www.tzhuti.com   docs.open.alipay.com/270/alipay.trade.page.pay
$options = [
    'out_trade_no' => time(), // 囤主题 www.tzhuti.com    商户订单号
    'total_amount' => '1', // 囤主题 www.tzhuti.com    支付金额
    'subject'      => '支付订单描述', // 囤主题 www.tzhuti.com    支付订单描述
];

// 囤主题 www.tzhuti.com    参考公共参数  https:// 囤主题 www.tzhuti.com   docs.open.alipay.com/270/alipay.trade.page.pay
$config['notify_url'] = 'http:// 囤主题 www.tzhuti.com   pay.thinkadmin.top/test/alipay-notify.php';
$config['return_url'] = 'http:// 囤主题 www.tzhuti.com   pay.thinkadmin.top/test/alipay-success.php';

// 囤主题 www.tzhuti.com    实例支付对象
$pay = new \Pay\Pay($config);

try {
    echo $pay->driver('alipay')->gateway('wap')->apply($options);
} catch (Exception $e) {
    echo $e->getMessage();
}


