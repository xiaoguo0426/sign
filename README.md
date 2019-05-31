<h1 align="center"> Onetech/sign </h1>

<p align="center"> 
基于redis的bitmap实现的签到功能
</p>


## Installing

```shell
$ composer require Onetech/sign -vvv
```

## Usage

```php
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

$date = '2019-05-10';

echo $date . ' 签到成功';

echo '处于一年中的第' . date('z', strtotime($date)) . '天';

$sign->sign($key, $date);//签到

echo $sign->checkSign($key, $date);//检查指定日期是否有签到

echo '签到总次数为' . $sign->getSignCount($key);//获取总的签到次数

echo $sign->getFirstSignDate($key);//第一次签到的日期

echo $sign->getSign($key);//获取总共的签到情况

echo $sign->getRangeCount($key,'2019-01-01', '2019-01-10');//指定日期范围的签到情况

echo $sign->getWeek($key);//当前周的签到情况

echo $sign->getLastDays($key, 7);//过去7天的签到情况

echo $sign->getMonth($key);//获取当前月的签到情况
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/xiaoguo0426/sign/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/xiaoguo0426/sign/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT