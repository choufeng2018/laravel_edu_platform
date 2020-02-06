<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // 定义关联的数据表
    protected $table = 'role';
    // 禁用时间
    public $timestamps = false;

    // 将分派的权限进行处理
    public function assignAuth($data) {
        // 处理数据
        // 获取 auth_ids 字段的值
        $post['auth_ids'] = implode(',', $data['auth_id']);  // 1, 2, 3, 4
        // 获取 auth_ac
        $tmp = \App\Admin\Auth::where('pid', '!=', '0') -> whereIn('id', $data['auth_id']) -> get();
        // 循环拼凑 controller 和 action
        $ac = '';
        foreach ($tmp as $key => $value) {
            $ac .= $value -> controller . '@' .$value -> action . ',';
        }
        // 除去末尾的逗号
        $post['auth_ac'] = strtolower(rtrim($ac, ','));
        // 修改数据
        return self::where('id', $data['id']) -> update($post);
    }
}
