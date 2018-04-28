<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaidRecordsTable extends Migration {

	public function up()
	{
		Schema::create('paid_records', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('registexpos_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('paid_datetime');
			$table->boolean('paid_direct')->nullable()->default(false);
			$table->string('paid_name')->nullable();
			$table->string('paid_last_number')->nullable();
			$table->string('receipt_type')->nullable();
			$table->string('receipt_number')->nullable();
			$table->string('receipt_title')->nullable();
			$table->string('receipt_name')->nullable();
			$table->string('receipt_phone')->nullable();
			$table->string('receipt_address')->nullable();
			$table->string('receipt_postcode')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('paid_records');
	}
}