<?php
declare (strict_types = 1);

namespace app\middleware;
use thans\jwt\exception\TokenExpiredException;
use thans\jwt\exception\TokenInvalidException;
use thans\jwt\facade\JWTAuth;
use think\Response;

class Login
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        try {
            //可验证token, 并获取token中的payload部分
            $payload = JWTAuth::auth();
            return $next($request);
        }catch (TokenExpiredException $e){
            return fail(401,'登录信息失效，请先登录');
        }catch (TokenInvalidException $e){
            return fail(400,'无效的Token');
        }catch (\Exception $e){
            return fail(400,'请求信息出错，请重试');
        }
    }
}
