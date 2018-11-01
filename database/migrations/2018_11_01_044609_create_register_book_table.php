<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_name');
            $table->string('class_name');
            $table->integer('phone_number');
            $table->string('email');
            $table->string('name_book');
            $table->date('borrowed_day');
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
        Schema::dropIfExists('register_book');
    }
}
