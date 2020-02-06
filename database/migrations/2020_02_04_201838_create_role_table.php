<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table -> bigIncrements('id');  // 主键
            $table -> string('role_name', 20) -> notNull();  // 角色名称
            $table -> text('auth_ids');  // 权限id集合
            $table -> text('auth_ac');  // 权限控制器和方法组合字符串
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
