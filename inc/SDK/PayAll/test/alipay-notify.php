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

if ($pay->driver('alipay')->gateway()->verify($_POST)) {
    file_put_contents('notify.txt', "收到来自支付宝的异步通知\r\n", FILE_APPEND);
    file_put_contents('notify.txt', '订单号：' . $_POST['out_trade_no'] . "\r\n", FILE_APPEND);
    file_put_contents('notify.txt', '订单金额：' . $_POST['total_amount'] . "\r\n\r\n", FILE_APPEND);
} else {
    file_put_contents('notify.txt', "收到异步通知\r\n", FILE_APPEND);
}


// 囤主题 www.tzhuti.com    下面是项目的真实代码
/* 囤主题 www.tzhuti.com
$pay = new \Pay\Pay(config('pay'));
$notifyInfo = $pay->driver('alipay')->gateway('app')->verify(request()->post('', '', null));
p($notifyInfo, false, RUNTIME_PATH . date('Ymd') . '_notify.txt');
if (in_array($notifyInfo['trade_status'], ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
    // 囤主题 www.tzhuti.com    更新订单状态
    $this->updateOrder($notifyInfo['out_trade_no'], $notifyInfo['trade_no'], $notifyInfo['receipt_amount'], 'alipay');
}
*/