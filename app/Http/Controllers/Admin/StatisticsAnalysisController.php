<?php

/*
* Контроллер, который отображает страницу 'Статистика и анализ'
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;


class StatisticsAnalysisController extends AdminController
{
	private	$title = 'Статистика и анализ';

	
	/*
    * Функция которая отображает страницу сохраненных графиков
    */
	
	public function index(){		
		
		//echo '<pre>'.print_r($files_charts,true).'</pre>';	
		
		return view('admin.statistics_analysis', ['title' => $this->title, 'indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full()]);
	}


	/*
    * Функция которая удаляет сохраненные графики
    */
	public function destroy(Request $request){

		if (file_exists ('charts/'.$request->fileName)) {
			unlink('charts/'.$request->fileName);
		}		
		
		return $request->fileName;	
	}

}
