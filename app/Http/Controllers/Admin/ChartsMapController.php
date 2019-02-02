<?php

/*
* Контроллер, который отображает страницу графиков
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Screen\Capture;
use URL;

class ChartsMapController extends AdminController
{
	
	private	$title = 'Создать новую карту';

	
	/*
    * Функция которая отображает страницу создания графиков-карт
    */
	
	public function index(){

		//выводим маркер единственного индикатора
		$html = '<div class="marker-color-one">';                                   
		for($i=0; $i < count($this->colors_arr); $i++){
			$html .= '<div style="background:'.$this->colors_arr[$i].';"></div>';
		}
		$html .= '<div>indicator</div></div>';  

		/*echo '<pre>'.print_r($this->colors_arr,true).'</pre>';*/

		return view('admin.charts_map', ['title' => $this->title, 'indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full(), 'koatuu_obj' => $this->koatuu_obj(), 'colors_arr' => $html, 'indicators_obj_name' => $this->get_obj_name_indicators()]);
	}

	
	/*
    * Функция которая сохраняет график-карту в картинку и позволяет экспортировать
    */

	public function save_img_file(Request $request){

		$url = URL::to('/').'/map_for_save'.$request->getString;
		$file_name = $request->fileName;

		$screenCapture = new Capture($url);
		$screenCapture->setWidth(1300);
		$screenCapture->setImageType('png');
		$fileLocation = 'charts/'.$file_name;
		$screenCapture->save($fileLocation);

		if ($request->fileExport == 1) {
			$url = asset('charts/'.$file_name.'.png?fileExport=1');
			return $url;
		}

		if ($request->fileExportToWord == 1) {
			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
			$section->addImage('charts/'.$file_name.'.png', array('width' => 500,
        'height' => 300));  
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('charts/'.$file_name.'.docx');
			$url = asset('charts/'.$file_name.'.docx?fileWord=1');
			unlink('charts/'.$file_name.'.png');
			return $url;
		}

		return $screenCapture->getImageLocation();
	}

}
