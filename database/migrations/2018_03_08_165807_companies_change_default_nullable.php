<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompaniesChangeDefaultNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('companies',function($table){
            $table->boolean('tag')->nullable()->change();
            $table->string('tag')->nullable()->change();
            $table->string('theme')->nullable()->change();
            $table->string('cata')->nullable()->change();
            $table->string('place')->nullable()->change();
            $table->string('name_cht')->nullable()->change();
            $table->string('name_eng')->nullable()->change();
            $table->string('discribe_cht',5000)->nullable()->change();
            $table->string('discribe_eng',5000)->nullable()->change();
            $table->string('website',500)->nullable()->change();
            $table->string('teach_thing',500)->nullable()->change();
            $table->string('learn_thing',500)->nullable()->change();
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
        Schema::table('companies',function($table){
            $table->boolean('tag')->nullable(false)->change();
            $table->string('tag')->nullable(false)->change();
            $table->string('theme')->nullable(false)->change();
            $table->string('cata')->nullable(false)->change();
            $table->string('place')->nullable(false)->change();
            $table->string('name_cht')->nullable(false)->change();
            $table->string('name_eng')->nullable(false)->change();
            $table->string('discribe_cht',5000)->nullable(false)->change();
            $table->string('discribe_eng',5000)->nullable(false)->change();
            $table->string('website',500)->nullable(false)->change();
            $table->string('teach_thing',500)->nullable(false)->change();
            $table->string('learn_thing',500)->nullable(false)->change();
        });
    }
}
