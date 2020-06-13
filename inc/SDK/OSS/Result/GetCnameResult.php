<?php

namespace OSS\Result;

use OSS\Model\CnameConfig;

class GetCnameResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return CnameConfig
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $config = new CnameConfig();
        $config->parseFromXml($content);
        return $config;
    }
}