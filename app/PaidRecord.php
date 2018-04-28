<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PaidRecord extends Model {

	protected $table = 'paid_records';
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

}