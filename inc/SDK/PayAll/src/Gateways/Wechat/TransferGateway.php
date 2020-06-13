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

use Pay\Exceptions\GatewayException;

use Pay\Gateways\Wechat;

/* 囤主题 www.tzhuti.com*
 * 微信企业打款网关
 * Class TransferGateway
 * @package Pay\Gateways\Wechat
 */
class TransferGateway extends Wechat
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
     * 应用并返回数据
     * @param array $options
     * @return array
     * @throws GatewayException
     */
    public function apply(array $options = [])
    {
        $options['mchid'] = $this->config['mch_id'];
        $options['mch_appid'] = $this->userConfig->get('app_id');
        unset($this->config['appid']);
        unset($this->config['mch_id']);
        unset($this->config['sign_type']);
        unset($this->config['trade_type']);
        unset($this->config['notify_url']);
        $this->config = array_merge($this->config, $options);
        $this->config['sign'] = $this->getSign($this->config);
        $data = $this->fromXml($this->post(
            $this->gateway_transfer, $this->toXml($this->config),
            [
                'ssl_cer' => $this->userConfig->get('ssl_cer', ''),
                'ssl_key' => $this->userConfig->get('ssl_key', ''),
            ]
        ));
        if (!isset($data['return_code']) || $data['return_code'] !== 'SUCCESS' || $data['result_code'] !== 'SUCCESS') {
            $error = 'GetResultError:' . $data['return_msg'];
            $error .= isset($data['err_code_des']) ? ' - ' . $data['err_code_des'] : '';
        }
        if (isset($error)) {
            throw new GatewayException($error, 20001, $data);
        }
        return $data;
    }
}
