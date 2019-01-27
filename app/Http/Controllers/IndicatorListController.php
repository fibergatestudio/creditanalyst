<?php
/*
* Контроллер, который отвечает за отображение Показателй
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Infosource;
use App\Indicator;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
class IndicatorListController extends Controller
{

    /*
    * ОДИН Источник - все показатели : страница отображения
    */
    public function show($source_id){
        $infosource = Infosource::find($source_id);
        //$indicators = Indicator::where('source_id', $source_id)->get();

        $indicators = 
            DB::table('indicators')
                ->where('source_id', $source_id)
                ->paginate(3);
        
        return view('indicator_list.indicators_index',
            [
                'infosource' => $infosource,
                'indicators' => $indicators,
                'active_sidebar_name' => 'sources'
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
            
            $search_query = $_GET['search_query'];
            
            

            $results = Indicator::selectRaw("*, MATCH(name) AGAINST ('".$_GET['search_query']."')")
                ->whereRaw("MATCH(name)AGAINST('".$_GET['search_query']."' IN BOOLEAN MODE)")
                ->paginate(5);

            //print_r($results);

            foreach($results as $result_entry){
                $results_meta[$result_entry->id]['procurer'] = Infosource::find($result_entry->source_id)->procurer;
                $results_meta[$result_entry->id]['infosource_name'] = Infosource::find($result_entry->source_id)->name;
            }
            
        }

        return view('indicator_list.indicator_search',[
            'results' => $results,
            'results_meta' => $results_meta,
            'active_sidebar_name' => 'search',
            'search_query' => $search_query
        ]);
    }
    
    /* Отобразить все результаты поиска*/
    public function show_all_search($search_query = ''){
        $results = [];
        $results_meta = [];
        
        if(isset($_GET['search_query'])){
            $results = Indicator::search($_GET['search_query'])->get();
            
            $search_query = $_GET['search_query'];
            
            

            $results = Indicator::selectRaw("*, MATCH(name) AGAINST ('".$_GET['search_query']."')")
                ->whereRaw("MATCH(name)AGAINST('".$_GET['search_query']."' IN BOOLEAN MODE)")
                ->get();

            //print_r($results);

            foreach($results as $result_entry){
                $results_meta[$result_entry->id]['procurer'] = Infosource::find($result_entry->source_id)->procurer;
                $results_meta[$result_entry->id]['infosource_name'] = Infosource::find($result_entry->source_id)->name;
            }
            
        }

        return view('indicator_list.indicator_search_all',[
            'results' => $results,
            'results_meta' => $results_meta,
            'active_sidebar_name' => 'search',
            'search_query' => $search_query
        ]);
    }
}
