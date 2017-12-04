<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostCataAddYear extends Migration
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

          $table->string('year')->default("2016")->nullable();

        });
        Schema::table('catas',function($table){

          $table->string('year')->default("2016")->nullable();

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

          $table->dropColumn('year');
        });
        Schema::table('catas',function($table){

          $table->dropColumn('year');
        });
    }
}
