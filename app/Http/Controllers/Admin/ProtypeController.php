<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 引入模型
use App\Admin\Protype;
class ProtypeController extends Controller
{
    // 列表
    public function index () {
        // 获取数据
        $data = Protype::orderBy('sort', 'desc') -> get();
        // 展示视图
        return view('admin.protype.index', compact('data'));
    }
}
