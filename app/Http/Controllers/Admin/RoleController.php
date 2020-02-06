<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 引入模型
use App\Admin\Role;
use App\Admin\Auth;
use Symfony\Component\Console\Input\Input;

class RoleController extends Controller
{
    // 列表
    public function index() {
        // 查询
        $data = Role::get();
        // 展示视图
        return view('admin.role.index', compact('data'));
    }
    // 分派权限功能
    public function assign(Request $request) {
        // 判断请求类型
        if($request -> isMethod('post')) {
            // 接收数据
            $data = $request -> only(['id', 'auth_id']);
            // 交给模型处理数据
            $role = new Role();
            // 输出返回结果
            return $role -> assignAuth($data);
        } else {
            // 查询一级权限
            $top = Auth::where('pid', '0') -> get();
            // 查询二级权限
            $cat = Auth::where('pid', '!=', '0') -> get();
            // 读取当前角色具备的权限 id 集合
            $ids = Role::where('id', $request -> get('id')) -> value('auth_ids');
            // 展示视图
            return view('admin.role.assign', compact('top', 'cat', 'ids'));
        }
    }
}
