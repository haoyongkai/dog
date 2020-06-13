<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class LifecycleAction
 * @package OSS\Model
 * @link http:// 囤主题 www.tzhuti.com   help.aliyun.com/document_detail/oss/api-reference/bucket/PutBucketLifecycle.html
 */
class LifecycleAction
{
    /* 囤主题 www.tzhuti.com*
     * LifecycleAction constructor.
     * @param string $action
     * @param string $timeSpec
     * @param string $timeValue
     */
    public function __construct($action, $timeSpec, $timeValue)
    {
        $this->action = $action;
        $this->timeSpec = $timeSpec;
        $this->timeValue = $timeValue;
    }

    /* 囤主题 www.tzhuti.com*
     * @return LifecycleAction
     */
    public function getAction()
    {
        return $this->action;
    }

    /* 囤主题 www.tzhuti.com*
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getTimeSpec()
    {
        return $this->timeSpec;
    }

    /* 囤主题 www.tzhuti.com*
     * @param string $timeSpec
     */
    public function setTimeSpec($timeSpec)
    {
        $this->timeSpec = $timeSpec;
    }

    /* 囤主题 www.tzhuti.com*
     * @return string
     */
    public function getTimeValue()
    {
        return $this->timeValue;
    }

    /* 囤主题 www.tzhuti.com*
     * @param string $timeValue
     */
    public function setTimeValue($timeValue)
    {
        $this->timeValue = $timeValue;
    }

    /* 囤主题 www.tzhuti.com*
     * appendToXml 把actions插入到xml中
     *
     * @param \SimpleXMLElement $xmlRule
     */
    public function appendToXml(&$xmlRule)
    {
        $xmlAction = $xmlRule->addChild($this->action);
        $xmlAction->addChild($this->timeSpec, $this->timeValue);
    }

    private $action;
    private $timeSpec;
    private $timeValue;

}