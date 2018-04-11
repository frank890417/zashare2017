<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("coupontypes",function($table){
            $table->increments('id');
            $table->string('title',200)->default('')->unique()->nullable();
            //single_hash
            $table->string('cover',900)->default('')->nullable();
            $table->json('user_can_get')->nullable();
            $table->text('description')->nullable();
            $table->string('type',900)->default('')->nullable();
            $table->string('users',900)->default('')->nullable();
            $table->boolean('reusable')->default(false)->nullable();
            $table->dateTime('active_datetime')->default('2018-12-31 23:59:59')->nullable();
            $table->dateTime('expiry_datetime')->default('2018-12-31 23:59:59')->nullable();
            $table->timestamps();
        });
        Schema::create("coupons",function($table){
            $table->increments('id');
            $table->string('cata_id',200)->default('')->nullable();
            $table->string('coupon',200)->default('')->nullable();
            $table->string('type',200)->default('normal');
            $table->integer('user_id')->nullable();
            $table->boolean('used')->default(false)->nullable();
            $table->string('other',900)->default('')->nullable();
            $table->dateTime('active_datetime')->default('2018-12-31 23:59:59')->nullable();
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
        Schema::drop('coupontypes');
        Schema::drop('coupons');
    }
}
