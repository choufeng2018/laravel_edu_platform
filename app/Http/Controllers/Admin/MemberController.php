<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Member;
use Symfony\Component\Console\Input\Input;
use DB;

class MemberController extends Controller
{
    // 列表方法
    public function index() {
        // 查询数据
        $data = Member::get();
        // 展示视图
        return view('admin.member.index', compact('data'));
    }

    // 添加方法
    public function add(Request $request) {
        // 判断请求类型
        if ($request -> isMethod('POST')) {
            // 实现数据的保存
            // 自动验证
            $result = Member::insert([
                'username'  =>  $request -> get('username'),
                'password'  =>  bcrypt('password'),
                'gender'    =>  $request -> get('gender'),
                'mobile'    =>  $request -> get('mobile'),
                'email'     =>  $request -> get('email'),
                'avatar'    =>  $request -> get('avatar'),
                'country_id'=>  $request -> get('country_id'),
                'province_id'=> $request -> get('province_id'),
                'city_id'   =>  $request -> get('city_id'),
                'county_id' =>  $request -> get('type'),
                'type'      =>  $request -> get('status'),
                'status'    =>  $request -> get('status'),
                'created_at'=>  date('Y-m-d H:i:s')
            ]);
            // 返回输出
            return $result ? '1' : '0';
        } else {
            // 查询数据(国家的数据)
            $country = DB::table('area') -> where('pid', '0') -> get();
            // 展示视图
            return view('admin.member.add', compact('country'));
        }
    }

    // ajax 四级联动获取下属地区
    public function getAreaById(Request $request) {
        // 接收 id
        $id = $request -> get('id');
        // 根据 id 去查询下属地区
        $data = DB::table('area') -> where('pid', $id) -> get();
        // 返回 json 数据
        return response() -> json($data);
    }
}
