<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_book')->unsigned();
            $table->foreign('id_book')->references('id')->on('books');
            $table->integer('id_bill')->unsigned();
            $table->foreign('id_bill')->references('id')->on('bills');
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
        Schema::dropIfExists('bills_detail');
    }
}
