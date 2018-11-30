<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


// Модели, созданные для приложения
use App\Indicator_watcher;

class MonitoringController extends Controller
{
    /*
    * Отображение списка индикаторов, отслеживаемых пользователем
    */
    public function show_user_indicator_watch_list(){

        $current_user_id = Auth::id();
        //$indicator_list = Indicator_watcher::where('user_id', $current_user_id)->get();

        // LEFT JOIN STATEMENT
        $indicator_watch_data = 
            DB::table('user_indicator_watch_list')
                ->join('indicators', 'user_indicator_watch_list.indicator_id', '=', 'indicators.id')
                ->select('user_indicator_watch_list.*', 'indicators.name')
                ->get();

        
        return view('monitoring.monitoring_index', ['indicator_watchlist_data' => $indicator_watch_data]);
    }

    /*
    * Функция добвавления индикаторов к списку мониторинга
    */
    public function add_indicator_to_watch_list($indicator_id){
      
        $user_id = Auth::id(); // Получаем ID текущего юзера
        
        // Проверка на дуби
        $duplicate_check = 
            DB::table('user_indicator_watch_list')
                ->where([
                    ['user_id', '=', $user_id],
                    ['indicator_id', '=', $indicator_id]
                ])
                ->first();
                
        //
        if(empty($duplicate_check)){
            $new_watcher = new Indicator_watcher();
            $new_watcher->user_id = $user_id;
            $new_watcher->indicator_id = $indicator_id;
            $new_watcher->save();
        }
        
        return redirect('user_indicator_watch_list'); // Редирект на страницу мониторинга
       
    }

    // Функция удаления индикатора из списка наблюдаемых
    public function remove_indicator_from_watchlist($indicator_id){

        $user_id = Auth::id();

        $indicator_watcher_finder = 
            DB::table('user_indicator_watch_list')
                ->where([
                    ['user_id', '=', $user_id],
                    ['indicator_id', '=', $indicator_id]
                ])
                ->first();
        
        
        if(!empty($indicator_watcher_finder)){
            
            $watcher = Indicator_watcher::find($indicator_watcher_finder->id);
            $watcher->delete();
        }
        

        return redirect('user_indicator_watch_list');

        

    }
}
