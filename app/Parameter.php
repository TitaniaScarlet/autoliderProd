<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
  protected $guarded = [];



  public function site() {
    return $this->belongsTo('App\Site');
  }

  public function links()
  {
   return $this->hasMany('App\Link');
  }
}
