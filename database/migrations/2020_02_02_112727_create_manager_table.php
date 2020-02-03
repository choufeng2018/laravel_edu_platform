<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            // 设计字段
            $table -> bigIncrements('id');  // 主键字段
            $table -> string('username', 20) -> notNull();  // 用户名，长度为20的vchar，不能为Null
            $table -> string('password') -> notNull();  // 密码，varchar(255)，不能为null
            $table -> enum('gender', [1, 2, 3]) -> notNull() -> default('1');  // 性别， 1=男， 2=女， 3=保密
            $table -> string('mobile', 11);  // 手机号，varchar(11)
            $table -> string('email', 50);  // 邮箱，varchar(50)
            $table -> tinyInteger('role_id');  // 角色表中的主键id
            $table -> timestamps();  // created_at 和 updated_at时间字段（系统自己创建)）
            $table -> rememberToken();  // 实现记住登录状态字段，用于存储token
            $table -> enum('status', [1, 2]) -> notNull() -> default('2');  // 账号状态，1=禁用，2=启用
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
