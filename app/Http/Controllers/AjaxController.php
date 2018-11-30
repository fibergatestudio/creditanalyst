<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Indicator;

class AjaxController extends Controller
{
    //

    public function indicator_hints_json(){

        $indicators = Indicator::all();
        $data_array = [];
        foreach($indicators as $indicator){
            $data_array[] = $indicator->name;
        }
        //$data_array = ['Объёмы производства картошки в Украине', 'Объёмы производства картошки в Украине2'];
        echo json_encode($data_array);
    }
}
