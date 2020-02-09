<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protype', function (Blueprint $table) {
            $table -> increments('id');  // 主键id
            $table -> string('protype_name',20) -> notNull();  // 分类名称
            $table -> tinyInteger('sort') -> notNull() -> default('0');  // 排序（大 -> 小)）
            $table -> timestamps();
            $table -> enum('status',[1,2]) -> notNull() -> default('2');  // 状态
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protype');
    }
}
