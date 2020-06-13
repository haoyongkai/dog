<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class ObjectListInfo
 *
 * ListObjects接口返回数据
 *
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/bucket/GetBucket.html
 */
class ObjectListInfo
{
    /* 囤主题 www.tzhuti.com*
     * ObjectListInfo constructor.
     *
     * @param string $bucketName
     * @param string $prefix
     * @param string $marker
     * @param string $nextMarker
     * @param string $maxKeys
     * @param string $delimiter
     * @param null $isTruncated
     * @param array $objectList
     * @param array $prefixList
     */
    public function __construct($bucketName, $prefix, $marker, $nextMarker, $maxKeys, $delimiter, $isTruncated, array $objectList, array $prefixList)
    {
        $this->bucketName = $bucketName;
        $this->prefix = $prefix;
        $this->marker = $marker;
        $this->nextMarker = $nextMarker;
        $this->maxKeys = $maxKeys;
        $this->delimiter = $delimiter;
        $this->isTruncated = $isTruncated;
        $this->objectList = $objectList;
        $this->prefixList = $prefixList;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getBucketName()
    {
        return $this->bucketName;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getMarker()
    {
        return $this->marker;
    }

    /* 囤主题 www.tzhuti.com*
     * @return int
     */
    public function getMaxKeys()
    {
        return $this->maxKeys;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /* 囤主题 www.tzhuti.com*
     * @return mixed
     */
    public function getIsTruncated()
    {
        return $this->isTruncated;
    }

    /* 囤主题 www.tzhuti.com*
     * 返回ListObjects接口返回数据中的ObjectInfo列表
     *
     * @return ObjectInfo[]
     */
    public function getObjectList()
    {
        return $this->objectList;
    }

    /* 囤主题 www.tzhuti.com*
     * 返回ListObjects接口返回数据中的PrefixInfo列表
     *
     * @return PrefixInfo[]
     */
    public function getPrefixList()
    {
        return $this->prefixList;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getNextMarker()
    {
        return $this->nextMarker;
    }

    private $bucketName = "";
    private $prefix = "";
    private $marker = "";
    private $nextMarker = "";
    private $maxKeys = 0;
    private $delimiter = "";
    private $isTruncated = null;
    private $objectList = array();
    private $prefixList = array();
}