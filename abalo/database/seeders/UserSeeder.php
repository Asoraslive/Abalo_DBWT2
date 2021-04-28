<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;
class UserSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'ab_users';
        $this->file = base_path().'/database/seeds/user.csv';
        $this->delimiter=';';
        $this->timestamps = false;
    }


    public function run()
    {
        parent::run();
    }
}
