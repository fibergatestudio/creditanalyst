<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Indicator;
use App\Dataset;
use App\Koatuu;
use DB;

//use Illuminate\Support\Facades\Auth;


	// Функция перевода месяцев на другие языки
	public function __construct(){

/*		if(Auth::user()->preferred_language == 'ru'){
			$this->months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		} else if (Auth::user()->preferred_language == 'ua'){
			$this->months = ['Январь по-украински','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		} else if (Auth::user()->preferred_language == 'en'){
			$this->months = ['January','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		}*/


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
