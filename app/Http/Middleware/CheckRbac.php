<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Auth;

class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin') -> user() -> role_id != '1') {
            // RBAC鉴权
            // 获取当前的路由  App\Http\Controllers\Admin\IndexController@index
            $route = Route::currentRouteAction();
            // 获取当前用户对应的角色已经具备的权限，注意例外
            $ac = Auth::guard('admin') -> user() -> role -> auth_ac;
            $ac = strtolower($ac . ',indexcontroller@index, indexcontroller@welcome');
            // 判断权限
            $routeArr = explode('\\', $route);
            if (strpos($ac, strtolower(end($routeArr))) === false) {
                exit("<h1>您没有访问权限！</h1>");
            }
        }
        // 继续后续的请求
        return $next($request);
    }
}
