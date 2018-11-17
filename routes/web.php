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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {	
	Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);
	Route::get('/charts',['uses'=>'Admin\ChartsController@index','as'=>'chartsIndex']);
	Route::post('/charts',['uses' => 'Admin\ChartsController@save_img_file','as' => 'chartsSave']);
	
/*	Route::get('/sellers/{object}/{product?}/{district?}',['uses' => 'Admin\SellersController@index','as' => 'adminSellers']);

	Route::post('/sellers/{object}',['uses' => 'Admin\SellersController@destroy','as' => 'deleteSeller']);

	Route::get('/seller-update/{object}/{id}', 'Admin\SellersController@show');

	Route::get('/seller-add/{object}',['uses'=>'Admin\SellersController@showAdd','as'=>'showAdd']);

	Route::post('/seller-add/{object}',['uses'=>'Admin\SellersController@add','as'=>'sellersAdd']);

	Route::post('/seller-update/{object}/{id}',['uses'=>'Admin\SellersController@update','as'=>'sellersUpdate']);

	Route::get('/seller/{object}/{id}', 'Admin\SellersController@showSeller');*/

});