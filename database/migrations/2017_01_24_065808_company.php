<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Company extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('companies',function($table){
        $table->increments('id');
        $table->string('tag');
        $table->string('theme');
        $table->string('cata');
        $table->string('place');
        $table->string('name_cht');
        $table->string('name_eng');
        $table->string('discribe_cht',5000);
        $table->string('discribe_eng',5000);
        $table->string('website',500);
        $table->string('teach_thing',500);
        $table->string('learn_thing',500);
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
        Schema::drop('companies');
    }
}
