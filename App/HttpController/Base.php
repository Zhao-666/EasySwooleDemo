<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2019/2/20
 * Time: 23:16
 */

namespace App\HttpController;


use EasySwoole\Core\Http\AbstractInterface\Controller;

class Base extends Controller
{

    function index()
    {
        // TODO: Implement index() method.
    }

    public function onRequest($action):?bool
    {
        return true;
    }

    public function onException(\Throwable $throwable, $actionName): void
    {
        $this->writeJson(400, '请求不合法');
    }
}