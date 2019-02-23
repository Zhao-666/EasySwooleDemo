<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2019/2/21
 * Time: 22:05
 */

namespace App\HttpController\Api;

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
        $redis = new \Redis();
        $redis->connect('127.0.0.1', '6379');
        $data = $redis->get('hello');
        return $this->writeJson(200, '', $data);
    }
}