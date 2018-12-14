<?php

/*
* Контроллер, который отображает страницу графиков
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Indicator;
use App\Dataset;

class ChartsMapController extends AdminController
{
	
	private	$title = 'Создать новую карту';

	
	/*
    * Функция которая отображает страницу создания графиков-карт
    */
	
	public function index(){

		//echo '<pre>'.print_r($files_charts,true).'</pre>';
						
		return view('admin.charts_map', ['title' => $this->title, 'indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full()]);
	}

	
	/*
    * Функция которая сохраняет график-карту в картинку и позволяет экспортировать
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
