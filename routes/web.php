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

//лендинг
Route::get('/', 'MainController@index')->name('main');

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
* Путь, который отвечает за сохранение карты в скриншот
*/

	Route::get('/map_for_save', 'MapForSaveController@show')->name('mapForSave');

/*
* Пути, которые отвечают за информационную базу приложения
*/

	Route::get('/sources_list', 'SourcesListController@show')->middleware('auth'); // Список всех Источников
	Route::get('/indicator_list/{id}', 'IndicatorListController@show')->name('indicators_index'); // Список показателей в Источнике

/*
* Пути для поиска индикаторов
*/
	Route::get('/indicator_search/', 'IndicatorListController@search')->middleware('auth');
	Route::get('/indicator_search?search_query={search_query?}', 'IndicatorListController@search');

/*
* Пути для данных
*/
	Route::get('/dataset_view_indicator/{id}', 'DatasetController@view_data_for_indicator')->middleware('auth');

    /* Пути для мониторинга */
    Route::get('/monitoring', 'MonitoringController@index');
    Route::get('/monitoring/watchlist', 'MonitoringController@watchlist')->middleware('auth');
    Route::get('/monitoring/chart/{id}', 'MonitoringController@chart');
    Route::delete('/monitoring/remove/{id}', 'MonitoringController@remove')->middleware('auth');


    Route::get('/user_indicator_watch_list', 'MonitoringController@index');
    Route::get('/add_indicator_to_watch_list/{indicator_id}', 'MonitoringController@add_indicator_to_watch_list')->middleware('auth');

	// Удаления индикатора из вотчлиста
	Route::get('/remove_indicator_from_watchlist/{indicator_id}', 'MonitoringController@remove_indicator_from_watchlist')->middleware('auth');

/* Пути для уведомлений */
	Route::get('/notifications', 'NotificationsController@show_notifications')->middleware('auth');

/* Пути для управления пользоваетелем */
	Route::get('/user_logout', 'UserManagementController@user_logout')->middleware('auth');

/* Пути для крона */
	Route::get('/cron', 'CronController@notification_pusher');

/*
* Пути для импорта данных (временные)
*/

	Route::get('/import', 'ImportController@import_test_data');
/* Пути для AJAX API */
	Route::get('/ajax/indicator_hints', 'AjaxController@indicator_hints_json');

/* Управление собственной информацией */
	/* Страница редактирования */
	Route::get('/settings', 'Personal_settings_User_Controller@index')->middleware('auth');

		/* Путь обработки POST запроса */
		Route::post('/settings/edit', 'Personal_settings_User_Controller@edit_settings')->middleware('auth');

/* Путь страниц помощи */
Route::get('/help', 'HelpController@help_index')->middleware('auth');

/****** АДМИНИСТРАТОР : секция ******/

/* Управление пользователями */

	/* Создать пользователя : страница */
	Route::get('/admin_user_management/create_user', 'User_management_Admin_Controller@create_user_page')->middleware('can:administrator_rights');

		/* Создать пользователя : обработка POST запроса */
		Route::post('/admin_user_management/create_user', 'User_management_Admin_Controller@create_user_post')->middleware('can:administrator_rights');

	/* Список пользователей */
	Route::get('/admin_user_management/index', 'User_management_Admin_Controller@index')->middleware('can:administrator_rights');

	/* Редактировать пользователя : страница */
	Route::get('/admin_user_management/edit_user/{user_id}', 'User_management_Admin_Controller@edit_user_page')->middleware('can:administrator_rights');

		/* Редактировать пользователя : POST действие*/
		Route::post('/admin_user_management/edit_user', 'User_management_Admin_Controller@edit_user_post');

	/* Деактивировать пользователя */
	Route::get('/admin_user_management/suspend_user/{user_id}', 'User_management_Admin_Controller@suspend_user')->middleware('can:administrator_rights');

	/* Активировать пользователя */
	Route::get('/admin_user_management/activate_user/{user_id}', 'User_management_Admin_Controller@activate_user')->middleware('can:administrator_rights');

	/* Сделать пользователя администратором */
	Route::get('/admin_user_management/grant_admin_privileges/{user_id}', 'User_management_Admin_Controller@grant_admin_privileges')->middleware('can:administrator_rights');

	/* Забрать у пользователя права администратора */
	Route::get('/admin_user_management/remove_admin_privileges/{user_id}', 'User_management_Admin_Controller@remove_admin_privileges')->middleware('can:administrator_rights');



	/********** TEST **********/
	Route::get('/test', 'TestController@test')->middleware('auth');