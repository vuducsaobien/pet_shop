<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('category_id');
            $table->integer('price');
            $table->integer('price_sale');
            $table->integer('sale_percent');
            $table->string('thumb');
            $table->string('product_code');
            $table->string('quantity');
            $table->string('seo_title');
            $table->string('seo_meta');
            $table->string('seo_description');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
