<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  protected $guarded = [];



public function parameter()
{
 return $this->hasMany('App\Parameter');
}

}
