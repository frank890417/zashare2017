<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Auth\Reminders\RemindableTrait;
// use Illuminate\Auth\Reminders\RemindableInterface;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    // use RemindableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','job','jobcata','birthday','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function studentcard(){
        return $this->hasOne('App\Studentcard',"user_id","id");
    }
    

    public function PaidRecord(){
        return $this->hasOne('App\PaidRecord',"user_id","id");
    }

    public function RegistExpo(){
        return $this->hasOne('App\RegistExpo',"user_id","id");
    }


    public function RegistExpoSpeak(){
        return $this->hasOne('App\RegistExpoSpeak',"user_id","id");
    }


    public function RegistWorkshop(){
        return $this->hasOne('App\RegistWorkshop',"user_id","id");
    }
    
}
