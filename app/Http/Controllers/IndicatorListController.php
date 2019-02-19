<?php
/*
* Контроллер, который отвечает за отображение Показателй
*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Infosource;
use App\Indicator;
use App\Empty_requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Mail\SearchEmail;
use Mail;



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
                ->paginate(10);

        foreach ($indicators as $indicator) {
            $indicator_eloquent = Indicator::find($indicator->id);
            $indicator->localized_name = $indicator_eloquent->language_name();
        }        
        
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
    public function search(Request $request){
        $results = [];
        $results_meta = [];
        $search_query = $request->search_query;
        $need_number = 10; //Сколько показывать результатов поиска на странице


        if(isset($search_query)){
            $results = Indicator::search($search_query)->get();  

            $results = Indicator::selectRaw("*, MATCH(name) AGAINST ('".$search_query."')")
                ->whereRaw("MATCH(name)AGAINST('".$search_query."' IN BOOLEAN MODE)")
                ->get();

            //print_r($results);

            foreach($results as $result_entry){
                $results_meta[$result_entry->id]['procurer'] = Infosource::find($result_entry->source_id)->language_procurer();
                $results_meta[$result_entry->id]['infosource_name'] = Infosource::find($result_entry->source_id)->language_name();
            }
            
        }

        return view('indicator_list.indicator_search',[
            'results' => $results,
            'results_meta' => $results_meta,
            'active_sidebar_name' => 'search',
            'search_query' => $search_query,
            'need_number' => $need_number
        ]);
    }
    
    /* Отобразить все результаты поиска*/
    public function show_all_search(Request $request){
        $results = [];
        $results_meta = [];
        $search_query = $request->search_query;


        if(isset($search_query)){
            $results = Indicator::search($search_query)->get();   
            

            $results = Indicator::selectRaw("*, MATCH(name) AGAINST ('".$search_query."')")
                ->whereRaw("MATCH(name)AGAINST('".$search_query."' IN BOOLEAN MODE)")
                ->get();

            //print_r($results);

            foreach($results as $result_entry){
                $results_meta[$result_entry->id]['procurer'] = Infosource::find($result_entry->source_id)->language_procurer();
                $results_meta[$result_entry->id]['infosource_name'] = Infosource::find($result_entry->source_id)->language_name();
            }
            
        }

        return view('indicator_list.indicator_search_all',[
            'results' => $results,
            'results_meta' => $results_meta,
            'active_sidebar_name' => 'search',
            'search_query' => $search_query
        ]);
    }
    
    /*
    * Функция страницы поиска Показателей
    */

    public function send_message(Request $request){
        
        $search_result = new \stdClass();
        $search_result->message = $request->message;                            // текст сообщения
        $search_result->email = $request->email;
        $search_result->name = $request->name;                                // от кого сообщение                                    
 
        Mail::to("credit.s.test@i.ua")->queue(new SearchEmail($search_result));
        
        
        /*$newmessage = new Empty_requests();
        $newmessage->message = $request->message;
        $newmessage->email = $request->email;
        $newmessage->save();*/

        /* return back(); */
        return redirect('indicator_search');
    }
}
