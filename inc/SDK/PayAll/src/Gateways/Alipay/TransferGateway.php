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

namespace Pay\Gateways\Alipay;

use Pay\Gateways\Alipay;

/* 囤主题 www.tzhuti.com*
 * 支付宝转账网关
 * Class TransferGateway
 * @package Pay\Gateways\Alipay
 */
class TransferGateway extends Alipay
{

    /* 囤主题 www.tzhuti.com*
     * 当前接口方法
     * @return string
     */
    protected function getMethod()
    {
        return 'alipay.fund.trans.toaccount.transfer';
    }

    /* 囤主题 www.tzhuti.com*
     * 当前接口产品码
     * @return string
     */
    protected function getProductCode()
    {
        return '';
    }

    /* 囤主题 www.tzhuti.com*
     * 应用并返回参数
     * @param array $options
     * @return array|bool
     * @throws \Pay\Exceptions\GatewayException
     */
    public function apply(array $options = [])
    {
        return $this->getResult($options, $this->getMethod());
    }
}
