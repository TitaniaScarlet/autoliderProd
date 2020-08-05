<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Site;
use App\Link;
use App\Parameter;
use App\Jobs\Parser;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\DB;


class ParserController extends Controller
{
  public function index() {
    $url = 'https://cars.av.by/';
    $html = $this->curl_get($url);
      $crawler = new Crawler($html);
      $markas = [];
     $markas_id = $crawler->filter('div.js-brand-container > select > option')->each(function(Crawler $node, $i) {
    return $node;
    });
    foreach ($markas_id as $item) {
      $label = $item->text();
      $id = $item->attr('value');
      array_push($markas, [
        'id' => $id,
        'label' => $label
      ]);
    }
    return view('admin.parser.index', [
      'markas' => $markas,
    ]);
  }

public function cars() {

  $parameters = Parameter::get();
  $parameter = Parameter::first();
  if (isset($parameter)) {
    $links = Link::where('parameter_id', $parameter->id)->orderBy('id', 'desc')->paginate(50);
    return view('admin.parser.cars', [
      'links' => $links,
      'parameters' => $parameters,
      'parameter_select' => $parameter
    ]);
  }
  else {
    return view('admin.parser.cars', [
    ]);
  }
}

public function all(Parameter $parameter) {
  $parameters = Parameter::get();
    $links = Link::where('parameter_id', $parameter->id)->orderBy('id', 'desc')->paginate(50);
    return view('admin.parser.cars', [
      'links' => $links,
      'parameters' => $parameters,
      'parameter_select' => $parameter
    ]);
}

public function favorites(Parameter $parameter) {
  $parameters = Parameter::get();
    $links = Link::where('parameter_id', $parameter->id)->where('star', 1)->orderBy('id', 'desc')->paginate(50);
    return view('admin.parser.cars', [
      'links' => $links,
      'parameters' => $parameters,
      'parameter_select' => $parameter
    ]);
}

public function destroy(Link $link) {
     $link->delete();
   return redirect()->back();
}

public function star(Link $link) {
  if ($link->star == 0) {
    $link->star = 1;
    $link->save();
  }
  elseif ($link->star == 1) {
    $link->star = 0;
    $link->save();
  }
   return redirect()->back();
}

public function parameterDestroy(Parameter $parameter) {
  $links = Link::where('parameter_id', $parameter->id)->get();
  foreach ($links as $link) {
$link->delete();
  }
     $parameter->delete();

   return redirect()->route('admin.parser.cars');
}

public function parameterPause(Parameter $parameter) {
  if($parameter->action == 'parse') {
    $parameter->action = 'pause';
    $parameter->save();
  }
  elseif ($parameter->action == 'pause') {
    $parameter->action = 'parse';
    $parameter->save();
  }
   return redirect()->back();
}

public function form(Request $request) {
    if ($request->model && $request->marka || $request->min_price || $request->max_price) {
$url = 'https://cars.av.by/search?brand_id%5B0%5D=' . $request->marka. '&model_id%5B0%5D=' . $request->model. '&year_from=' . $request->min_year . '&year_to=' . $request->max_year . '&currency=USD&price_from=' . $request->min_price . '&price_to=' . $request->max_price . '&body_id=&engine_volume_min=&engine_volume_max=&driving_id=&mileage_min=&mileage_max=&region_id=&interior_material=&interior_color=&exchange=&search_time=';
// Parser::dispatch($url);
$parameter = Parameter::create([
  'site_id' => '1',
  'title' => $request->title,
'marka_id' => $request->marka,
'model_id' => $request->model,
'min_price' => $request->min_price,
'max_price' => $request->max_price,
'min_year' => $request->min_year,
'max_year' => $request->max_year,
'action' => "parse"
]);

       $av = $this->parse($url, $parameter->id);
     return redirect()->route('admin.parser.cars');
  }
  elseif($request->marka){
    $url = 'https://cars.av.by/search?brand_id%5B0%5D=' . $request->marka . '&model_id%5B0%5D=&year_from=&year_to=&currency=USD&price_from=&price_to=&body_id=&engine_volume_min=&engine_volume_max=&driving_id=&mileage_min=&mileage_max=&region_id=&interior_material=&interior_color=&exchange=&search_time=';
    $html = $this->curl_get($url);
      $crawler = new Crawler($html);
      $markas = [];
 $markas_id = $crawler->filter('div.js-brand-container > select > option')->each(function(Crawler $node, $i) {
    return $node;
    });
    $models = [];
    $models_id = $crawler->filter('div.js-model-container > select > option')->each(function(Crawler $node, $i) {
   return $node;
   });
foreach ($models_id as $item) {
      $label = $item->text();
      $id = $item->attr('value');
      array_push($models, [
        'id' => $id,
        'label' => $label
      ]);
}
    foreach ($markas_id as $item) {
      $label = $item->text();
      $id = $item->attr('value');
      array_push($markas, [
        'id' => $id,
        'label' => $label
      ]);
      }
      return view('admin.parser.index', [
        'select_marka' => $request->marka,
        'models' => $models,
        'markas' => $markas
      ]);
}
}

