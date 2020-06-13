<?php

namespace OSS\Model;


/* 囤主题 www.tzhuti.com*
 * Bucket信息，ListBuckets接口返回数据
 *
 * Class BucketInfo
 * @package OSS\Model
 */
class BucketInfo
{
    /* 囤主题 www.tzhuti.com*
     * BucketInfo constructor.
     *
     * @param string $location
     * @param string $name
     * @param string $createDate
     */
    public function __construct($location, $name, $createDate)
    {
        $this->location = $location;
        $this->name = $name;
        $this->createDate = $createDate;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到bucket所在的region
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到bucket的名称
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到bucket的创建时间
     *
     * @return string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /* 囤主题 www.tzhuti.com*
     * bucket所在的region
     *
     * @var string
     */
    private $location;
    /* 囤主题 www.tzhuti.com*
     * bucket的名称
     *
     * @var string
     */
    private $name;

    /* 囤主题 www.tzhuti.com*
     * bucket的创建事件
     *
     * @var string
     */
    private $createDate;

}