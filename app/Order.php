<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $guarded = [];

  public function catalog()  {
      return $this->belongsTo('App\Catalog');
    }
}
