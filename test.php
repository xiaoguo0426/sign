<?php

require 'vendor/autoload.php';

use Onetech\Sign;
use Onetech\Exceptions\InvalidArgumentException;

$redis = new Redis();

$redis->connect('redis', 6379);

$config = [
    'prefix' => 'sign::'
];

try {
    $sign = new Sign($redis, $config);

    $unique_id = 10087;

    $key = $sign->getKey($unique_id);

    $date = '2019-05-10';

    echo $date . ' 签到成功';

    echo '处于一年中的第' . date('z', strtotime($date)) . '天';

    $sign->sign($key, $date);//签到

    echo $sign->checkSign($key, $date);//检查指定日期是否有签到  eg. 2019-02-30

    echo '签到总次数为' . $sign->getSignCount($key);//获取总的签到次数

    echo $sign->getFirstSignDate($key);//第一次签到的日期

    echo $sign->getSign($key);//获取总共的签到情况

    echo $sign->getRangeCount($key, '2019-01-01', '2019-01-10');//指定日期范围的签到情况

    echo $sign->getWeek($key);//当前周的签到情况

    echo $sign->getLastDays($key, 7);//过去7天的签到情况

    echo $sign->getMonth($key);//获取当前月的签到情况

} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}