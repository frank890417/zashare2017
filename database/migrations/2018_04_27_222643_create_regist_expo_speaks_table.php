<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistExpoSpeaksTable extends Migration {

	public function up()
	{
		Schema::create('regist_expo_speaks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('registexpos_id')->nullable();
			$table->boolean('agree_plan')->nullable();
			$table->integer('team_person_count')->nullable();
			$table->boolean('has_money')->nullable();
			$table->string('startup_content', 500)->nullable();
			$table->string('startup_audience', 500)->nullable();
			$table->string('startup_difficult', 500)->nullable();
			$table->string('startup_problem', 500)->nullable();
			$table->string('startup_power', 500)->nullable();
			$table->string('main_contact_name')->nullable();
			$table->string('main_contact_phone')->nullable();
			$table->string('main_contact_email')->nullable();
			$table->string('secondary_contact_name')->nullable();
			$table->string('secondary_contact_phone')->nullable();
			$table->string('secondary_contact_email')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('regist_expo_speaks');
	}
}