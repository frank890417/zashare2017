<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostStickToBoolean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts',function($table){
          $table->boolean('stick_top_index')->change();
          $table->boolean('stick_top_cata')->change();
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
        Schema::table('posts',function($table){
          $table->integer('stick_top_index')->change();
          $table->integer('stick_top_cata')->change();
        });
    }
}
