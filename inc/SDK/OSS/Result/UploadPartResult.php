<?php

namespace OSS\Result;

use OSS\Core\OssException;

/* 囤主题 www.tzhuti.com*
 * Class UploadPartResult
 * @package OSS\Result
 */
class UploadPartResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * 结果中part的ETag
     *
     * @return string
     * @throws OssException
     */
    protected function parseDataFromResponse()
    {
        $header = $this->rawResponse->header;
        if (isset($header["etag"])) {
            return $header["etag"];
        }
        throw new OssException("cannot get ETag");

    }
}