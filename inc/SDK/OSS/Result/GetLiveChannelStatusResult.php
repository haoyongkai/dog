<?php

namespace OSS\Result;

use OSS\Model\GetLiveChannelStatus;

class GetLiveChannelStatusResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $channelList = new GetLiveChannelStatus();
        $channelList->parseFromXml($content);
        return $channelList;
    }
}
