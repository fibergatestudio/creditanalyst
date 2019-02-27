<?php

/*
* Контроллер, который отображает страницу 'Статистика и анализ'
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

use Illuminate\Support\Facades\Auth;


class StatisticsAnalysisController extends AdminController
{
	private	$title = 'Статистика и анализ';



	// функция перевода тайтла на другие языки
	public function __construct(){
		
		
	}

	
	/*
    * Функция которая отображает страницу сохраненных графиков
    */
	
	public function index(){		
		
		$type_file_arr = [];
		$files = $this->files_charts_full();
		$i = 1;
		$j = 1;
		$k = 1;
		foreach ($files as $file) {
			if ($file !== '.' AND $file !== '..') {
				if (explode(".", $file)[1] == 'docx') {
					$type_file_arr[] = 'Документ Word '.$i;
					$i++;
				}
				else {
					$image = imagecreatefrompng('charts/'.$file);
					ob_start();
					imagejpeg($image);
					$output = ob_get_contents();
					ob_end_clean();
					if (strlen($output) < 80000) {
						$type_file_arr[] = 'График '.$j;
						$j++;
					}
					else{
						$type_file_arr[] = 'Карта '.$k;
						$k++;
					}
				}
			}
		}
		//echo '<pre>'.print_r($type_file_arr,true).'</pre>';	

		// Перевод языка

		if(Auth::user()->preferred_language == 'ru'){
			$this->title = 'Статистика и анализ';

		} else if (Auth::user()->preferred_language == 'ua'){
			$this->title = 'Статистика та аналіз';
			
		} else if (Auth::user()->preferred_language == 'en'){
			$this->title = 'Statistics and analysis';
		}

		
		return view('admin.statistics_analysis', ['title' => $this->title, 'indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full(), 'type_file_arr' => $type_file_arr]);
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
