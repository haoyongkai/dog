<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class RefererConfig
 *
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/bucket/PutBucketReferer.html
 */
class RefererConfig implements XmlConfig
{
    /* 囤主题 www.tzhuti.com*
     * @param string $strXml
     * @return null
     */
    public function parseFromXml($strXml)
    {
        $xml = simplexml_load_string($strXml);
        if (!isset($xml->AllowEmptyReferer)) return;
        if (!isset($xml->RefererList)) return;
        $this->allowEmptyReferer =
            (strval($xml->AllowEmptyReferer) === 'TRUE' || strval($xml->AllowEmptyReferer) === 'true') ? true : false;

        foreach ($xml->RefererList->Referer as $key => $refer) {
            $this->refererList[] = strval($refer);
        }
    }


    /* 囤主题 www.tzhuti.com*
     * 把RefererConfig序列化成xml
     *
     * @return string
     */
    public function serializeToXml()
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><RefererConfiguration></RefererConfiguration>');
        if ($this->allowEmptyReferer) {
            $xml->addChild('AllowEmptyReferer', 'true');
        } else {
            $xml->addChild('AllowEmptyReferer', 'false');
        }
        $refererList = $xml->addChild('RefererList');
        foreach ($this->refererList as $referer) {
            $refererList->addChild('Referer', $referer);
        }
        return $xml->asXML();
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    function __toString()
    {
        return $this->serializeToXml();
    }

    /* 囤主题 www.tzhuti.com*
     * @param boolean $allowEmptyReferer
     */
    public function setAllowEmptyReferer($allowEmptyReferer)
    {
        $this->allowEmptyReferer = $allowEmptyReferer;
    }

    /* 囤主题 www.tzhuti.com*
     * @param string $referer
     */
    public function addReferer($referer)
    {
        $this->refererList[] = $referer;
    }

    /* 囤主题 www.tzhuti.com*
     * @return boolean
     */
    public function isAllowEmptyReferer()
    {
        return $this->allowEmptyReferer;
    }

    /* 囤主题 www.tzhuti.com*
     * @return array
     */
    public function getRefererList()
    {
        return $this->refererList;
    }

    private $allowEmptyReferer = true;
    private $refererList = array();
}