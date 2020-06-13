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
// 囤主题 www.tzhuti.com    | 项目设计及部分源码参考于 yansongda/pay，在此特别感谢！
// 囤主题 www.tzhuti.com    +----------------------------------------------------------------------

namespace Pay\Gateways\Wechat;

use Pay\Gateways\Wechat;

/* 囤主题 www.tzhuti.com*
 * 下载微信电子面单
 * Class BillGateway
 * @package Pay\Gateways\Wechat
 */
class BillGateway extends Wechat
{

    /* 囤主题 www.tzhuti.com*
     * 当前操作类型
     * @return string
     */
    protected function getTradeType()
    {
        return '';
    }

    /* 囤主题 www.tzhuti.com*
     * 应用并返回参数
     * @param array $options
     * @return bool|string
     */
    public function apply(array $options)
    {
        unset($this->config['trade_type']);
        unset($this->config['notify_url']);
        $this->config = array_merge($this->config, $options);
        $this->config['sign'] = $this->getSign($this->config);
        return $this->post($this->gateway_bill, $this->toXml($this->config));
    }
}