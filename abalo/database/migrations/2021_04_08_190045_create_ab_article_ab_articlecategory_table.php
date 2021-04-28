<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbArticleAbArticlecategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ab_article_ab_articlecategory', function (Blueprint $table) {
            $table->foreignId('ab_article_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ab_articlecategory_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ab_article_ab_articlecategory');
    }
}
