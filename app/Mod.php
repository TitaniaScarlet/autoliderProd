<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
  protected $guarded = [];

public function marka()  {
  return $this->belongsTo('App\Marka');
}

}
