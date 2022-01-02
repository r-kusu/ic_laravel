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
                'name' => '食料品',
                'item_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '書籍、書籍、書籍、書籍、書籍、書籍、書籍',
                'item_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '日用品\n（洗剤、シャンプー、ボディーソープ、ブラシetc...）',
                'item_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ファッション',
                'item_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'コスメ',
                'item_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
