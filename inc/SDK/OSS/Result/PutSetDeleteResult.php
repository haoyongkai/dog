<?php

namespace OSS\Result;


/* 囤主题 www.tzhuti.com*
 * Class PutSetDeleteResult
 * @package OSS\Result
 */
class PutSetDeleteResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return array()
     */
    protected function parseDataFromResponse()
    {
        $body = array('body' => $this->rawResponse->body);
        return array_merge($this->rawResponse->header, $body);
    }
}
