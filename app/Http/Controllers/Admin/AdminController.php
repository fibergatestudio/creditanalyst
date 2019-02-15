<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Indicator;
use App\Dataset;
use App\Koatuu;
use DB;

//use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
	
	protected $months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
	protected $years = ['1991','1992','1993','1994','1995','1996','1997','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018'];
	protected $colors_arr = [
		'#00afff','#00a8ff','#00a1ff','#009aff','#0093ff','#008cff','#0085ff','#007eff','#0077ff','#0070ff',
		'#0069ff','#0062ff','#005bff','#0054ff','#004dff','#0046ff','#003fff','#0038ff','#0031ff','#002aff',
		'#0023ff','#001cff','#0015ff','#000eff','#0007ff'];
		
	// Функция перевода месяцев на другие языки
	public function __construct(){
		
/*		if(Auth::user()->preferred_language == 'ru'){
			$this->months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		} else if (Auth::user()->preferred_language == 'ua'){
			$this->months = ['Январь по-украински','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		} else if (Auth::user()->preferred_language == 'en'){
			$this->months = ['January','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		}*/

		// Ну и именно проблема в том, что Auth::user() не возвращает текущего юзера, хотя логин точно есть.
		

	}

	/*
    * Функция которая выделяет имена индикаторов и возвращает json 
    */

	protected function get_arr_name_indicators(){
		
		$indicators_name = [];
		$indicators_obj = Indicator::all();
		foreach ($indicators_obj as $k => $value) {
			$indicators_name[] = $value['name'];
		}
		$indicators_name =  json_encode($indicators_name,JSON_UNESCAPED_UNICODE);

		return $indicators_name;
	}


	/*
    * Функция которая выделяет имена и id индикаторов и возвращает json 
    */

	protected function get_obj_name_indicators(){
		
		$indicators_name = [];
		$indicators_obj = Indicator::all();
		foreach ($indicators_obj as $k => $value) {
			$indicators_name[$value['id']] = $value['name'];
		}
		$indicators_name =  json_encode($indicators_name,JSON_UNESCAPED_UNICODE);

		return $indicators_name;
	}	


	/*
    * Функция которая возвращает объект индикаторов 
    */

	protected function indicators_obj(){
		
		$indicators_obj = Indicator::all();

		return $indicators_obj;
	}


	/*
    * Функция которая возвращает объект областей с ихними кодами 
    */

	protected function koatuu_obj(){
		
		$koatuu_obj = Koatuu::all();
		$temp_koatuu = ["0000000000","8000000000"];
		$temp = [];
		foreach ($koatuu_obj as $value) {
			if (strpos($value->unique_koatuu_id, '00000000') !== FALSE AND !in_array($value->unique_koatuu_id, $temp_koatuu)) {
				$temp_koatuu[] = $value->unique_koatuu_id;
				$temp[] = Array
				(
					'id' => $value->id,
					'unique_koatuu_id' => $value->unique_koatuu_id,
					'name_ru' => $value->name_ru
				);
			}
		}

		return $temp;
	}
	

	/*
    * Функция которая возвращает объект данных индикаторов 
    */

	protected function data_obj(){
		
		$data_obj = Dataset::orderBy('date')->get();

		return $data_obj;
	}


	/*
    * Функция которая возвращает массив имен сохраненных файлов графиков
    */

	protected function files_charts(){
		
		$files_charts = scandir('charts');
		$temp = [];
		foreach ($files_charts as $file) {
			if ($file !== '.' AND $file !== '..') {
				$temp[] = strtok($file, '.');
			}
		}
		$files_charts = $temp;

		return $files_charts;
	}


	/*
    * Функция которая возвращает массив имен сохраненных файлов графиков с расширением
    */

	protected function files_charts_full(){
		
		$files_charts = scandir('charts');
		$temp = [];
		foreach ($files_charts as $file) {
			if ($file !== '.' AND $file !== '..') {
				$temp[] = $file;
			}
		}
		$files_charts = $temp;

		return $files_charts;
	}
}
