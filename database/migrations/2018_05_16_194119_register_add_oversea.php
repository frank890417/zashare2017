<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//新增海外欄位

class RegisterAddOversea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('regist_expos', function (Blueprint $table) {
            $table->boolean('is_foreign')->default(false);
            $table->string('foreign_country')->nullable();
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
        Schema::table('regist_expos', function (Blueprint $table) {
            $table->dropColumn('is_foreign');
            $table->dropColumn('foreign_country');
        });
    }
}
