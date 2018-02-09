<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable=[
        "tag","theme","cata",
        "place",
        "name_cht","name_short","name_eng",
        "discribe_cht","discribe_cht",
        "website",
        "teach_thing","learn_thing",
        "year","logo"
    ];

    public static function getByTag($tag){
        return Company::where("tag",$tag)->first();
    }
}
