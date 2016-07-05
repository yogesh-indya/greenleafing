<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{

  protected $fillable = [
      'plant_name','planted_date','user_id','height','update_frequency','long', 'lat', 'description',
  ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }
}
