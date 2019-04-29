<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/1/9
 * Time: 下午1:04
 */

namespace EasySwoole;

use App\Lib\Redis\Redis;
use EasySwoole\Core\AbstractInterface\EventInterface;
use EasySwoole\Core\Component\Di;
use EasySwoole\Core\Http\Request;
use EasySwoole\Core\Http\Response;
use EasySwoole\Core\Swoole\EventRegister;
use EasySwoole\Core\Swoole\ServerManager;
use EasySwoole\Core\Utility\File;

Class EasySwooleEvent implements EventInterface
{

    public static function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
        self::loadFile(EASYSWOOLE_ROOT.'/Config');
    }

    public static function loadFile($confPath)
    {
        $conf = Config::getInstance();
        $files = File::scanDir($confPath);
        foreach ($files as $file) {
            $data = require_once $file;
            $conf->setConf(strtolower(basename($file, '.php')), (array)$data);
        }
    }

    public static function mainServerCreate(ServerManager $server, EventRegister $register): void
    {
        // TODO: Implement mainServerCreate() method.
        Di::getInstance()->set('MYSQL', \MysqliDb::class, Array(
                'host' => '192.168.56.1',
                'username' => 'root',
                'password' => '123123',
                'db' => 'imooc_video',
                'port' => 3306,
                'charset' => 'utf8')
        );

        Di::getInstance()->set('REDIS', Redis::getInstance());
    }

    public static function onRequest(Request $request, Response $response): void
    {
        // TODO: Implement onRequest() method.
    }

    public static function afterAction(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}