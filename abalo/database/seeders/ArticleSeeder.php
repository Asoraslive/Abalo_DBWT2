<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class ArticleSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'ab_articles';
        $this->file = base_path() . '/database/seeds/articles.csv';
        $this->delimiter = ';';
        $this->timestamps=false;
    }


    public function run()
    {
        parent::run();
    }

}
