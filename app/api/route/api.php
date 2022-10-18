<?php
use think\facade\Route;



// 强制路由后，未创建控制器将返回404
Route::miss(function() {
    return json('404 Not Found!',404);
});
