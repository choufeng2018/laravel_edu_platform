<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 写数据
        $faker = \Faker\Factory::create('zh_CN');
        // 循环生成500条数据
        $data = [];
        for ($i = 0; $i < 500; $i++) {
            $data[] = [
                'username'  =>  $faker -> userName,
                'password'  =>  bcrypt('password'),
                'gender'    =>  rand(1, 3),
                'mobile'    =>  $faker -> phoneNumber,
                'email'     =>  $faker -> email,
                'avatar'    =>  '/statics/avatar.jpg',
                'created_at'=>  date('Y-m-d H:i:s'),
                'type'      =>  rand(1, 2),
                'status'    =>  rand(1, 2),
            ];
        }
        // 写入数据
        DB::table('member') -> insert($data);
    }
}
