<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RegistWorkshop extends Model {

	protected $table = 'regist_workshops';
	protected $guarded = array();
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

}