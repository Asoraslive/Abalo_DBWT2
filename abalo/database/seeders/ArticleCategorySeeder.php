<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class ArticleCategorySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'ab_articlecategories';
        $this->file = base_path() . '/database/seeds/articlecategory.csv';
        $this->delimiter = ';';
        $this->mapping = ['id','ab_name','ab_parent'];
        $this->timestamps = false;
    }


    public function run()
    {
        parent::run();
    }
}

