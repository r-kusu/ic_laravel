<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate(); // リセットする関数

        // テーブルにデータを挿入する処理
        DB::table('categories')->insert([
            [
            'item_id' => 1,
            'key' => 1,
            'value' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'item_id' => 2,
                'key' => 2,
                'value' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => 3,
                'key' => 2,
                'value' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => 4,
                'key' => 3,
                'value' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => 5,
                'key' => 4,
                'value' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
