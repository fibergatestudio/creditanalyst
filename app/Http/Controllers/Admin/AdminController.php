<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Indicator;
use App\Dataset;
use DB;

class AdminController extends Controller
{
	
	protected $months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
	protected $years = ['1991','1992','1993','1994','1995','1996','1997','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018'];


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
    * Функция которая возвращает объект индикаторов 
    */

	protected function indicators_obj(){
		
		$indicators_obj = Indicator::all();

		return $indicators_obj;
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
