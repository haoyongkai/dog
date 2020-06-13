<?php

namespace OSS\Result;

use OSS\Model\GetLiveChannelInfo;

class GetLiveChannelInfoResult extends Result
{
    /* 囤主题 www.tzhuti.com*
     * @return
     */
    protected function parseDataFromResponse()
    {
        $content = $this->rawResponse->body;
        $channelList = new GetLiveChannelInfo();
        $channelList->parseFromXml($content);
        return $channelList;
    }
}