  public function parse($url, $id) {
    $id = $id;
        $html = $this->curl_get($url);
  $crawler = new Crawler($html);
 if ($crawler->filter('div.main-section > div.pages > ul.pages-arrows > li.pages-arrows-index + li.pages-arrows-item > a')->count() > 0) {
   $page = $crawler->filter('div.main-section > div.pages > ul.pages-arrows > li.pages-arrows-index + li.pages-arrows-item > a')->attr('href');
   $url = $page;
 }
    $cars = $crawler->filter('div.listing div.listing-item-wrap')->each(function(Crawler $node, $i) {
  return $node;
});
foreach ($cars as $car) {
  $title = $car->filter('div.listing-item-title > h4 > a')->text();
  $href = $car->filter('div.listing-item-title > h4 > a')->attr('href');
  $link = Link::where('link', $href)->first();
  if(empty($link)) {
    $new_link = Link::create([
      'parameter_id' => $id,
      'star' => 0,
      'link' => $href
    ]);
  }
  }
  if (isset($page)) {
$this->parse($page, $id);
  }
}

public function parse_auto($url, $id) {
  $id = $id;
          $html = $this->curl_get($url);
    $crawler = new Crawler($html);
   if ($crawler->filter('div.main-section > div.pages > ul.pages-arrows > li.pages-arrows-index + li.pages-arrows-item > a')->count() > 0) {
     $page = $crawler->filter('div.main-section > div.pages > ul.pages-arrows > li.pages-arrows-index + li.pages-arrows-item > a')->attr('href');
     $url = $page;
   }
      $cars = $crawler->filter('div.listing div.listing-item-wrap')->each(function(Crawler $node, $i) {
    return $node;
  });
  foreach ($cars as $car) {
    $title = $car->filter('div.listing-item-title > h4 > a')->text();
    $href = $car->filter('div.listing-item-title > h4 > a')->attr('href');
    $link = Link::where('link', $href)->first();
    if(empty($link)) {
    $new_link = Link::create([
        'parameter_id' => $id,
        'star' => 0,
        'link' => $href
      ]);
      $token = DB::table('data')->where('title', 'token')->first();
  $chatid = DB::table('data')->where('title', 'chatid')->get();

$message = [$new_link->id, $new_link->link];
      foreach ($chatid as $item) {
        $ch = curl_init();
        curl_setopt_array(
          $ch,
          array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . $token->number . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
              'chat_id' => $item->number,
              'text' => json_encode($message, JSON_UNESCAPED_SLASHES)
            ),
          )
        );
        curl_exec($ch);
      }

    }
    }
    if (isset($page)) {
  $this->parse_auto($page, $id);
    }


}

  public function curl_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
curl_close($ch);
    return $data;
  }

}
