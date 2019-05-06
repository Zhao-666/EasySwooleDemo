<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2019/2/25
 * Time: 21:36
 */

namespace App\Lib\Redis;


use EasySwoole\Core\AbstractInterface\Singleton;

class Redis
{
    use Singleton;

    private $redis;

    private function __construct()
    {
        if (!extension_loaded('redis')) {
            throw new \Exception("redis.so文件不存在");
        }
        try {
            $redisConfig = \Yaconf::get('redis');
            $this->redis = new \Redis();
            $result = $this->redis->connect($redisConfig['host'], $redisConfig['port']
                , $redisConfig['time_out']);
        } catch (\Exception $e) {
            throw new \Exception("redis服务异常");
        }
        if ($result == false) {
            throw new \Exception("redis链接失败");
        }
        return $this;
    }

    public function __call($name, $arguments)
    {
        return $this->redis->{$name}(...$arguments);
    }
}