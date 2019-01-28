<?php
/*
* Контроллер для действий, осуществляемых через крон
* В частности - рассылка уведомлений
*/

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\User;
use App\CronData;
use App\Indicator;
use App\IndicatorWatcher;
use App\Dataset;
use App\Notification;
use App\Daily_notifications;

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
        
        $last_data_entry_id = $last_processed_id;

        // Перебираем все "зашедшие" показатели
        foreach($new_data_entries as $new_data_entry){ 

            // И собираем пользователей, которых нужно оповестить по показателю
            $indicator_watchers = IndicatorWatcher::where('indicator_id', '=', $new_data_entry->indicator_id)->get(); 
            
            // Перебираем каждое вхождение вотчера (1 пользователь = 1 вотчер)
            foreach($indicator_watchers as $indicator_watcher){ 
                
                // Берём из вотчера пользователя
                $user_to_be_notified_id = $indicator_watcher->user_id;
                $user_to_be_notified = User::find($user_to_be_notified_id);
                
                /* Если на уведомлении включены моментальные уведомления, то добавляем уведомления */
                $indicator_watcher->are_instant_notifications_on();
                
                if($indicator_watcher->are_instant_notifications_on()){
                    
                    /* Проверяем, есть ли непросмотренное уведомление по тому же индикатору */
                    /* Если есть, то обновляем ID вхождения данных по этому индикатору */

                    
                    // ...
                    

                    /* Если нету, создаём новое */
                    $new_notification = new Notification();
                    $new_notification->user_id = $user_to_be_notified_id;
                    $new_notification->dataset_entry_id = $new_data_entry->id;
                    $new_notification->seen = false;
                    $new_notification->save();
                    
                    

                } else { /* Если моментальные уведомления выключены - добавляем уведомления в список ожидания */
                    /* Список ожидания отрабатывает скриптом /cron_daily раз в сутки */
                    $new_notification = new Daily_notifications();
                    $new_notification->user_id = $user_to_be_notified_id;
                    $new_notification->dataset_entry_id = $new_data_entry->id;
                    $new_notification->save();
                    

                }

                /* Вхождение данных прошло по всем вотчерам - отмечаем новый ID для последнего проработанного вхождения */
                $last_data_entry_id = $new_data_entry->id;
                    
                
                
            }
            
        }
        
        // Устанавливаем новый ID последнего проработанного показателя
        CronData::set_last_processed_data_entry_id($last_data_entry_id);

        // Т.к. этот скрипт отрабатывает по крону, не делаем редирект
        
    }

    /* Функция, которая вызывается по крону 1 раз в сутки */
    /* Переносит уведомления из таблицы ожидания в таблицу уведомлений */
    public function cron_daily(){
        /* Берём все уведомления, ожидающие в таблице daily_notifications_waiting_list */
        $daily_notifications = Daily_notifications::all();
        /* Перебираем уведомления */
        foreach($daily_notifications as $daily_notification){
            /* Вносим в новую таблицу */
            $new_notification = new Notification();
            $new_notification->user_id = $daily_notification->user_id;
            $new_notification->dataset_entry_id = $daily_notification->dataset_entry_id;
            $new_notification->seen = false;
            $new_notification->save();
            
            /* Удаляем из старой таблицы */
            $daily_notification->delete();
        } // endforeach
    }
}
