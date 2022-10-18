<?php
declare (strict_types = 1);

namespace app\test\controller;
use thans\jwt\facade\JWTAuth;

class Index
{
    public function index()
    {
        $token = JWTAuth::builder(['uid' => 1]);//参数为用户认证的信息，请自行添加
        return success(200,$token);
    }
}
