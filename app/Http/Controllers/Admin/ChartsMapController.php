<?php

/*
* Контроллер, который отображает страницу графиков
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Indicator;
use App\Dataset;
use Screen\Capture;

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

		$url = 'http://creditanalyst/map_for_save'.$request->getString;

		$screenCapture = new Capture($url);
		$screenCapture->setWidth(1300);
		$screenCapture->setImageType('png');
		$fileLocation = 'charts/'.$request->fileName;
		$screenCapture->save($fileLocation);

		return $screenCapture->getImageLocation();
		//return $request->getString;
	}

}
