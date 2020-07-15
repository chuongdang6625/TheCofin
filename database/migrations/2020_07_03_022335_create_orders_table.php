<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->date('order_date');
            $table->boolean('order_confirm');
            $table->boolean('order_delivery');
            $table->string('order_status',1)->default(1);
            $table->integer('cust_id')->unsigned();
            $table->string('cust_mail', 100)->unique();
            $table->string('cust_tel', 10)->unique();
            $table->string('cust_name', 100);
            $table->string('cust_add', 500);
            $table->float('order_price',9,2);
            $table->string('order_note', 255)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
