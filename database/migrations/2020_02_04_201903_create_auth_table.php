<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) {
            $table -> bigIncrements('id');  // 主键 id
            $table -> string('auth_name', 20) -> nullable();  // 权限名称
            $table -> string('controller', 40) -> nullable();  // 权限对应的控制器
            $table -> string('action', 30) -> nullable();  // 权限对应的方法
            $table -> tinyInteger('pid');  // 当前权限其父级id
            $table -> enum('is_nav', [1, 2]) -> notNull() -> default('1');  // 是否作为菜单显示
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth');
    }
}
