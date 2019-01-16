<?php
/*
* Контроллер, который отображает страницу для сохранения карты
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Schema;
use DB;

class MapForSaveController extends AdminController
{
    /*
    * Отображает карту для сохранения
    */
    public function show(){

    	$datasets_obj = [];
    	$name_indicator_arr = [];

    	//получаем данные из базы, которые мы сохранили при создании карты
    	$datasets_obj = json_decode(DB::table('temp_data')->select('datasets_obj')->get());
    	$name_indicator_arr = json_decode(DB::table('temp_data')->select('name_indicator_arr')->get());

    	if (!empty($datasets_obj[0])){
    		foreach ($datasets_obj[0] as $key => $value) {
    			if ($key == 'datasets_obj') {
    				$datasets_obj = json_decode($value);
    			}
    		}
    	}
    	if (!empty($name_indicator_arr[0])){    
    		foreach ($name_indicator_arr[0] as $key => $value) {
    			if ($key == 'name_indicator_arr') {
    				$name_indicator_arr = json_decode($value);
    			}
    		}
    	}

    	/*echo '<pre>'.print_r($datasets_obj,true).'</pre>';
    	echo '<pre>'.print_r($name_indicator_arr,true).'</pre>';

    	die();*/

    	return view('map_for_save', ['indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full(), 'datasets_obj' => $datasets_obj, 'name_indicator_arr' => $name_indicator_arr]);
    }


    /*
    * Обрабатывает данные для карты
    */
    public function processing_data(Request $request){

    	$marker_arr = explode("&", $request->getString);
    	$indicators_obj = $this->indicators_obj();
    	$backgroundColorMap = ["#FF0000","#A62A00","#008110","#CCC"];
    	$number_indicator = 0;
    	$id_indicator_arr = [];
    	$marker_obj = [];
    	$datasets_arr = [];
    	$datasets_obj = [];
    	$name_indicator_arr = [];

	    //создаем объект индикаторов
    	for ($i=0; $i < count($marker_arr); $i++) { 
    		$temp = explode("=", $marker_arr[$i]);
    		$marker_obj[$temp[0]] = $temp[1];
    	}

	    //определяем id и кол-во индикаторов
    	foreach ($marker_obj as $key => $value) {
    		if (substr($key, 0, -1) == 'indicator') {
    			$id_indicator_arr[] = $value;
    			$number_indicator = count($id_indicator_arr);
    		}
    	}

	    //создаем из данных индикаторов в строке getString массив $datasets_arr
    	for ($i=0; $i < $number_indicator; $i++) { 
    		$temp = [];
    		foreach ($marker_obj as $key => $value){
    			if (substr($key, 0, -1) != 'indicator') {
    				if (substr($key, 0, 1) == $i) {
    					$temp[] = $value;
    				}
    			}
    		}
    		$datasets_arr[] = $temp;
    	}

	    //создаем массив имен индикаторов
    	for ($i=0; $i < count($id_indicator_arr); $i++) { 
    		for ($j = 0; $j < count($indicators_obj); $j++) {
    			if ($id_indicator_arr[$i] == $indicators_obj[$j]->id) {
    				$name_indicator_arr[] = $indicators_obj[$j]->name;
    			}
    		}
    	}

    	//создаем массив объектов $datasets_obj для передачи данных в диаграмму
    	for ($j = 0; $j < 25; $j++){
    		$tempObj = [];
    		$tempData = [];
    		$tempBack = [];
    		for ($i = 0; $i < count($datasets_arr); $i++) {
    			$tempData[] = $datasets_arr[$i][$j];
    			$tempBack[] = $backgroundColorMap[$i]; 
    		}
            //переводим данные индикаторов $tempData в проценты
    		$sum = 0;
    		for ($i = 0; $i < count($tempData); $i++) {
    			$sum += $tempData[$i];
    		}
    		$percent = $sum/100;
    		for ($i = 0; $i < count($tempData); $i++) {
    			$tempData[$i] = round($tempData[$i]/$percent);
    		}
    		$sum = 0;
    		for ($i = 0; $i < count($tempData); $i++) {
    			$sum += $tempData[$i];
    		}
    		if ((100 - $sum) !== 0) {
    			$tempData[0] += 100 - $sum;
    		}
    		$tempObj['data'] = $tempData;
    		$tempObj['backgroundColor'] = $tempBack;

    		$datasets_obj[] = $tempObj;
    	}

    	//заносим данные в базу данных
    	$datasets_obj_json = json_encode($datasets_obj,JSON_UNESCAPED_UNICODE);
    	$name_indicator_arr_json = json_encode($name_indicator_arr,JSON_UNESCAPED_UNICODE);

    	if (!Schema::hasTable('temp_data')) {
    		Schema::create('temp_data', function($table)
    		{
    			$table->text('datasets_obj');
    			$table->text('name_indicator_arr');
    			$table->timestamps();
    		});
    		DB::table('temp_data')
    		->insert(['datasets_obj' => $datasets_obj_json, 'name_indicator_arr' => $name_indicator_arr_json]);
    	}
    	else{
    		if (DB::table('temp_data')->select('name_indicator_arr')->get()->count() > 0) {
    			DB::table('temp_data')
    			->update(['datasets_obj' => $datasets_obj_json, 'name_indicator_arr' => $name_indicator_arr_json]);
    		}
    		else{
    			DB::table('temp_data')
    			->insert(['datasets_obj' => $datasets_obj_json, 'name_indicator_arr' => $name_indicator_arr_json]);
    		}
    	}

    	return DB::table('temp_data')->select('name_indicator_arr')->get();
    }
}
