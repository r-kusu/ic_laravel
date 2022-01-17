<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); // リセットする関数

        \App\Models\User::factory(10)->create();
        
        $this->call(
            [
                ItemTableSeeder::class,
                CategoryTableSeeder::class,
                TagsTableSeeder::class,
                Item_tagsTableSeeder::class,
            ]
        );

    }
}
