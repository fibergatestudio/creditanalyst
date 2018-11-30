<?php
/*
* Контроллер, который отвечает за отображение Показателй
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Infosource;
use App\Indicator;

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
        
        if(isset($_GET['search_query'])){
            $results = Indicator::search($_GET['search_query'])->get();
        }

        return view('indicator_list.indicator_search',[
            'results' => $results
        ]);
    }
}
