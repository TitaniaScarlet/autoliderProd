<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
  public function calculate(Request $request) {
    $duty = 0;
    $person = $request->input('person');
    $years = $request->input('years');
    $price = $request->input('price');
    $volume = $request->input('volume');
    $engine = $request->input('engine');
    $privilege = $request->input('privilege');
    if ($person == 'individual') {
      if($years == "young") {
        if($price <= "8500") {
          $duty = $price*54/100;
          if ($duty/$volume < 2.5) {
            $duty = 2.5*$volume;
          }
        }
        elseif ("8500" < $price && $price <= "16700") {
          $duty = $price*48/100;
          if ($duty/$volume < 3.5) {
            $duty = 3.5*$volume;
          }
        }
        elseif ("16700" < $price && $price <= "42300") {
          $duty = $price*48/100;
          if ($duty/$volume < 5.5) {
            $duty = 5.5*$volume;
          }
        }
        elseif ("42300" < $price && $price <= "84500") {
          $duty = $price*48/100;
          if ($duty/$volume < 7.5) {
            $duty = 7.5*$volume;
          }
        }
        elseif ("84500" < $price && $price <= "169000") {
          $duty = $price*48/100;
          if ($duty/$volume < 15) {
            $duty = 15*$volume;
          }
        }
        elseif ($price > "169000 ") {
          $duty = $price*48/100;
          if ($duty/$volume < 20) {
            $duty = 20*$volume;
          }
        }
      }
      elseif ($years == "middle") {
        if ($volume <= 1000) {
          $duty = 1.5*$volume;
        }
        elseif (1000 < $volume && $volume <= 1500) {
          $duty = 1.7*$volume;
        }
        elseif (1500 < $volume && $volume <= 1800) {
          $duty = 2.5*$volume;
        }
        elseif (1800 < $volume && $volume <= 2300) {
          $duty = 2.7*$volume;
        }
        elseif (2300 < $volume && $volume <= 3000) {
          $duty = 3*$volume;
        }
        elseif (3000 < $volume) {
          $duty = 3.6*$volume;
        }
      }
      elseif ($years == "old") {
        if ($volume <= 1000) {
          $duty = 3*$volume;
        }
        elseif (1000 < $volume && $volume <= 1500) {
          $duty = 3.2*$volume;
        }
        elseif (1500 < $volume && $volume <= 1800) {
          $duty = 3.5*$volume;
        }
        elseif (1800 < $volume && $volume <= 2300) {
          $duty = 4.8*$volume;
        }
        elseif (2300 < $volume && $volume <= 3000) {
          $duty = 5*$volume;
        }
        elseif (3000 < $volume) {
          $duty = 5.7*$volume;
        }
      }

      if ($privilege == 'true') {
        $duty = $duty/2;
      }
      $duty = round($duty, 0);

      return [
        'duty' => $duty
      ];
    }
    elseif ($person == 'entity') {
      if($engine == 'petrol') {
      if ($years == 'young') {
        if($volume <= 1000) {
          $duty = $price*30/100;
          if($duty/$volume < 1.2) {
            $duty = 1.2*$volume;
          }
        }
        if(1000 < $volume && $volume <= 1500) {
          $duty = $price*30/100;
          if($duty/$volume < 1.45) {
            $duty = 1.45*$volume;
          }
        }
        if(1500 < $volume && $volume <= 1800) {
          $duty = $price*30/100;
          if($duty/$volume < 1.5) {
            $duty = 1.5*$volume;
          }
        }
        if(1800 < $volume && $volume <= 3000) {
          $duty = $price*30/100;
          if($duty/$volume < 2.15) {
            $duty = 2.15*$volume;
          }
        }
        if(3000 < $volume) {
          $duty = $price*30/100;
          if($duty/$volume < 2.8) {
            $duty = 2.8*$volume;
          }
        }
      }
      elseif ($years == 'middle') {
        if($volume <= 1000) {
          $duty = $price*35/100;
          if($duty/$volume < 1.2) {
            $duty = 1.2*$volume;
          }
        }
        if(1000 < $volume && $volume <= 1500) {
          $duty = $price*35/100;
          if($duty/$volume < 1.45) {
            $duty = 1.45*$volume;
          }
        }
        if(1500 < $volume && $volume <= 1800) {
          $duty = $price*35/100;
          if($duty/$volume < 1.5) {
            $duty = 1.5*$volume;
          }
        }
        if(1800 < $volume && $volume <= 3000) {
          $duty = $price*35/100;
          if($duty/$volume < 2.15) {
            $duty = 2.15*$volume;
          }
        }
        if(3000 < $volume) {
          $duty = $price*35/100;
          if($duty/$volume < 2.8) {
            $duty = 2.8*$volume;
          }
        }
      }
      elseif ($years == 'old') {
        if($volume <= 1000) {
          $duty = 2.5*$volume;
        }
        if(1000 < $volume && $volume <= 1500) {
          $duty = 2.7*$volume;
        }
        if(1500 < $volume && $volume <= 1800) {
          $duty = 2.9*$volume;
        }
        if(1800 < $volume && $volume <= 3000) {
          $duty = 4.0*$volume;
        }
        if(3000 < $volume) {
          $duty = 5.8*$volume;
        }
      }
    }
    elseif ($engine == 'diesel') {
      if ($years == "young") {
        if($volume <= 1500) {
          $duty = $price*30/100;
          if($duty/$volume < 1.45) {
            $duty = 1.45*$volume;
          }
        }
        if(1500 < $volume && $volume <= 2500) {
          $duty = $price*30/100;
          if($duty/$volume < 1.9) {
            $duty = 1.9*$volume;
          }
        }
        if(2500 < $volume) {
          $duty = $price*30/100;
          if($duty/$volume < 2.8) {
            $duty = 2.8*$volume;
          }
        }
      }
      elseif ($years == "middle") {
        if($volume <= 1500) {
          $duty = $price*35/100;
          if($duty/$volume < 1.45) {
            $duty = 1.45*$volume;
          }
        }
        if(1500 < $volume && $volume <= 2500) {
          $duty = $price*35/100;
          if($duty/$volume < 2.15) {
            $duty = 2.15*$volume;
          }
        }
        if(2500 < $volume) {
          $duty = $price*35/100;
          if($duty/$volume < 2.8) {
            $duty = 2.8*$volume;
          }
        }
      }
      elseif ($years == "old") {
        if($volume <= 1500) {
          $duty = 2.7*$volume;
        }
        if(1500 < $volume && $volume <= 2500) {
          $duty = 4.0*$volume;
        }
        if(2500 < $volume) {
          $duty = 5.8*$volume;
        }

      }
    }
    $vat = ($price + $duty)*20/100;
    $vat = round($vat, 0);
    $duty = round($duty, 0);
    $total = $vat + $duty;
    return  [
      'duty' => $duty,
      'vat' => $vat,
      'total' => $total,
    ];

}
  }

}
