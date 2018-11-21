<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use DateTime;
use DateInterval;

class ChartsController extends AdminController
{
	public function index(){
		$title = 'Графики';
		$days_of_year = [];
		$aDates = array();
		$oStart = new DateTime('2018-01-01');
		$oEnd = clone $oStart;
		$oEnd->add(new DateInterval("P1Y"));

		while ($oStart->getTimestamp() < $oEnd->getTimestamp()) {
			$aDates[] = $oStart->format('d');
			$oStart->add(new DateInterval("P1D"));
		}
		//echo '<pre>'.print_r($aDates,true).'</pre>';

		return view('admin.charts', ['title' => $title]);
	}

	public function save_img_file(Request $request){
		$image = fopen($request->img, 'r');
		file_put_contents("fileName.png", $image);
		fclose($image);
		$data = 'Файл сохранен!';

		return $data;
	}

}
