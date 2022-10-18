<?php
// 应用公共文件
if (!function_exists('success')) {
    function success($code = 200, $msg = 'success!', $data = '')
    {
      if($data == ''){
          return json([
              'code' => $code,
              'msg' => $msg
          ],$code);
      }else{
          return json([
              'code' => $code,
              'msg' => $msg,
              'data' => $data,
          ],$code);
      }

    }
}

//400 请求错误  401 需要身份验证  403 服务器拒绝请求  404 服务器找不到网页
//500 服务器内部错误  503 服务器不可用

if (!function_exists('fail')) {
    function fail($code = 500, $msg = '请求错误，请重试！')
    {
        return json([
            'code' => $code,
            'msg' => $msg,
        ],$code);
    }
}