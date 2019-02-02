<?php
/*
* Контроллер для действий, осуществляемых через крон
* В частности - рассылка уведомлений
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CronData;
use App\Indicator;
use App\Indicator_watcher;
use App\Dataset;
use App\Notification;

class CronController extends Controller
{
    //

    /*
    * Функция, которая отвечает за рассылку уведомлений пользователям
    */
    public function notification_pusher(){
        
        
        // Получить список всех новых данных, которые "зашли" в систему с прошлого прогона
        // Для этого используются данные об ID последнего проработанного вхождения данных
        $last_processed_id = CronData::get_last_processed_indicator_id();
        $new_data_entries = Dataset::where('id', '>=', $last_processed_id)->get();
        
        // Перебираем все "зашедшие" показатели
        foreach($new_data_entries as $new_data_entry){ 

            // И собираем пользователей, которых нужно оповестить
            $indicator_watchers = Indicator_watcher::where('indicator_id', '=', $new_data_entry->indicator_id)->get(); 
            
            // Перебираем каждое вхождение
            foreach($indicator_watchers as $indicator_watcher){ 
                
                // Берём по очереди каждого пользователя
                $user_to_be_notified_id = $indicator_watcher->user_id; 
                
                // И добавляем для него уведомления
                $last_data_entry_id = 0;
                
                if($new_data_entry->indicator_id == $indicator_watcher->indicator_id){
                    $new_notification = new Notification();
                    $new_notification->user_id = $user_to_be_notified_id;
                    $new_notification->dataset_entry_id = $new_data_entry->id;
                    $new_notification->seen = false;
                    $new_notification->save();
                    $last_data_entry_id = $new_data_entry->id;
                }
                    
                
                
            }
            
        }
        
        // Устанавливаем новый ID последнего проработанного показателя
        CronData::set_last_processed_data_entry_id($last_data_entry_id);

        // Т.к. этот скрипт отрабатывает по крону, не делаем редирект
        
    }
}
