<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Studentcards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("studentcards",function($table){
            $table->increments('id');
            $table->string('card_id',200)->default('')->unique()->nullable();
            $table->string('type',200)->default('normal');
            $table->string('name',200)->default('')->nullable();
            $table->string('email',200)->default('')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('other',900)->default('')->nullable();
            $table->dateTime('expiry_datetime')->default('2018-12-31 23:59:59')->nullable();
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
        //
        Schema::drop("studentcards");
    }
}
