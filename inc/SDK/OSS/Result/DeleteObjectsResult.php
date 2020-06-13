<?php

namespace OSS\Result;


/* 囤主题 www.tzhuti.com*
 * Class DeleteObjectsResult
 * @package OSS\Result
 */
class DeleteObjectsResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return array()
     */
    protected function parseDataFromResponse()
    {
        $body = $this->rawResponse->body;
        $xml = simplexml_load_string($body); 
        $objects = array();

        if (isset($xml->Deleted)) {
            foreach($xml->Deleted as $deleteKey)
                $objects[] = $deleteKey->Key;
        }
        return $objects;
    }
}
