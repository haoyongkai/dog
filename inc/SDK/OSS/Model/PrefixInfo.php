<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class PrefixInfo
 *
 * listObjects接口中返回的Prefix列表中的类
 * listObjects接口返回数据中包含两个Array:
 * 一个是拿到的Object列表【可以理解成对应文件系统中的文件列表】
 * 一个是拿到的Prefix列表【可以理解成对应文件系统中的目录列表】
 *
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/bucket/GetBucket.html
 */
class PrefixInfo
{
    /* 囤主题 www.tzhuti.com*
     * PrefixInfo constructor.
     * @param string $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    private $prefix;
}