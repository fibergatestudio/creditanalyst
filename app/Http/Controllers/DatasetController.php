<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Indicator;
use App\Dataset;

class DatasetController extends Controller
{
    // Просмотр всех данных для показателя
    public function view_data_for_indicator($indicator_id){
        // Получаем все данные по показателю + данные о самом показателе
        
        //$current_dataset = Dataset::where('indicator_id', $indicator_id)->get();
        $current_indicator = Indicator::find($indicator_id);

        $current_indicator =
            DB::table('indicators')
                ->where('indicators.id', '=', $indicator_id)
                ->join('measurement_units', 'indicators.measurement_unit', '=', 'measurement_units.slug')
                ->select('indicators.*', 'measurement_units.name_ru AS measurement_unit_name')
                ->first();
        
        $current_dataset = 
            DB::table('data')
                ->where('indicator_id', '=', $indicator_id)
                ->join('koatuu', 'data.geography', '=', 'koatuu.unique_koatuu_id')
                ->select('data.*', 'koatuu.name_ru AS koatuu_name')
                ->orderBy('data.date', 'desc')
                ->get();
        
        

        return view('dataset.dataset_index', 
            [
                'dataset' => $current_dataset,
                'indicator' => $current_indicator
            ]);


    }
}
