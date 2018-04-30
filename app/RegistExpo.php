<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RegistExpo extends Model {

	protected $table = 'regist_expos';
	protected $guarded = array();
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	public function Paidrecord()
	{
		return $this->hasMany('PaidRecord', '"registexpos_id"');
	}

	public function Registworkshop()
	{
		return $this->hasMany('RegistWorkshop', '"registexpos_id"');
	}

	public function RegistExpoSpeak()
	{
		return $this->hasMany('RegistExpoSpeak', 'registexpos_id');
	}

}