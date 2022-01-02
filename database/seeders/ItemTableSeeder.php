<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate(); // リセットする関数

        // テーブルにデータを挿入する処理
        DB::table('items')->insert([
            [
            'user_id' => 1,
            'name' => '商品名',
            'image_name' => '商品画像',
            'stock' => 10,
            'threshold' => 50,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => '商品名2',
                'image_name' => '商品画像2',
                'stock' => 20,
                'threshold' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => '商品名3、商品名3、商品名3、商品名3、商品名3、商品名3、商品名3、商品名3、商品名3、商品名3。',
                'image_name' => '商品画像3',
                'stock' => 30,
                'threshold' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'name' => '商品名4、\n商品名4、\n商品名4、\n商品名4、\n商品名4、\n商品名4、\n商品名4、\n商品名4、\n商品名4、\n商品名4。',
                'image_name' => '商品画像4',
                'stock' => 40,
                'threshold' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'name' => '商品名5',
                'image_name' => '商品画像5',
                'stock' => 5000,
                'threshold' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}