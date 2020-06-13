<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Interface XmlConfig
 * @package OSS\Model
 */
interface XmlConfig
{

    /* 囤主题 www.tzhuti.com*
     * 接口定义，实现此接口的类都需要实现从xml数据解析的函数
     *
     * @param string $strXml
     * @return null
     */
    public function parseFromXml($strXml);

    /* 囤主题 www.tzhuti.com*
     * 接口定义，实现此接口的类，都需要实现把子类序列化成xml字符串的接口
     *
     * @return string
     */
    public function serializeToXml();

}
