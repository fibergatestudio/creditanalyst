<?php

/*
* Контроллер, который отображает страницу 'Статистика и анализ'
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\AdminController;


class StatisticsAnalysisController extends AdminController
{
	private	$title = 'Статистика и анализ';

	
	/*
    * Функция которая отображает страницу сохраненных графиков
    */
	
	public function index(){
		
		$files_charts = scandir('charts');
		$temp = [];
		foreach ($files_charts as $file) {
			if ($file !== '.' AND $file !== '..') {
				$temp[] = strtok($file, '.');
			}
		}
		$files_charts = $temp;
		
		//echo '<pre>'.print_r($files_charts,true).'</pre>';	
		
		return view('admin.statistics_analysis', ['title' => $this->title, 'files_charts' => $files_charts]);
	}


}
