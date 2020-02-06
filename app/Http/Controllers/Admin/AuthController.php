<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Auth;
use DB;


class AuthController extends Controller
{
    // 列表
    public function index() {
        // 查询数据
        $data = DB::table('auth as t1')
            -> select('t1.*', 't2.auth_name as parent_name')
            -> leftJoin('auth as t2', 't1.pid', '=', 't2.id')
            -> get();
        return view('admin.auth.index', compact('data'));
    }

    // 添加
    public function add(Request $request) {
        // 判断请求类型
        if ($request -> isMethod('post')) {
            // 处理数据
            // 如果需要验证数据可以仿照之前的规则去实现验证
            // 接收数据进入数据表
            $data = $request -> except('_token');
            $result = Auth::insert($data);
            // 由于框架自身不支持响应bool值，所以转化一种形式
            return $result ? '1' : '0';
        }
        else {
            // 查询父级权限
            $parents = Auth::where('pid', '0') -> get();
            // 展示视图
            return view('admin.auth.add', compact('parents'));
        }
    }
}
