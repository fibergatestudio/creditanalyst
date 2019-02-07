<?php

/*
* Контроллер, который отображает страницу графиков
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Indicator;
use App\Dataset;
use DateTime;
use DateInterval;

class ChartsController extends AdminController
{
	
	private	$title = 'Создать новый график';

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
				
		//echo '<pre>'.print_r($files_charts,true).'</pre>';
						
		return view('admin.charts', ['title' => $this->title, 'indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full()]);
	}

	
	/*
    * Функция которая сохраняет график в картинку и позволяет экспортировать
    */

	public function save_img_file(Request $request){

		$file_name = $request->fileName;

		$handle = fopen($request->img, "r");
		file_put_contents('charts/'.$file_name.'.png',$handle);
		fclose ($handle);
		$data = 'Файл сохранен в public / charts / '.$file_name.'.png';

		if ($request->fileExport) {
			$url = asset('charts/'.$file_name.'.png');
			return $url;
		}

		if ($request->fileExportToWord) {
			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
			$section->addImage('charts/'.$file_name.'.png', array('width' => 500,
        'height' => 150));  
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('charts/'.$file_name.'.docx');
			$url = asset('charts/'.$file_name.'.docx');
			unlink('charts/'.$file_name.'.png');
			return $url;
		}

		return $data;
	}

}
