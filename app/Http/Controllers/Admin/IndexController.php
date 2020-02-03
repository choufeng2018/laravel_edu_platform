<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 首页
    public function index() {
        return view('admin.index.index');
    }

    // 首页 - 框架页面
    public function welcome() {
        return view('admin.index.welcome');
    }
}
