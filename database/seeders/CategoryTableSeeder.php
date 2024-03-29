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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '書籍、書籍、書籍、書籍、書籍、書籍、書籍',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '日用品\n（洗剤、シャンプー、ボディーソープ、ブラシetc...）',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ファッション',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'コスメ',
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
