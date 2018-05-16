<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('expos',function($table){
            $table->increments('id');

            $table->string('year')->nullable();
            $table->string('label')->nullable();
            $table->string('title')->nullable();
            $table->string('title_eng')->nullable();
            $table->string('spirit')->nullable();
            $table->string('place')->nullable();
            $table->string('cover')->nullable();
            $table->string('report_cover')->nullable();
            $table->string('features')->nullable();
            $table->string('content')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::drop('expos');
    }
}
