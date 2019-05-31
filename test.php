<?php

require 'vendor/autoload.php';

use Onetech\Sign;

$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

$config = [
    'prefix' => 'sign::'
];

$sign = new Sign($redis, $config);

$unique_id = 10087;

$key = $sign->getKey($unique_id);

echo $key . PHP_EOL;

$date = '2019-01-01';
//echo $date . ' 签到成功';
//echo PHP_EOL;
//echo '处于一年中的第' . date('z', strtotime($date)) . '天';
//$sign->sign($key, $date);//签到
////die();
//echo PHP_EOL;
//echo '检查 ' . $date;
//echo PHP_EOL;
//echo $sign->checkSign($key, $date);//检查给定日期是否有签到
//echo PHP_EOL;
////echo PHP_EOL;
//echo '签到总次数为' . $sign->getSignCount($key);//一年中签到的次数
//echo PHP_EOL;


//echo $sign->getFirstSignDate($key);//第一次签到的日期

//var_dump($sign->getRangeCount($key, '2019-01-01', '2019-12-12'));


var_dump($sign->getSign($key));

