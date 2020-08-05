<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
  protected $guarded = [];

public function parameters()
{
 return $this->hasMany('App\Parameter');
}
}
