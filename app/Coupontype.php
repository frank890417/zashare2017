<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupontype extends Model
{
    //
    protected $fillable = [
        "id",
        "title",
        "type",
        "users",
        "cover",
        "description",
        "user_can_get",
        "reusable",
        "active_datetime",
        "expiry_datetime"
    ];


    public function coupons(){
        return $this->hasMany('App\Coupon',"cata_id","id");
    }
}
