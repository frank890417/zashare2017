<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// 參展／雜工坊：
// 甄選中 selecting
// 入選  selected
// 未入選  not-selected
// 取消 cancel
// 合作 cooperation
// 贊助 sponsor
// 其他 other


class RegistAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('regist_expos',function($table){
          $table->string('status')->default("selecting");
        });

        Schema::table('regist_expo_speaks',function($table){
          $table->string('status')->default("selecting");
        });

        Schema::table('regist_workshops',function($table){
          $table->string('status')->default("selecting");
        });

        Schema::table('paid_records',function($table){
          $table->string('status')->default("");
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
        Schema::table('regist_expos',function($table){
          $table->dropColumn('status');
        });
        Schema::table('regist_expo_speaks',function($table){
          $table->dropColumn('status');
        });
        Schema::table('regist_workshops',function($table){
          $table->dropColumn('status');
        });
        Schema::table('paid_records',function($table){
          $table->dropColumn('status');
        });
    }
}
