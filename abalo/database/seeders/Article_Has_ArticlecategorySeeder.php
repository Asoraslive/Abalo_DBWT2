<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeroenZwart\CsvSeeder\CsvSeeder;

class Article_Has_ArticlecategorySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'ab_article_ab_articlecategory';
        $this->file = base_path() . '/database/seeds/article_has_articlecategory.csv';
        $this->delimiter = ';';
        $this->timestamps=false;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
    }
}
