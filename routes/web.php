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
	Route::get('/statistics-analysis',['uses' => 'Admin\StatisticsAnalysisController@index','as' => 'statisticsAnalysisIndex']);
	Route::post('/statistics-analysis',['uses' => 'Admin\StatisticsAnalysisController@destroy','as' => 'statisticsAnalysisDestroy']);
	Route::get('/statistics-analysis/charts',['uses'=>'Admin\ChartsController@index','as'=>'chartsIndex']);
	Route::post('/statistics-analysis/charts',['uses' => 'Admin\ChartsController@save_img_file','as' => 'chartsSave']);
	Route::get('/statistics-analysis/charts-map',['uses'=>'Admin\ChartsMapController@index','as'=>'chartsMapIndex']);
	Route::post('/statistics-analysis/charts-map',['uses' => 'Admin\ChartsMapController@save_img_file','as' => 'chartsMapSave']);	

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

/* Пути для уведомлений */
	Route::get('/notifications', 'NotificationsController@show_notifications')->middleware('auth');

/* Пути для управления пользоваетелем */
	Route::get('/user_logout', 'UserManagementController@user_logout');

/* Пути для крона */
	Route::get('/cron', 'CronController@notification_pusher');

/*
* Пути для импорта данных (временные)
*/

	Route::get('/import', 'ImportController@import_test_data');
/* Пути для AJAX API */
	Route::get('/ajax/indicator_hints', 'AjaxController@indicator_hints_json');

/* Путь страниц помощи */
Route::get('/help', 'HelpController@help_index')->middleware('auth');