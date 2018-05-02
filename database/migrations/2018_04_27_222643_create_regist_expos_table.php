<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistExposTable extends Migration {

	public function up()
	{
		Schema::create('regist_expos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('type', 200)->nullable();
			$table->string('theme')->nullable();
			$table->string('attended')->nullable();
			$table->string('name_eng')->nullable();
			$table->string('name_cht')->nullable();
			$table->string('description', 500)->nullable();
			$table->string('target_audience')->nullable();
			$table->string('want_audience')->nullable();
			$table->boolean('have_sell')->nullable()->default(false);
			$table->string('file_proposal')->nullable();
			$table->string('attend_reason', 500)->nullable();
			$table->string('other', 500)->nullable();
			$table->string('main_contact_name')->nullable();
			$table->string('main_contact_phone')->nullable();
			$table->string('main_contact_email')->nullable();
			$table->string('secondary_contact_name')->nullable();
			$table->string('secondary_contact_phone')->nullable();
			$table->string('secondary_contact_email')->nullable();
			$table->boolean('confirmed')->default(false);
		});
	}

	public function down()
	{
		Schema::drop('regist_expos');
	}
}