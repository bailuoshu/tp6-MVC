<?php
declare (strict_types = 1);

namespace app\api\controller;

class Index
{
    public function index()
    {
        return success(200,'hello,siisi !');
    }
}
