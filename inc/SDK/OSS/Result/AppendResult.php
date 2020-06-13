<?php

namespace OSS\Result;

use OSS\Core\OssException;

/* 囤主题 www.tzhuti.com*
 * Class AppendResult
 * @package OSS\Result
 */
class AppendResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * 结果中part的next-append-position
     *
     * @return int
     * @throws OssException
     */
    protected function parseDataFromResponse()
    {
        $header = $this->rawResponse->header;
        if (isset($header["x-oss-next-append-position"])) {
            return intval($header["x-oss-next-append-position"]);
        }
        throw new OssException("cannot get next-append-position");
    }
}