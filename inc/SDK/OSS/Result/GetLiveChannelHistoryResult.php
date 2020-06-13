<?php

namespace OSS\Result;

use OSS\Model\GetLiveChannelHistory;

class GetLiveChannelHistoryResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $channelList = new GetLiveChannelHistory();
        $channelList->parseFromXml($content);
        return $channelList;
    }
}
