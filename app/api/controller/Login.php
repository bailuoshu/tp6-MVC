<?php
declare (strict_types = 1);

namespace app\api\controller;



use think\exception\HttpException;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Request;
use thans\jwt\facade\JWTAuth;

class Login
{

    /**
     * 登录接口
     * @param Request $request
     * @return false|string|\think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index(Request $request){
        try {
            $data = input();
            $list = Db::name('siisi_user')->where('uid',$data['uid'])->find();
            if ($list){
                if ($data['password']==$list['password']){
                    $token = JWTAuth::builder([
                        'uid' => $list['uid'],
                        'password' => $list['password']
                    ]);
                    //记录日志功能

                    $data = array(
                        'uid'=>$list['uid'],
                        'name'=>$list['name'],
                        'token'=>$token,
                    );
                    return success(200,'登录成功',$data);
                }else{
                    return success(400,'密码错误');
                }
            }else{
                return success(400,'用户UID错误');
            }
        }catch(HttpException $exception){
            return fail(400);
        }catch (ValidateException $e) {
            return fail(400);
        }
    }
}
