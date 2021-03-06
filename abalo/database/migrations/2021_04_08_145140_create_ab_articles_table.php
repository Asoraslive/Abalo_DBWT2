<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ab_articles', function (Blueprint $table) {
            $table->id();
            $table->string('ab_name',80);
            $table->integer('ab_price');
            $table->string('ab_description',1000);
            $table->foreignId('ab_creator_id')->references('id')->on('ab_users')->cascadeOnDelete();
            $table->timestamp('ab_createdate')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ab_articles');
    }
}
