<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class UploadInfo
 *
 * ListMultipartUpload接口得到的UploadInfo
 *
 * @package OSS\Model
 */
class UploadInfo
{
    /* 囤主题 www.tzhuti.com*
     * UploadInfo constructor.
     *
     * @param string $key
     * @param string $uploadId
     * @param string $initiated
     */
    public function __construct($key, $uploadId, $initiated)
    {
        $this->key = $key;
        $this->uploadId = $uploadId;
        $this->initiated = $initiated;
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
     * @return string
     */
    public function getInitiated()
    {
        return $this->initiated;
    }

    private $key = "";
    private $uploadId = "";
    private $initiated = "";
}