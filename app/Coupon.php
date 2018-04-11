<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $fillable = [
        'id',
        'cata_id',
        'coupon',
        'type',
        'user_id',
        'used',
        'other',
        'active_datetime',
        'expiry_datetime'
    ];


    public function type(){
        return $this->hasOne('App\Coupontype',"id","cata_id");
    }

}
