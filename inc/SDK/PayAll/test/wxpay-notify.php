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

$pay = new Pay\Pay($config);
$verify = $pay->driver('wechat')->gateway('mp')->verify(file_get_contents('php:// 囤主题 www.tzhuti.com   input'));

if ($verify) {
    file_put_contents('notify.txt', "收到来自微信的异步通知\r\n", FILE_APPEND);
    file_put_contents('notify.txt', '订单号：' . $verify['out_trade_no'] . "\r\n", FILE_APPEND);
    file_put_contents('notify.txt', '订单金额：' . $verify['total_fee'] . "\r\n\r\n", FILE_APPEND);
} else {
    file_put_contents('notify.txt', "收到异步通知\r\n", FILE_APPEND);
}

echo "success";

// 囤主题 www.tzhuti.com    下面是项目的真实代码
/* 囤主题 www.tzhuti.com
$pay = new Pay\Pay($config);
$notifyInfo = $pay->driver('wechat')->gateway('mp')->verify(file_get_contents('php:// 囤主题 www.tzhuti.com   input'));
// 囤主题 www.tzhuti.com    支付通知数据获取成功
if ($notifyInfo['result_code'] == 'SUCCESS' && $notifyInfo['return_code'] == 'SUCCESS') {
    $order_no = substr($notifyInfo['out_trade_no'], 0, 10);
    // 囤主题 www.tzhuti.com    更新订单状态
    $this->updateOrder($order_no, $notifyInfo['transaction_id'], $notifyInfo['cash_fee'] / 100, 'wechat');
}
echo 'success';
*/