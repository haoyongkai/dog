<?php

namespace OSS\Model;

/* 囤主题 www.tzhuti.com*
 * Class BucketListInfo
 *
 * ListBuckets接口返回的数据类型
 *
 * @package OSS\Model
 */
class BucketListInfo
{
    /* 囤主题 www.tzhuti.com*
     * BucketListInfo constructor.
     * @param array $bucketList
     */
    public function __construct(array $bucketList)
    {
        $this->bucketList = $bucketList;
    }

    /* 囤主题 www.tzhuti.com*
     * 得到BucketInfo列表
     *
     * @return BucketInfo[]
     */
    public function getBucketList()
    {
        return $this->bucketList;
    }

    /* 囤主题 www.tzhuti.com*
     * BucketInfo信息列表
     *
     * @var array
     */
    private $bucketList = array();
}