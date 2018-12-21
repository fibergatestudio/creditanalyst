<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB,
    Illuminate\Support\Facades\Auth,
    Illuminate\Http\Request,
    App\IndicatorWatcher,
    App\Indicator,
    App\Dataset;

class MonitoringController extends Controller
{

    public function index()
    {
        return view('monitoring.index');
    }

    public function watchlist()
    {
        $userId = Auth::id();
        return IndicatorWatcher::getDataListByUserId($userId);
    }

    public function remove($id)
    {
        $id = (int)$id;
        $userId = Auth::id();
        $indicator = IndicatorWatcher::find($id);
        if (!$indicator) {
            abort(404);
        }

        if ($indicator->user_id != $userId) {
            abort(403);
        }
        $indicator->delete();
        return;
    }

    public function chart(Request $request, $id)
    {
        $indicatorWatcher = IndicatorWatcher::find($id);
        $indicator = Indicator::find($indicatorWatcher->indicator_id);


        $backgroundColor = 'rgb(240, 214, 129)';
        $borderColor = 'rgb(77, 36, 116)';


        $data = Dataset::getDataGroupedByYears($indicatorWatcher->indicator_id);
        $dataset = [
            'labels' => [],
            'data' => []
        ];

        foreach($data as $item) {
            $dataset['labels'][] = $item->label;
            $dataset['data'][] = $item->value;

        }

        $result = [
            'labels' => $dataset['labels'],
            'datasets' =>  [
                [
                    'label' => (strlen($indicatorWatcher->alias) ? $indicatorWatcher->alias : $indicator->name),
                    'backgroundColor' => $backgroundColor,
                    'borderColor' => $borderColor,
                    'data' => $dataset['data'],
                ]
            ]
        ];
        return $result;
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
            $new_watcher = new IndicatorWatcher();
            $new_watcher->user_id = $user_id;
            $new_watcher->indicator_id = $indicator_id;
            $new_watcher->save();
        }
        
        return redirect('user_indicator_watch_list'); // Редирект на страницу мониторинга

    }
}
