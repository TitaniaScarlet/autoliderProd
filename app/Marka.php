<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marka extends Model
{
  protected $guarded = [];

public function mods()
{
 return $this->hasMany('App\Mod');
}

}
