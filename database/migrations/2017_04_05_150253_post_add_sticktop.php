<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostAddSticktop extends Migration
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

          $table->boolean('stick_top_index')->default(false);
          $table->boolean('stick_top_cata')->default(false);

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

          $table->dropColumn(array('stick_top_index','stick_top_cata'));
        });
    }
}
