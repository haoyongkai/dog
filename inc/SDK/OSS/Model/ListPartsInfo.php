<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class ListPartsInfo
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/multipart-upload/ListParts.html
 */
class ListPartsInfo
{

    /* 囤主题 www.tzhuti.com*
     * ListPartsInfo constructor.
     * @param string $bucket
     * @param string $key
     * @param string $uploadId
     * @param int $nextPartNumberMarker
     * @param int $maxParts
     * @param string $isTruncated
     * @param array $listPart
     */
    public function __construct($bucket, $key, $uploadId, $nextPartNumberMarker, $maxParts, $isTruncated, array $listPart)
    {
        $this->bucket = $bucket;
        $this->key = $key;
        $this->uploadId = $uploadId;
        $this->nextPartNumberMarker = $nextPartNumberMarker;
        $this->maxParts = $maxParts;
        $this->isTruncated = $isTruncated;
        $this->listPart = $listPart;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
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
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /* 囤主题 www.tzhuti.com*
     * @return int
     */
    public function getNextPartNumberMarker()
    {
        return $this->nextPartNumberMarker;
    }

    /* 囤主题 www.tzhuti.com*
     * @return int
     */
    public function getMaxParts()
    {
        return $this->maxParts;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getIsTruncated()
    {
        return $this->isTruncated;
    }

    /* 囤主题 www.tzhuti.com*
     * @return array
     */
    public function getListPart()
    {
        return $this->listPart;
    }

    private $bucket = "";
    private $key = "";
    private $uploadId = "";
    private $nextPartNumberMarker = 0;
    private $maxParts = 0;
    private $isTruncated = "";
    private $listPart = array();
}