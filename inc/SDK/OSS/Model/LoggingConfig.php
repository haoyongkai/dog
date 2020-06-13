<?php

namespace OSS\Model;


/* 囤主题 www.tzhuti.com*
 * Class LoggingConfig
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/bucket/PutBucketLogging.html
 */
class LoggingConfig implements XmlConfig
{
    /* 囤主题 www.tzhuti.com*
     * LoggingConfig constructor.
     * @param null $targetBucket
     * @param null $targetPrefix
     */
    public function __construct($targetBucket = null, $targetPrefix = null)
    {
        $this->targetBucket = $targetBucket;
        $this->targetPrefix = $targetPrefix;
    }

    /* 囤主题 www.tzhuti.com*
     * @param $strXml
     * @return null
     */
    public function parseFromXml($strXml)
    {
        $xml = simplexml_load_string($strXml);
        if (!isset($xml->LoggingEnabled)) return;
        foreach ($xml->LoggingEnabled as $status) {
            foreach ($status as $key => $value) {
                if ($key === 'TargetBucket') {
                    $this->targetBucket = strval($value);
                } elseif ($key === 'TargetPrefix') {
                    $this->targetPrefix = strval($value);
                }
            }
            break;
        }
    }

    /* 囤主题 www.tzhuti.com*
     *  序列化成xml字符串
     *
     */
    public function serializeToXml()
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><BucketLoggingStatus></BucketLoggingStatus>');
        if (isset($this->targetBucket) && isset($this->targetPrefix)) {
            $loggingEnabled = $xml->addChild('LoggingEnabled');
            $loggingEnabled->addChild('TargetBucket', $this->targetBucket);
            $loggingEnabled->addChild('TargetPrefix', $this->targetPrefix);
        }
        return $xml->asXML();
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function __toString()
    {
        return $this->serializeToXml();
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getTargetBucket()
    {
        return $this->targetBucket;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getTargetPrefix()
    {
        return $this->targetPrefix;
    }

    private $targetBucket = "";
    private $targetPrefix = "";

}