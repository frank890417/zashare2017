<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistWorkshopsTable extends Migration {

	public function up()
	{
		Schema::create('regist_workshops', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('registexpos_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('class_type')->nullable();
			$table->string('class_audience')->nullable();
			$table->integer('class_person_count')->nullable();
			$table->string('class_time')->nullable();
			$table->string('class_proposal')->nullable();
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
		Schema::drop('regist_workshops');
	}
}