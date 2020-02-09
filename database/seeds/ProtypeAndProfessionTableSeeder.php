<?php

use Illuminate\Database\Seeder;

class ProtypeAndProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 创建两个数据表的模拟数据
        DB::table('profession') -> insert([
            'pro_name'		=>	'php基础班',
            'protype_id'	=>	'1',
            'teachers_ids'	=>	'1, 3, 4, 6',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	18,
            'cover_img'		=>	'/statics/demo.jpg',
            'price'			=>	'100.00'
        ]);
        DB::table('profession') -> insert([
            'pro_name'		=>	'php就业班',
            'protype_id'	=>	'1',
            'teachers_ids'	=>	'11, 13, 18, 19',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	98,
            'cover_img'		=>	'/statics/demo.jpg',
            'price'			=>	'200.00'
        ]);
        DB::table('profession') -> insert([
            'pro_name'		=>	'前端基础班',
            'protype_id'	=>	'2',
            'teachers_ids'	=>	'22, 25, 27, 28',
            'created_at'	=> 	date('Y-m-d H:i:s'),
            'duration'		=>	90,
            'cover_img'		=>	'/statics/demo.jpg',
            'price'			=>	'100.00'
        ]);
    }
}
