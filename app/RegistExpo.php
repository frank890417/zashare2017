<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;

use App\RegistExpo;
use App\RegistExpoSpeak;
use App\RegistWorkshop;
use App\PaidRecord;
class RegistExpo extends Model {

	protected $table = 'regist_expos';
	protected $guarded = array();
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	public function Paidrecord()
	{
		return $this->hasOne('App\PaidRecord', 'registexpos_id','id');
	}

	public function Registworkshop()
	{
		return $this->hasOne('App\RegistWorkshop', 'registexpos_id','id');
	}

	public function RegistExpoSpeak()
	{
		return $this->hasOne('App\RegistExpoSpeak', 'registexpos_id','id');
	}

}