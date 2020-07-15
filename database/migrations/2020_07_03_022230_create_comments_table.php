<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cment_title', 170);
            $table->text('cment_content', 500);
            $table->string('cment_status', 1)->default(1);
            $table->date('cment_date');
            $table->string('user_cment', 100);
            $table->string('product_cment', 170);
            $table->string('reply_cment', 500);
            $table->integer('product_id')->unsigned();
            $table->integer('cust_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('cust_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
