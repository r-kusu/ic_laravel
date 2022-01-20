<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate(); // リセットする関数

        // テーブルにデータを挿入する処理
        DB::table('tags')->insert([
            [
                'tag_name' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_name' => '（id:1は空欄）',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_name' => 'セイユー',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_name' => '親',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_name' => 'あ、\nあ、\nあ、\nあ、\nあ、\nあ、\nあ、\nあ、\nあ、\nあ。',
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
