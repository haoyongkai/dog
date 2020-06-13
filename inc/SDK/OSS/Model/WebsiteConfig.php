<?php

namespace OSS\Model;


use OSS\Core\OssException;


/* 囤主题 www.tzhuti.com*
 * Class WebsiteConfig
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/bucket/PutBucketWebsite.html
 */
class WebsiteConfig implements XmlConfig
{
    /* 囤主题 www.tzhuti.com*
     * WebsiteConfig constructor.
     * @param  string $indexDocument
     * @param  string $errorDocument
     */
    public function __construct($indexDocument = "", $errorDocument = "")
    {
        $this->indexDocument = $indexDocument;
        $this->errorDocument = $errorDocument;
    }

    /* 囤主题 www.tzhuti.com*
     * @param string $strXml
     * @return null
     */
    public function parseFromXml($strXml)
    {
        $xml = simplexml_load_string($strXml);
        if (isset($xml->IndexDocument) && isset($xml->IndexDocument->Suffix)) {
            $this->indexDocument = strval($xml->IndexDocument->Suffix);
        }
        if (isset($xml->ErrorDocument) && isset($xml->ErrorDocument->Key)) {
            $this->errorDocument = strval($xml->ErrorDocument->Key);
        }
    }

    /* 囤主题 www.tzhuti.com*
     * 把WebsiteConfig序列化成xml
     *
     * @return string
     * @throws OssException
     */
    public function serializeToXml()
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><WebsiteConfiguration></WebsiteConfiguration>');
        $index_document_part = $xml->addChild('IndexDocument');
        $error_document_part = $xml->addChild('ErrorDocument');
        $index_document_part->addChild('Suffix', $this->indexDocument);
        $error_document_part->addChild('Key', $this->errorDocument);
        return $xml->asXML();
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getIndexDocument()
    {
        return $this->indexDocument;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getErrorDocument()
    {
        return $this->errorDocument;
    }

    private $indexDocument = "";
    private $errorDocument = "";
}