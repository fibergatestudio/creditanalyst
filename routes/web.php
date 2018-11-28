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

});

/*
* Пути, которые отвечают за информационную базу приложения
*/

	Route::get('/sources_list', 'SourcesListController@show'); // Список всех источников