<?php

namespace OSS\Result;

use OSS\Core\OssException;


/* 囤主题 www.tzhuti.com*
 * Class initiateMultipartUploadResult
 * @package OSS\Result
 */
class InitiateMultipartUploadResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * 结果中获取uploadId并返回
     *
     * @throws OssException
     * @return string
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $xml = simplexml_load_string($content);
        if (isset($xml->UploadId)) {
            return strval($xml->UploadId);
        }
        throw new OssException("cannot get UploadId");
    }
}