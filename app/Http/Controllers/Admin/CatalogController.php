<?php

namespace App\Http\Controllers\Admin;

use App\Catalog;
use App\Image;
use App\Rate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CatalogController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function buyout()
  {
    return view('admin.catalog.index', [
      'catalogs' => Catalog::where('status', 'buyout')->latest()->paginate(16)
    ]);
  }

  public function not_published()
  {
    return view('admin.catalog.index', [
      'catalogs' => Catalog::where('status', 'not_published')->latest()->paginate(16)
    ]);
  }

  public function published()
  {
    return view('admin.catalog.index', [
      'catalogs' => Catalog::where('status', 'published')->latest()->paginate(16)
    ]);
  }

  public function index()
  {
    return view('admin.catalog.index', [
      'catalogs' => Catalog::latest()->paginate(16)
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.catalog.create', [
      'catalog' => []
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

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
    $catalog->short_description = $request->short_description;
    $catalog->description = $request->description;
    $catalog->meta_keywords = $request->meta_keywords;
    $catalog->meta_description = $request->meta_description;
    $catalog->price = $request->price;
    if($request->status) {
      $catalog->status = $request->status;
    }
    $rate = Rate::first();
    $usd_price = $request->price/$rate->rate;
$catalog->usd_price = round($usd_price);
    $catalog->save();
    if ($request->file('main_image')) {
      $main_image = $request->file('main_image')->store('images', 'public');
        $image = new Image;
        $image->path = $main_image;
        $image->catalog_id = $catalog->id;
        $image->main = 1;
        $image->save();
      }

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

    return redirect()->route('admin.catalog.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Catalog  $catalog
  * @return \Illuminate\Http\Response
  */
  public function show(Catalog $catalog)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Catalog  $catalog
  * @return \Illuminate\Http\Response
  */
  public function edit(Catalog $catalog)
  {
    $images = Image::where('catalog_id', $catalog->id)->get();
    return view('admin.catalog.edit', [
      'catalog' => $catalog,
      'images' => $images,
      'n' => []
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Catalog  $catalog
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Catalog $catalog)
  {
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
    $catalog->short_description = $request->short_description;
    $catalog->description = $request->description;
    $catalog->meta_keywords = $request->meta_keywords;
    $catalog->meta_description = $request->meta_description;
    $catalog->price = $request->price;
    if($request->status) {
      $catalog->status = $request->status;
    }
    $catalog->save();
        if($request->image) {
      $image = Image::where('id', $request->image)->first();
      Storage::disk('public')->delete($image->path);
      $image->delete();
    }
    if ($request->main_image) {
      $image_req = Image::where('id', $request->main_image)->first();
      foreach ($catalog->images as $image) {
        if ($image->id == $image_req->id) {
          $image->main = 1;
          $image->save();
          continue;
        }
        $image->main = 0;
        $image->save();
      }
    }
    if ($request->file('new_main_image')) {
      $new_main_image = $request->file('new_main_image')->store('images', 'public');
      foreach ($catalog->images as $image) {
        $image->main = 0;
        $image->save();
      }
        $image = new Image;
        $image->path = $new_main_image;
        $image->catalog_id = $catalog->id;
        $image->main = 1;
        $image->save();
      }

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
    return redirect()->route('admin.catalog.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Catalog  $catalog
  * @return \Illuminate\Http\Response
  */
  public function destroy(Catalog $catalog)
  {
    $images = Image::where('catalog_id', $catalog->id)->get();
    foreach ($images as $image) {
      Storage::disk('public')->delete($image->path);
      $image->delete();
    }
    $catalog->delete();
    return redirect()->route('admin.catalog.index');
  }
}
