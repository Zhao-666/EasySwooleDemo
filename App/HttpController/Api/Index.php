<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2019/2/21
 * Time: 22:05
 */

namespace App\HttpController\Api;

use App\Lib\Redis\Redis;
use EasySwoole\Core\Component\Di;
use EasySwoole\Core\Http\AbstractInterface\Controller;

class Index extends Controller
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function getVideo()
    {
        /**
         * @var $db \MysqliDb
         */
        $db = Di::getInstance()->get('MYSQL');
        $result = $db->where('id', 1)->getOne('video');

        return $this->writeJson(200, '', $result);
    }

    public function getRedis()
    {
        Redis::getInstance()->set('hello', 'qweqwe');
        $data = Di::getInstance()->get('REDIS')->get('hello');
        return $this->writeJson(200, '', $data);
    }

    public function yaconf()
    {
        $conf = \Yaconf::get('redis');
        return $this->writeJson(200, '', $conf);
    }
}