<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=> "can:admin, App\User"], function() {
  Route::get('/catalog/published', 'CatalogController@published', ['as'=>'admin'])->name('admin.catalog.published');
  Route::get('/catalog/not_published', 'CatalogController@not_published', ['as'=>'admin'])->name('admin.catalog.not_published');
  Route::get('/catalog/buyout', 'CatalogController@buyout', ['as'=>'admin'])->name('admin.catalog.buyout');
  Route::resource('/order', 'OrderController', ['as'=>'admin']);
  Route::resource('/image', 'ImageController', ['as'=>'admin']);
Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function() {
  Route::resource('/user', 'UserController', ['as'=>'admin.user_managment']);
});
Route::resource('/catalog', 'CatalogController', ['as'=>'admin']);
Route::get('/parser', 'ParserController@index', ['as'=>'admin'])->name('admin.parser.index');
Route::get('/parser/form', 'ParserController@form', ['as'=>'admin'])->name('admin.parser.form');
Route::get('/parser/parse', 'ParserController@parse', ['as'=>'admin'])->name('admin.parser.parse');

Route::get('/parser/parse_auto', 'ParserController@parse_auto', ['as'=>'admin'])->name('admin.parser.parse_auto');

Route::get('/parser/parse/curl', 'ParserController@curl_get', ['as' => 'admin']);
Route::get('/parser/cars/', 'ParserController@cars', ['as'=>'admin'])->name('admin.parser.cars');
Route::get('/parser/cars/pause/{parameter?}', 'ParserController@parameterPause', ['as'=>'admin'])->name('admin.parser.parameter.pause');

Route::delete('/parser/cars/destroy/{link?}', 'ParserController@destroy', ['as'=>'admin'])->name('admin.parser.cars.destroy');
Route::get('/parser/cars/star/{link?}', 'ParserController@star', ['as'=>'admin'])->name('admin.parser.cars.star');
Route::get('/parser/cars/favorites/{parameter?}', 'ParserController@favorites', ['as'=>'admin'])->name('admin.parser.cars.favorites');
Route::get('/parser/cars/all/{parameter?}', 'ParserController@all', ['as'=>'admin'])->name('admin.parser.cars.all');

Route::delete('/parser/parameter/destroy/{parameter?}', 'ParserController@parameterDestroy', ['as'=>'admin'])->name('admin.parser.parameter.destroy');

Route::get('/rate', 'RateController@rate', ['as' => 'admin'])->name('admin.rate');
});
Route::get('/', 'StartController@start')->name('start');
Route::get('/contacts', 'StartController@contacts')->name('contacts');
Route::get('/buyout', 'StartController@buyout')->name('buyout');
Route::post('/buyout/message', 'StartController@message')->name('buyout.message');
Route::get('/buyout/application', 'StartController@application')->name('buyout.application');
Route::post('/order', 'StartController@order')->name('order');
Route::get('/selection', 'StartController@selection')->name('selection');
Route::get('/calculate', 'CalculatorController@calculate')->name('calculate');

Route::get('/catalog', 'StartController@catalog')->name('catalog');
Route::get('/catalog/{id?}', 'StartController@auto')->name('auto');
