<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ab_ShoppingkartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ab_shoppingcart')->insert([
            'id' => 1,
            'ab_creator_id' => 1,
            'ab_createdate' => now(),
        ]);
    }
}
