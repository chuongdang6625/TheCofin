<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cust_name');
            $table->string('cust_tel', 12)->unique();
            $table->string('cust_email', 100)->unique();
            $table->string('cust_add', 1000);
            $table->string('cust_pass', 50);
            $table->integer('cust_mark')->default(0);
            $table->string('cust_status')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
