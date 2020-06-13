<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 *
 * Class ObjectInfo
 *
 * listObjects接口中返回的Object列表中的类
 *
 * listObjects接口返回数据中包含两个Array
 * 一个是拿到的Object列表【可以理解成对应文件系统中的文件列表】
 * 一个是拿到的Prefix列表【可以理解成对应文件系统中的目录列表】
 *
 * @package OSS\Model
 */
class ObjectInfo
{
    /* 囤主题 www.tzhuti.com*
     * ObjectInfo constructor.
     *
     * @param string $key
     * @param string $lastModified
     * @param string $eTag
     * @param string $type
     * @param int $size
     * @param string $storageClass
     */
    public function __construct($key, $lastModified, $eTag, $type, $size, $storageClass)
    {
        $this->key = $key;
        $this->lastModified = $lastModified;
        $this->eTag = $eTag;
        $this->type = $type;
        $this->size = $size;
        $this->storageClass = $storageClass;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getETag()
    {
        return $this->eTag;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /* 囤主题 www.tzhuti.com*
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getStorageClass()
    {
        return $this->storageClass;
    }

    private $key = "";
    private $lastModified = "";
    private $eTag = "";
    private $type = "";
    private $size = 0;
    private $storageClass = "";
}