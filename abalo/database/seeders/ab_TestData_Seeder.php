<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ab_TestData_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ab_test_data')->insert([
            'id' => 1,
           'ab_testname' => 'Fotokamera'
        ]);
        DB::table('ab_test_data')->insert([
            'id' => 2,
            'ab_testname' => 'Blitzlicht',
        ]);
    }
}
