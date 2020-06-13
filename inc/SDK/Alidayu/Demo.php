<?php

/* 囤主题 www.tzhuti.com
 * 此文件用于验证短信API接口
 * 请确保文件为utf-8编码，并替换相应参数为您自己的信息后执行
 * 建议执行前执行EnvTest.php验证PHP环境
 *
 * 2017/11/19
 */

require_once 'SmsApi.php';

use Aliyun\DySDKLite\Sms\SmsApi;

// 囤主题 www.tzhuti.com    调用示例：
set_time_limit(0);
header('Content-Type: text/plain; charset=utf-8');  // 囤主题 www.tzhuti.com    仅用于输出清晰，非必需

$sms = new SmsApi("your access key", "your access key secret"); // 囤主题 www.tzhuti.com    请参阅 https:// 囤主题 www.tzhuti.com   ak-console.aliyun.com/ 获取AK信息

$response = $sms->sendSms(
    "短信签名", // 囤主题 www.tzhuti.com    短信签名
    "SMS_0000001", // 囤主题 www.tzhuti.com    短信模板编号
    "12345678901", // 囤主题 www.tzhuti.com    短信接收者
    Array (  // 囤主题 www.tzhuti.com    短信模板中字段的值
        "code"=>"12345",
        "product"=>"dsd"
    ),
    "123"   // 囤主题 www.tzhuti.com    流水号,选填
);
echo "发送短信(sendSms)接口返回的结果:\n";
print_r($response);

sleep(2);

$response = $sms->queryDetails(
    "12345678901",  // 囤主题 www.tzhuti.com    手机号码
    "20170718", // 囤主题 www.tzhuti.com    发送时间
    10, // 囤主题 www.tzhuti.com    分页大小
    1 // 囤主题 www.tzhuti.com    当前页码
    // 囤主题 www.tzhuti.com    "abcd" // 囤主题 www.tzhuti.com    bizId 短信发送流水号，选填
);
echo "查询短信发送情况(queryDetails)接口返回的结果:\n";
print_r($response);