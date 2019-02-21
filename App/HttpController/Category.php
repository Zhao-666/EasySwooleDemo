<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 2019/2/20
 * Time: 22:43
 */

namespace App\HttpController;


class Category extends Base
{

    public function index()
    {
        $data = [
            'id' => 1,
            'name' => 'test',
            'params' => $this->request()->getRequestParam()
        ];
        return $this->writeJson(200, '', $data);
    }
}