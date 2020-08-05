<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Catalog;
use App\Image;
use App\Data;
use Illuminate\Support\Facades\DB;
class StartController extends Controller
{


  public function start() {
    return view('start', [
      'page' => '1'
    ]);
  }


  public function contacts() {
    return view('contacts', [
      'page' => '5'
    ]);
  }


  public function selection() {
    return view('selection', [
      'page' => '2'
    ]);
  }

  public function catalog() {
    $catalogs = Catalog::where('status', 'published')->paginate(16);
    $images = Image::where('main', '1')->get();
    return view('catalog', [
      'catalogs' => $catalogs,
      'images' => $images,
      'page' => '4'
    ]);
  }

  public function auto ($id) {

    $catalog = Catalog::where('id', $id)->first();
    $images = Image::where('catalog_id', $id)->get();
    $active_image = Image::where('catalog_id', $id)->where('main', '1')->first();
    if(isset($catalog)) {
    return view('auto', [
      'catalog' => $catalog,
      'images' => $images,
      'active_image' => $active_image,
      'page' => '4'
    ]);
    }
    else return redirect()->route('catalog');
  }

  public function buyout() {
    return view('buyout', [
      'page' => '3'
    ]);
  }

  public function application() {
  return view('buyout_application', [
    'page' => '3'
  ]);

}

  public function message(Request $request) {
    $catalog = new Catalog;
    $catalog->title = $request->title;
    $catalog->manufactured = $request->manufactured;
    $catalog->mileage = $request->mileage;
    if($request->air_conditioning) {
      $catalog->air_conditioning = $request->air_conditioning;
    }
    if($request->leather_interior) {
      $catalog->leather_interior = $request->leather_interior;
    }
    if($request->alloy_wheels) {
      $catalog->alloy_wheels = $request->alloy_wheels;
    }
    if($request->xenon) {
      $catalog->xenon = $request->xenon;
    }
    if($request->parking_sensors) {
      $catalog->parking_sensors = $request->parking_sensors;
    }
    if($request->heated_seats) {
      $catalog->heated_seats = $request->heated_seats;
    }
    if($request->stabilization_control) {
      $catalog->stabilization_control = $request->stabilization_control;
    }
    if($request->navigation) {
      $catalog->navigation = $request->navigation;
    }
    if($request->speakerphone) {
      $catalog->speakerphone = $request->speakerphone;
    }
    $catalog->description = $request->description;
    $catalog->price = $request->price;
    $catalog->status = "buyout";
    $catalog->save();
    if ($request->file('images')) {
      $items = [];
      foreach ($request->file('images') as $item) {
        array_push( $items, $item->store('images', 'public'));
      }
      foreach ($items as $item) {
        $image = new Image;
        $image->path = $item;
        $image->catalog_id = $catalog->id;
        $image->save();
      }
    }
    $order = Order::create([
      'name' => $request->name,
      'number' => $request->number,
      'message' => "Срочный выкуп авто",
      'catalog_id' => $catalog->id
    ]);
    $orders = array($order->name, $order->number, $order->message);

    $token = DB::table('data')->where('title', 'token')->first();
$chatid = DB::table('data')->where('title', 'chatid')->get();
foreach ($chatid as $id) {
  $ch = curl_init();
  curl_setopt_array(
    $ch,
    array(
      CURLOPT_URL => 'https://api.telegram.org/bot' . $token->number . '/sendMessage',
      CURLOPT_POST => TRUE,
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_POSTFIELDS => array(
        'chat_id' => $id->number,
        'text' => json_encode($orders,  JSON_UNESCAPED_UNICODE)
      ),
    )
  );
      curl_exec($ch);
}

    return redirect()->route('start');
  }
public function order(Request $request) {
  if($request->has('name') && $request->has('phone')) {
    $order = Order::create([
      'name' => $request->input('name'),
      'number' => $request->input('phone'),
      'message' => $request->input('message')
    ]);
    $orders = array($order->name, $order->number, $order->message);

   $token = DB::table('data')->where('title', 'token')->first();
$chatid = DB::table('data')->where('title', 'chatid')->get();
foreach ($chatid as $id) {
  $ch = curl_init();
  curl_setopt_array(
    $ch,
    array(
      CURLOPT_URL => 'https://api.telegram.org/bot' . $token->number . '/sendMessage',
      CURLOPT_POST => TRUE,
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_POSTFIELDS => array(
        'chat_id' => $id->number,
        'text' => json_encode($orders,  JSON_UNESCAPED_UNICODE)
      ),
    )
  );
      curl_exec($ch);
}


     return redirect()->route('start');

}
}
}
