<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $guarded = [];

    public function orders()
   {
     return $this->hasMany('App\Order');
   }
   public function images()
  {
    return $this->hasMany('App\Image');
  }

}
