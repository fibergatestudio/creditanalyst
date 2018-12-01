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
			'name' => 'Объёмы производства картошки в Украине (тонны, год)',
			'frequency' => 'год',
			'measurement_unit' => 'тонны',

		),
		'1' => Array
		(
			'id' => 2,
			'name' => 'ВВП Украины (млрд. грн., квартал)',
			'frequency' => 'квартал',
			'measurement_unit' => 'млрд. грн.',

		),
		'2' => Array
		(
			'id' => 3,
			'name' => 'Цены на бананы (грн., месяц)',
			'frequency' => 'месяц',
			'measurement_unit' => 'грн.',

		),
		'3' => Array
		(
			'id' => 4,
			'name' => 'Цены на картошку (грн., месяц)',
			'frequency' => 'месяц',
			'measurement_unit' => 'грн.',

		),
		'4' => Array
		(
			'id' => 5,
			'name' => 'Цены на капусту (грн., месяц)',
			'frequency' => 'месяц',
			'measurement_unit' => 'грн.',

		),
		'5' => Array
		(
			'id' => 6,
			'name' => 'Цены на морковку (грн., месяц)',
			'frequency' => 'месяц',
			'measurement_unit' => 'грн.',

		),
		'6' => Array
		(
			'id' => 7,
			'name' => 'Цены на лук (грн., месяц)',
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
				'date' => '2011-1-1',
				'value' => '800'
			],
			[
				'date' => '2012-1-1',
				'value' => '850'
			],
			[
				'date' => '2013-1-1',
				'value' => '900'
			],
			[
				'date' => '2014-1-1',
				'value' => '830'
			],
			[
				'date' => '2015-1-1',
				'value' => '950'
			],
			[
				'date' => '2016-1-1',
				'value' => '935'
			],
			[
				'date' => '2017-1-1',
				'value' => '960'
			]
		),
		'2' => Array
		(
			[
				'date' => '2016-1-1',
				'value' => '875'
			],
			[
				'date' => '2016-4-1',
				'value' => '850'
			],
			[
				'date' => '2016-7-1',
				'value' => '699'
			],
			[
				'date' => '2016-10-1',
				'value' => '830'
			],
			[
				'date' => '2017-1-1',
				'value' => '970'
			],
			[
				'date' => '2017-4-1',
				'value' => '935'
			],
			[
				'date' => '2017-7-1',
				'value' => '760'
			],
			[
				'date' => '2017-10-1',
				'value' => '965'
			]
		),
		'3' => Array
		(
			[
				'date' => '2017-1-1',
				'value' => '22.50'
			],
			[
				'date' => '2017-2-1',
				'value' => '22.20'
			],
			[
				'date' => '2017-3-1',
				'value' => '22.40'
			],
			[
				'date' => '2017-4-1',
				'value' => '23.50'
			],
			[
				'date' => '2017-5-1',
				'value' => '23.20'
			],
			[
				'date' => '2017-6-1',
				'value' => '23.00'
			],
			[
				'date' => '2017-7-1',
				'value' => '23.00'
			],
			[
				'date' => '2017-8-1',
				'value' => '23.40'
			],
			[
				'date' => '2017-9-1',
				'value' => '23.30'
			],
			[
				'date' => '2017-10-1',
				'value' => '23.50'
			],
			[
				'date' => '2017-11-1',
				'value' => '22.20'
			],
			[
				'date' => '2017-12-1',
				'value' => '22.60'
			]
		),
		'4' => Array
		(
			[
				'date' => '2017-1-1',
				'value' => '7.50'
			],
			[
				'date' => '2017-2-1',
				'value' => '7.20'
			],
			[
				'date' => '2017-3-1',
				'value' => '8.40'
			],
			[
				'date' => '2017-4-1',
				'value' => '8.50'
			],
			[
				'date' => '2017-5-1',
				'value' => '9.20'
			],
			[
				'date' => '2017-6-1',
				'value' => '8.00'
			],
			[
				'date' => '2017-7-1',
				'value' => '7.00'
			],
			[
				'date' => '2017-8-1',
				'value' => '6.40'
			],
			[
				'date' => '2017-9-1',
				'value' => '6.30'
			],
			[
				'date' => '2017-10-1',
				'value' => '6.50'
			],
			[
				'date' => '2017-11-1',
				'value' => '6.20'
			],
			[
				'date' => '2017-12-1',
				'value' => '7.60'
			]
		),
		'5' => Array
		(
			[
				'date' => '2017-1-1',
				'value' => '8.00'
			],
			[
				'date' => '2017-2-1',
				'value' => '9.20'
			],
			[
				'date' => '2017-3-1',
				'value' => '9.40'
			],
			[
				'date' => '2017-4-1',
				'value' => '10.50'
			],
			[
				'date' => '2017-5-1',
				'value' => '9.20'
			],
			[
				'date' => '2017-6-1',
				'value' => '9.00'
			],
			[
				'date' => '2017-7-1',
				'value' => '7.50'
			],
			[
				'date' => '2017-8-1',
				'value' => '7.40'
			],
			[
				'date' => '2017-9-1',
				'value' => '7.30'
			],
			[
				'date' => '2017-10-1',
				'value' => '7.50'
			],
			[
				'date' => '2017-11-1',
				'value' => '8.20'
			],
			[
				'date' => '2017-12-1',
				'value' => '8.60'
			]
		), 		
		'6' => Array
		(
			[
				'date' => '2017-1-1',
				'value' => '8.50'
			],
			[
				'date' => '2017-2-1',
				'value' => '8.20'
			],
			[
				'date' => '2017-3-1',
				'value' => '8.40'
			],
			[
				'date' => '2017-4-1',
				'value' => '8.50'
			],
			[
				'date' => '2017-5-1',
				'value' => '9.20'
			],
			[
				'date' => '2017-6-1',
				'value' => '7.00'
			],
			[
				'date' => '2017-7-1',
				'value' => '7.00'
			],
			[
				'date' => '2017-8-1',
				'value' => '6.40'
			],
			[
				'date' => '2017-9-1',
				'value' => '6.30'
			],
			[
				'date' => '2017-10-1',
				'value' => '7.00'
			],
			[
				'date' => '2017-11-1',
				'value' => '7.20'
			],
			[
				'date' => '2017-12-1',
				'value' => '7.60'
			]
		),
		'7' => Array
		(
			[
				'date' => '2016-1-1',
				'value' => '7.50'
			],
			[
				'date' => '2016-2-1',
				'value' => '7.20'
			],
			[
				'date' => '2016-3-1',
				'value' => '8.40'
			],
			[
				'date' => '2016-4-1',
				'value' => '8.50'
			],
			[
				'date' => '2016-5-1',
				'value' => '9.20'
			],
			[
				'date' => '2016-6-1',
				'value' => '8.00'
			],
			[
				'date' => '2016-7-1',
				'value' => '7.00'
			],
			[
				'date' => '2016-8-1',
				'value' => '6.40'
			],
			[
				'date' => '2016-9-1',
				'value' => '6.30'
			],
			[
				'date' => '2016-10-1',
				'value' => '6.50'
			],
			[
				'date' => '2016-11-1',
				'value' => '6.20'
			],
			[
				'date' => '2016-12-1',
				'value' => '7.60'
			],
			[
				'date' => '2017-1-1',
				'value' => '7.20'
			],
			[
				'date' => '2017-2-1',
				'value' => '7.60'
			],
			[
				'date' => '2017-3-1',
				'value' => '8.10'
			],
			[
				'date' => '2017-4-1',
				'value' => '8.50'
			],
			[
				'date' => '2017-5-1',
				'value' => '9.20'
			],
			[
				'date' => '2017-6-1',
				'value' => '8.00'
			],
			[
				'date' => '2017-7-1',
				'value' => '7.50'
			],
			[
				'date' => '2017-8-1',
				'value' => '7.40'
			],
			[
				'date' => '2017-9-1',
				'value' => '7.30'
			],
			[
				'date' => '2017-10-1',
				'value' => '8.50'
			],
			[
				'date' => '2017-11-1',
				'value' => '8.20'
			],
			[
				'date' => '2017-12-1',
				'value' => '9.60'
			],
			[
				'date' => '2018-1-1',
				'value' => '8.00'
			],
			[
				'date' => '2018-2-1',
				'value' => '9.20'
			],
			[
				'date' => '2018-3-1',
				'value' => '9.40'
			],
			[
				'date' => '2018-4-1',
				'value' => '10.50'
			],
			[
				'date' => '2018-5-1',
				'value' => '9.20'
			],
			[
				'date' => '2018-6-1',
				'value' => '9.00'
			],
			[
				'date' => '2018-7-1',
				'value' => '7.50'
			],
			[
				'date' => '2018-8-1',
				'value' => '7.40'
			],
			[
				'date' => '2018-9-1',
				'value' => '7.30'
			],
			[
				'date' => '2018-10-1',
				'value' => '7.50'
			],
			[
				'date' => '2018-11-1',
				'value' => '8.20'
			],
			[
				'date' => '2018-12-1',
				'value' => '8.60'
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
