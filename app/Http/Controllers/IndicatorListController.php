<?php
/*
* Контроллер, который отвечает за отображение Показателй
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Infosource;
use App\Indicator;

use Illuminate\Support\Facades\DB;

class IndicatorListController extends Controller
{
    //

    /*
    * Функция отображает все Показатели в Источнике по ID Исчтоника
    */
    public function show($source_id){
        $infosource = Infosource::find($source_id);
        $indicators = Indicator::where('source_id', $source_id)->get();

        return view('indicator_list.indicators_index',
            [
                'infosource' => $infosource,
                'indicators' => $indicators
            ]
        );
    }

    /*
    * Функция страницы поиска Показателей
    */
    public function search($search_query = ''){
        $results = [];
        $results_meta = [];
        
        if(isset($_GET['search_query'])){
            $results = Indicator::search($_GET['search_query'])->get();
            
            
            foreach($results as $result_entry){
                $results_meta[$result_entry->id]['procurer'] = Infosource::find($result_entry->source_id)->procurer;
                $results_meta[$result_entry->id]['infosource_name'] = Infosource::find($result_entry->source_id)->name;
            }
            
        }

        return view('indicator_list.indicator_search',[
            'results' => $results,
            'results_meta' => $results_meta
        ]);
    }
}
