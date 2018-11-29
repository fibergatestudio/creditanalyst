<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Indicator;
use App\Dataset;

class DatasetController extends Controller
{
    // Просмотр всех данных для показателя
    public function view_data_for_indicator($indicator_id){
        // Получаем все данные по показателю + данные о самом показателе
        
        $current_dataset = Dataset::where('indicator_id', $indicator_id)->get();

        return view('dataset.dataset_index', ['dataset' => $current_dataset]);


    }
}
