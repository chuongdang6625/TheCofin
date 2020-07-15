<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_title', 170);
            $table->float('product_price', 9, 2);
            $table->string('product_description', 1000)->nullable();
            $table->string('product_status')->default(1);
            $table->string('product_image');
            $table->integer('productType_id')->unsigned();
            $table->timestamps();
            $table->foreign('productType_id')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
