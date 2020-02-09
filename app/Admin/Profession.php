<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    // 定义关联的表
    protected $table = 'profession';

    // 定义与 protype 的关联模型 （一对一）
    public function protype() {
        return $this -> hasOne('App\Admin\Protype', 'id', 'protype_id');
    }
}
