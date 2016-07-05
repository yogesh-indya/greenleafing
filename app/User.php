<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    //protected $appends = ['is_adult'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','DOB','user_type','institution','mobile_number', 'email', 'password','api_token','gl_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];


    public function getisAdult()
    {
        return $this->attributes['user_type'] == 1;

    }

    public function plants(){
        return $this->hasMany('App\Plant');
    }


}
