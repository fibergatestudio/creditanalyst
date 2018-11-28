<?php

/*
* Контроллер, который отображает страницу графиков
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use DateTime;
use DateInterval;

class ChartsController extends AdminController
{
	private	$title = 'Статистика и анализ';
	//Object индикаторов
	private	$indicators_obj = [
		'0' => Array
		(
			'id' => 1,
			'name' => 'Объёмы производства картошки в Украине (тонны)',
			'frequency' => 'год',
			'measurement_unit' => 'тонны',

		),
		'1' => Array
		(
			'id' => 2,
			'name' => 'ВВП Украины (млрд. грн.)',
			'frequency' => 'квартал',
			'measurement_unit' => 'млрд. грн.',

		),
		'2' => Array
		(
			'id' => 3,
			'name' => 'Цены на бананы (грн.)',
			'frequency' => 'месяц',
			'measurement_unit' => 'грн.',

		),
		'3' => Array
		(
			'id' => 4,
			'name' => 'Цены на картошку (грн.)',
			'frequency' => 'месяц',
			'measurement_unit' => 'грн.',

		),          
	];
	private	$months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
	private	$years = ['1991','1992','1993','1994','1995','1996','1997','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018'];
	//Object данных
	private	$data_obj = [
		'1' => Array
		(
			[
				'date' => '1.01.2011',
				'value' => '800'
			],
			[
				'date' => '1.01.2012',
				'value' => '850'
			],
			[
				'date' => '1.01.2013',
				'value' => '900'
			],
			[
				'date' => '1.01.2014',
				'value' => '830'
			],
			[
				'date' => '1.01.2015',
				'value' => '950'
			],
			[
				'date' => '1.01.2016',
				'value' => '935'
			],
			[
				'date' => '1.01.2017',
				'value' => '960'
			]
		),
		'2' => Array
		(
			[
				'date' => '1.01.2016',
				'value' => '875'
			],
			[
				'date' => '1.04.2016',
				'value' => '850'
			],
			[
				'date' => '1.07.2016',
				'value' => '699'
			],
			[
				'date' => '1.10.2016',
				'value' => '830'
			],
			[
				'date' => '1.01.2017',
				'value' => '970'
			],
			[
				'date' => '1.04.2017',
				'value' => '935'
			],
			[
				'date' => '1.07.2017',
				'value' => '760'
			],
			[
				'date' => '1.10.2017',
				'value' => '965'
			]
		),
		'3' => Array
		(
			[
				'date' => '1.01.2017',
				'value' => '22.50'
			],
			[
				'date' => '1.02.2017',
				'value' => '22.20'
			],
			[
				'date' => '1.03.2017',
				'value' => '22.40'
			],
			[
				'date' => '1.04.2017',
				'value' => '23.50'
			],
			[
				'date' => '1.05.2017',
				'value' => '23.20'
			],
			[
				'date' => '1.06.2017',
				'value' => '23.00'
			],
			[
				'date' => '1.07.2017',
				'value' => '23.00'
			],
			[
				'date' => '1.08.2017',
				'value' => '23.40'
			],
			[
				'date' => '1.09.2017',
				'value' => '23.30'
			],
			[
				'date' => '1.10.2017',
				'value' => '23.50'
			],
			[
				'date' => '1.11.2017',
				'value' => '22.20'
			],
			[
				'date' => '1.12.2017',
				'value' => '22.60'
			]
		),
		'4' => Array
		(
			[
				'date' => '1.01.2017',
				'value' => '7.50'
			],
			[
				'date' => '1.02.2017',
				'value' => '7.20'
			],
			[
				'date' => '1.03.2017',
				'value' => '8.40'
			],
			[
				'date' => '1.04.2017',
				'value' => '8.50'
			],
			[
				'date' => '1.05.2017',
				'value' => '9.20'
			],
			[
				'date' => '1.06.2017',
				'value' => '8.00'
			],
			[
				'date' => '1.07.2017',
				'value' => '7.00'
			],
			[
				'date' => '1.08.2017',
				'value' => '6.40'
			],
			[
				'date' => '1.09.2017',
				'value' => '6.30'
			],
			[
				'date' => '1.10.2017',
				'value' => '6.50'
			],
			[
				'date' => '1.11.2017',
				'value' => '6.20'
			],
			[
				'date' => '1.12.2017',
				'value' => '7.60'
			]

		),          
	];

	

	/*
    * Функция которая отображает страницу создания графиков
    */
	
	public function index(){
		
		//Здесь мы заносим в массив дни заданного года
		$days_of_year = [];
		$aDates = array();
		$oStart = new DateTime('2018-01-01');
		$oEnd = clone $oStart;
		$oEnd->add(new DateInterval("P1Y"));

		while ($oStart->getTimestamp() < $oEnd->getTimestamp()) {
			$aDates[] = $oStart->format('d');
			$oStart->add(new DateInterval("P1D"));
		}

		//echo '<pre>'.print_r($indicators_obj,true).'</pre>';
		return view('admin.charts', ['title' => $this->title, 'indicators_obj' => $this->indicators_obj, 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj]);
	}


	/*
    * Функция которая выделяет имена индикаторов и возвращает json 
    */

	private function get_arr_name_indicators(){
		$indicators_name = [];
		foreach ($this->indicators_obj as $k => $value) {
			$indicators_name[] = $value['name'];
		}
		$indicators_name =  json_encode($indicators_name,JSON_UNESCAPED_UNICODE);

		return $indicators_name;
	}

	
	/*
    * Функция которая сохраняет график в картинку
    */

	public function save_img_file(Request $request){
		$image = fopen($request->img, 'r');
		file_put_contents("fileName.png", $image);
		fclose($image);
		$data = 'Файл сохранен в public / fileName.png !';

		return $data;
	}

}
