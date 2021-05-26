<?php

namespace Database\Seeders;

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

        // \App\Models\User::factory(10)->create();
        $this->call([
            ab_TestData_Seeder::class,
            UserSeeder::class,
            ArticleSeeder::class,
            ArticleCategorySeeder::class,
            Article_Has_ArticlecategorySeeder::class,
            Ab_ShoppingkartSeeder::class,
        ]);
    }
}
