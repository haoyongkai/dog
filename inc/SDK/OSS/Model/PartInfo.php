<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class PartInfo
 * @package OSS\Model
 */
class PartInfo
{
    /* 囤主题 www.tzhuti.com*
     * PartInfo constructor.
     *
     * @param int $partNumber
     * @param string $lastModified
     * @param string $eTag
     * @param int $size
     */
    public function __construct($partNumber, $lastModified, $eTag, $size)
    {
        $this->partNumber = $partNumber;
        $this->lastModified = $lastModified;
        $this->eTag = $eTag;
        $this->size = $size;
    }

    /* 囤主题 www.tzhuti.com*
     * @return int
     */
    public function getPartNumber()
    {
        return $this->partNumber;
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
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    private $partNumber = 0;
    private $lastModified = "";
    private $eTag = "";
    private $size = 0;
}