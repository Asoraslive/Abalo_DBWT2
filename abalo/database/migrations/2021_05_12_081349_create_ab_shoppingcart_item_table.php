<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbShoppingcartItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ab_shoppingcart_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ab_shoppingcart_id')->references('id')->on('ab_shoppingcart')->cascadeOnDelete();
            $table->foreignId('ab_article_id')->references('id')->on('ab_articles')->cascadeOnDelete();
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
        Schema::dropIfExists('ab_shoppingcart_item');
    }
}
