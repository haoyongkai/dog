<?php

namespace OSS\Model;

use OSS\Core\OssException;


/* 囤主题 www.tzhuti.com*
 * Class CorsRule
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/cors/PutBucketcors.html
 */
class CorsRule
{
    /* 囤主题 www.tzhuti.com*
     * Rule中增加一条allowedOrigin
     *
     * @param string $allowedOrigin
     */
    public function addAllowedOrigin($allowedOrigin)
    {
        if (!empty($allowedOrigin)) {
            $this->allowedOrigins[] = $allowedOrigin;
        }
    }

    /* 囤主题 www.tzhuti.com*
     * Rule中增加一条allowedMethod
     *
     * @param string $allowedMethod
     */
    public function addAllowedMethod($allowedMethod)
    {
        if (!empty($allowedMethod)) {
            $this->allowedMethods[] = $allowedMethod;
        }
    }

    /* 囤主题 www.tzhuti.com*
     * Rule中增加一条allowedHeader
     *
     * @param string $allowedHeader
     */
    public function addAllowedHeader($allowedHeader)
    {
        if (!empty($allowedHeader)) {
            $this->allowedHeaders[] = $allowedHeader;
        }
    }

    /* 囤主题 www.tzhuti.com*
     * Rule中增加一条exposeHeader
     *
     * @param string $exposeHeader
     */
    public function addExposeHeader($exposeHeader)
    {
        if (!empty($exposeHeader)) {
            $this->exposeHeaders[] = $exposeHeader;
        }
    }

    /* 囤主题 www.tzhuti.com*
     * @return int
     */
    public function getMaxAgeSeconds()
    {
        return $this->maxAgeSeconds;
    }

    /* 囤主题 www.tzhuti.com*
     * @param int $maxAgeSeconds
     */
    public function setMaxAgeSeconds($maxAgeSeconds)
    {
        $this->maxAgeSeconds = $maxAgeSeconds;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到AllowedHeaders列表
     *
     * @return string[]
     */
    public function getAllowedHeaders()
    {
        return $this->allowedHeaders;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到AllowedOrigins列表
     *
     * @return string[]
     */
    public function getAllowedOrigins()
    {
        return $this->allowedOrigins;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到AllowedMethods列表
     *
     * @return string[]
     */
    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到ExposeHeaders列表
     *
     * @return string[]
     */
    public function getExposeHeaders()
    {
        return $this->exposeHeaders;
    }

    /* 囤主题 www.tzhuti.com*
     * 根据提供的xmlRule， 把this按照一定的规则插入到$xmlRule中
     *
     * @param \SimpleXMLElement $xmlRule
     * @throws OssException
     */
    public function appendToXml(&$xmlRule)
    {
        if (!isset($this->maxAgeSeconds)) {
            throw new OssException("maxAgeSeconds is not set in the Rule");
        }
        foreach ($this->allowedOrigins as $allowedOrigin) {
            $xmlRule->addChild(CorsConfig::OSS_CORS_ALLOWED_ORIGIN, $allowedOrigin);
        }
        foreach ($this->allowedMethods as $allowedMethod) {
            $xmlRule->addChild(CorsConfig::OSS_CORS_ALLOWED_METHOD, $allowedMethod);
        }
        foreach ($this->allowedHeaders as $allowedHeader) {
            $xmlRule->addChild(CorsConfig::OSS_CORS_ALLOWED_HEADER, $allowedHeader);
        }
        foreach ($this->exposeHeaders as $exposeHeader) {
            $xmlRule->addChild(CorsConfig::OSS_CORS_EXPOSE_HEADER, $exposeHeader);
        }
        $xmlRule->addChild(CorsConfig::OSS_CORS_MAX_AGE_SECONDS, strval($this->maxAgeSeconds));
    }

    private $allowedHeaders = array();
    private $allowedOrigins = array();
    private $allowedMethods = array();
    private $exposeHeaders = array();
    private $maxAgeSeconds = null;
}