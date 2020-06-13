<?php

namespace OSS\Result;


/* 囤主题 www.tzhuti.com*
 * Class CallbackResult
 * @package OSS\Result
 */
class CallbackResult extends PutSetDeleteResult
{
    protected function isResponseOk()
    {
        $status = $this->rawResponse->status;
        if ((int)(intval($status) / 100) == 2 && (int)(intval($status)) !== 203) {
            return true;
        }
        return false;
    }

}
