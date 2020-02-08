<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 产生faker实例
        $faker = \Faker\Factory::create('zh_CN');
        // 循环生成数据
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            // 访问具体的属性来获取数据
            $data[$i] = [
                'username'  =>  $faker -> userName,  // 生成用户名
                'password'  =>  bcrypt('123456'),  // 使用框架内置 bcrypt 方法加密密码
                'gender'    =>  rand(1, 3),  // 随机性别
                'mobile'    =>  $faker -> phoneNumber,  // 生成手机号
                'email'     =>  $faker -> email,  // 邮箱
                'role_id'   =>  rand(1, 6),  // 角色 id
                'created_at'=>  date('Y-m-d H:i:s', time()),  // 创建时间
                'status'    =>  rand(1, 2)  // 账号状态
            ];
        }
        // 写入到数据表
        DB::table('manager') -> insert($data);
    }
}
