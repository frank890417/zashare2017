<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RegistExpoSpeak extends Model {

	protected $table = 'regist_expo_speaks';
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

}