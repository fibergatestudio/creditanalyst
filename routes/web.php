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
	return redirect('/login');
	//return view('welcome');
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

/*
* Пути, которые отвечают за информационную базу приложения
*/

	Route::get('/sources_list', 'SourcesListController@show'); // Список всех Источников
	Route::get('/indicator_list/{id}', 'IndicatorListController@show')->name('indicators_index'); // Список показателей в Источнике

/*
* Пути для поиска индикаторов
*/
	Route::get('/indicator_search/', 'IndicatorListController@search');
	Route::get('/indicator_search?search_query={search_query?}', 'IndicatorListController@search');

/*
* Пути для данных
*/
	Route::get('/dataset_view_indicator/{id}', 'DatasetController@view_data_for_indicator');

/* Пути для мониторинга */	
	
	// Отобразить все индикаторы, которые мониторятся пользователем
	Route::get('/user_indicator_watch_list', 'MonitoringController@show_user_indicator_watch_list')->middleware('auth');

	// Добавления индикатора в вотчлист
	Route::get('/add_indicator_to_watch_list/{indicator_id}', 'MonitoringController@add_indicator_to_watch_list')->middleware('auth');

	// Удаления индикатора из вотчлиста
	Route::get('/remove_indicator_from_watchlist/{indicator_id}', 'MonitoringController@remove_indicator_from_watchlist');

/* Пути для управления пользоваетелем */
	Route::get('/user_logout', 'UserManagementController@user_logout');

/* Пути для крона */
	Route::get('/cron', 'CronController@notification_pusher');