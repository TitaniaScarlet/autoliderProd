<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ParserController;
use App\Catalog;
use App\Rate;
use Symfony\Component\DomCrawler\Crawler;


class RateController extends Controller
{
  public function rate() {
    $url = 'https://finance.tut.by/arhiv/?currency=USD';
    $parse = new ParserController;
    $html = $parse->curl_get($url);
    $crawler = new Crawler($html);
    $data = $crawler->filter('#content-band > div.col-c > div > div > div.b-cnt > div.b-cnt > table > tbody > tr:nth-child(1)')->each(function(Crawler $node, $i) {
      return $node;
    });
    foreach ($data as $item) {
      $rate = $item->filter('td:nth-child(2)')->text();
      $new_rate = floatval ( $rate );
      $db_rate = Rate::first();
      if (empty($db_rate)) {
        $db_rate = Rate::create([
          'rate' => $new_rate
        ]);
      }
      else {
        $db_rate->rate = $new_rate;
        $db_rate->save();
      }
      $cars = Catalog::get();
      foreach ($cars as $car) {
        $usd_price = $car->price/$db_rate->rate;
        $car->usd_price = round($usd_price);
        $car->save();
      }
      break;
    }
  }
}
