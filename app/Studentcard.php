<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentcard extends Model
{
    //
    protected $fillable=[
        'email','name','id','other','user_id'

    ];

    // public function getCompanyAttribute()
    // {
    //     return Company::find($this->company_id);
    // }
    public function user(){
        return $this->hasOne('App\User',"user_id","id");
    }

}
