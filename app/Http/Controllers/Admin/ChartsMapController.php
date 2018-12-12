<?php

/*
* Контроллер, который отображает страницу графиков
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\AdminController;
use App\Indicator;
use App\Dataset;

class ChartsMapController extends AdminController
{
	private	$title = 'Создать новую карту';

	
	/*
    * Функция которая отображает страницу создания графиков
    */
	
	public function index(){
		
		$files_charts = scandir('storage/charts');
		$temp = [];
		foreach ($files_charts as $file) {
			if ($file !== '.' AND $file !== '..') {
				$temp[] = strtok($file, '.');
			}
		}
		$files_charts = $temp;
		
		$indicators_obj = Indicator::all();
		//echo '<pre>'.print_r($files_charts,true).'</pre>';
		$data_obj = Dataset::orderBy('date')->get();		
		
		return view('admin.charts_map', ['title' => $this->title, 'indicators_obj' => $indicators_obj, 'indicators_name' => $this->get_arr_name_indicators(), 'data_obj' => $data_obj, 'files_charts' => $files_charts]);
	}


	/*
    * Функция которая выделяет имена индикаторов и возвращает json 
    */

	private function get_arr_name_indicators(){
		$indicators_name = [];
		$indicators_obj = Indicator::all();
		foreach ($indicators_obj as $k => $value) {
			$indicators_name[] = $value['name'];
		}
		$indicators_name =  json_encode($indicators_name,JSON_UNESCAPED_UNICODE);

		return $indicators_name;
	}

	
	/*
    * Функция которая сохраняет график в картинку и позволяет экспортировать
    */

	public function save_img_file(Request $request){
/*		Storage::put('public/charts/'.$request->fileName.'.png', file_get_contents($request->img));
		$data = 'Файл сохранен в / storage / app / public / charts / '.$request->fileName.'.png';

		if ($request->fileExport) {
			$url = asset('storage/charts/'.$request->fileName.'.png');
			return $url;
		}

		if ($request->fileExportToWord) {
			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
			$section->addImage('storage/charts/'.$request->fileName.'.png', array('width' => 500,
        'height' => 150));  
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('storage/charts/'.$request->fileName.'.docx');
			$url = asset('storage/charts/'.$request->fileName.'.docx');
			return $url;
		}

		return $data;*/
	}

}
