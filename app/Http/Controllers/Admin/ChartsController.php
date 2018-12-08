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
use DateTime;
use DateInterval;

class ChartsController extends AdminController
{
	private	$title = 'Статистика и анализ';
	private	$months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
	private	$years = ['1991','1992','1993','1994','1995','1996','1997','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018'];

	
	/*
    * Функция которая отображает страницу создания графиков
    */
	
	public function index(){
		
		//Здесь мы заносим в массив дни заданного года
		/*$obj = [];
		$oStart = new DateTime('2014-01-01');
		$oEnd = clone $oStart;
		$oEnd->add(new DateInterval("P5Y"));

		for ($i = 0; $oStart->getTimestamp() < $oEnd->getTimestamp(); $i++) {
			$obj[$i]['date'] = $oStart->format('Y-n-j');
			$obj[$i]['value'] = mt_rand(60, 99)/10;
			$oStart->add(new DateInterval("P1D"));
		}
*/		

		$files_charts = Storage::files('/charts');
		$temp = [];
		foreach ($files_charts as $file) {
			$temp[] = strtok(mb_substr($file, 7), '.');
		}
		$files_charts = $temp;
		//echo '<pre>'.print_r($temp,true).'</pre>';

		$indicators_obj = Indicator::all();
		$data_obj = Dataset::orderBy('date')->get();		
		
		return view('admin.charts', ['title' => $this->title, 'indicators_obj' => $indicators_obj, 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $data_obj, 'files_charts' => $files_charts]);
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
		Storage::put('public/charts/'.$request->fileName.'.png', file_get_contents($request->img));
		$data = 'Файл сохранен в / storage / app / public / charts / '.$request->fileName.'.png';

		if ($request->fileExport) {
			$url = asset('storage/charts/'.$request->fileName.'.png');
			return $url;
		}

		return $data;
	}

}
