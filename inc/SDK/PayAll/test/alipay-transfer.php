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

// 囤主题 www.tzhuti.com    支付宝转账参数
$options = [
    'out_biz_no'      => '', // 囤主题 www.tzhuti.com    订单号
    'payee_type'      => 'ALIPAY_LOGONID', // 囤主题 www.tzhuti.com    收款方账户类型(ALIPAY_LOGONID | ALIPAY_USERID)
    'payee_account'   => 'demo@sandbox.com', // 囤主题 www.tzhuti.com    收款方账户
    'amount'          => '10', // 囤主题 www.tzhuti.com    转账金额
    'payer_show_name' => '未寒', // 囤主题 www.tzhuti.com    付款方姓名
    'payee_real_name' => '张三', // 囤主题 www.tzhuti.com    收款方真实姓名
    'remark'          => '张三', // 囤主题 www.tzhuti.com    转账备注
];

try {
    $result = $pay->driver('alipay')->gateway('transfer')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}

