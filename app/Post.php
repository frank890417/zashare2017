<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title','tag','cover','short_description','description','author','content','album','established_time','visited_count','status','company','created_at','updated_at','stick_top_index','stick_top_cata'];

}
