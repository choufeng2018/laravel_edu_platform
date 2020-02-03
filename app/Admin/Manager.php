<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
// 引入 trait
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    // 定义当前模型需要关联的数据表
    protected $table = 'manager';
    // 使用trait,相当于将整个trait代码段复制到这个位置
    use Authenticatable;
}
