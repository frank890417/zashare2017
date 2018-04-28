<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RegistExpo extends Model {

	protected $table = 'regist_expos';
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	public function Paidrecords()
	{
		return $this->hasMany('PaidRecord', '"registexpos_id"');
	}

	public function Registworkshops()
	{
		return $this->hasMany('RegistWorkshop', '"registexpos_id"');
	}

	public function RegistExpoSpeaks()
	{
		return $this->hasMany('RegistExpoSpeak', 'registexpos_id');
	}

}