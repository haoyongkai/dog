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

return array(
    // 囤主题 www.tzhuti.com    微信支付参数
    'wechat' => array(
        // 囤主题 www.tzhuti.com    沙箱模式
        'debug'      => false,
        // 囤主题 www.tzhuti.com    应用ID
        'app_id'     => zrz_get_pay_settings('weixin','gz_appid'),
        // 囤主题 www.tzhuti.com    微信支付商户号
        'mch_id'     => zrz_get_pay_settings('weixin','mch_id'),
        /* 囤主题 www.tzhuti.com
         // 囤主题 www.tzhuti.com    子商户公众账号ID
         'sub_appid'  => '子商户公众账号ID，需要的时候填写',
         // 囤主题 www.tzhuti.com    子商户号
         'sub_mch_id' => '子商户号，需要的时候填写',
        */
        // 囤主题 www.tzhuti.com    微信支付密钥
        'mch_key'    => zrz_get_pay_settings('weixin','mch_key'),
        // 囤主题 www.tzhuti.com    微信证书 cert 文件
        'ssl_cer'    =>  zrz_get_pay_settings('weixin','key_path') ? zrz_get_pay_settings('weixin','key_path') .'/apiclient_cert.pem' : dirname(ABSPATH) . '/apiclient_cert.pem',
        // 囤主题 www.tzhuti.com    微信证书 key 文件
        'ssl_key'    =>  zrz_get_pay_settings('weixin','key_path') ? zrz_get_pay_settings('weixin','key_path') .'/apiclient_cert.pem' : dirname(ABSPATH) . '/apiclient_key.pem',
        // 囤主题 www.tzhuti.com    缓存目录配置
         'cache_path' => '__DIR__',
        // 囤主题 www.tzhuti.com    支付成功通知地址
        'notify_url' => home_url('/weixinpay-notify'),
        // 囤主题 www.tzhuti.com    网页支付回跳地址
        'return_url' => home_url('/return-pay'),
    ),
    // 囤主题 www.tzhuti.com    支付宝支付参数
    'alipay' => array(
        // 囤主题 www.tzhuti.com    沙箱模式
        'debug'       => false,
        // 囤主题 www.tzhuti.com    应用ID
        'app_id'      => zrz_get_pay_settings('alipay','appid'),
        // 囤主题 www.tzhuti.com    支付宝公钥(1行填写)
        'public_key'  => zrz_get_pay_settings('alipay','alipayPublicKey'),
        // 囤主题 www.tzhuti.com    支付宝私钥(1行填写)
        'private_key' => zrz_get_pay_settings('alipay','saPrivateKey'),
        // 囤主题 www.tzhuti.com    缓存目录配置
        'cache_path'  => '',
        // 囤主题 www.tzhuti.com    支付成功通知地址
        'notify_url'  => home_url('/notify-pay'),
        // 囤主题 www.tzhuti.com    网页支付回跳地址
        'return_url'  => home_url('/return-pay'),
    ),
);
