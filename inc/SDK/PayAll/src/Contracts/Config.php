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

namespace Pay\Contracts;

use ArrayAccess;
use Pay\Exceptions\InvalidArgumentException;

/* 囤主题 www.tzhuti.com*
 * 支付配置对象
 * Class Config
 * @package Pay\Contracts
 */
class Config implements ArrayAccess
{
    /* 囤主题 www.tzhuti.com*
     * 配置参数
     * @var array
     */
    protected $config;

    /* 囤主题 www.tzhuti.com*
     * Config constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /* 囤主题 www.tzhuti.com*
     * 获取配置选项
     * @param null|string $key
     * @param null|string $default
     * @return array|mixed|null
     */
    public function get($key = null, $default = null)
    {
        $config = $this->config;
        if (is_null($key)) {
            return $config;
        }
        if (isset($config[$key])) {
            return $config[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if (!is_array($config) || !array_key_exists($segment, $config)) {
                return $default;
            }
            $config = $config[$segment];
        }
        return $config;
    }

    /* 囤主题 www.tzhuti.com*
     * 设置配置选项
     * @param string $key
     * @param string $value
     * @return array
     */
    public function set($key, $value)
    {
        if ($key == '') {
            throw new InvalidArgumentException('Invalid config key.');
        }
        // 囤主题 www.tzhuti.com    只支持三维数组，多余无意义
        $keys = explode('.', $key);
        switch (count($keys)) {
            case '1':
                $this->config[$key] = $value;
                break;
            case '2':
                $this->config[$keys[0]][$keys[1]] = $value;
                break;
            case '3':
                $this->config[$keys[0]][$keys[1]][$keys[2]] = $value;
                break;
            default:
                throw new InvalidArgumentException('Invalid config key.');
        }
        return $this->config;
    }

    /* 囤主题 www.tzhuti.com*
     * 判断是否有配置
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->config);
    }

    /* 囤主题 www.tzhuti.com*
     * 获取配置对象
     * @param string $offset
     * @return array|mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /* 囤主题 www.tzhuti.com*
     * 设置配置对象
     * @param string $offset
     * @param array|mixed|null $value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /* 囤主题 www.tzhuti.com*
     * 清除设置对象
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        $this->set($offset, null);
    }
}
