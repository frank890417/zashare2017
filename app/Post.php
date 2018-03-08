<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
class Post extends Model
{
    //
    protected $fillable=[
        'title','tag','cover','company_id',
        'short_description','description',
        'author','content','album',
        'established_time','visited_count',
        'status','created_at',
        'updated_at','stick_top_index','stick_top_cata',
        'year','hashtag','cata_id',
        'type',
        'admin_lock'
        // ,'company'
    ];

    // public function getCompanyAttribute()
    // {
    //     return Company::find($this->company_id);
    // }
    public function company(){
        return $this->hasOne('App\Company',"id","company_id");
    }

    public function cata(){
        return $this->hasOne('App\Cata',"id","cata_id");
    }

}
