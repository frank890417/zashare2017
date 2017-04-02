<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts',function($table){
          $table->increments('id');
          $table->string('title',200)->default('');
          $table->string('tag',20)->default('');
          $table->string('cover',900)->default('');
          $table->string('description',500)->default('');
          $table->string('author',50)->default('');
          $table->string('content',10000)->default('');
          $table->string('album',5000)->default('');
          $table->dateTime('established_time');
          $table->integer('visited_count')->default(0);
          $table->string('status',20)->default('draft');
          $table->string('company',10)->default('');
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
        Schema::drop('posts');
    }
}
