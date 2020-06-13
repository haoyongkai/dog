<?php

namespace OSS\Result;


/* 囤主题 www.tzhuti.com*
 * Class BodyResult
 * @package OSS\Result
 */
class BodyResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    protected function parseDataFromResponse()
    {
        return empty($this->rawResponse->body) ? "" : $this->rawResponse->body;
    }
}