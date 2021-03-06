<?php
/*
* Контроллер для действий, осуществляемых через крон
* В частности - рассылка уведомлений
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Получаем список всех активных вотчеров с включенными уведомлениями (notify = 1) для всех пользователей
        $active_notification_watchers = IndicatorWatcher::where('notify', 1)->get();

        // Перебираем все вотчеры
        foreach($active_notification_watchers as $notification_watcher){

            // Проверяем, заходили ли по данному вотчеру новые данные с момента последнего исполнения крон скрипта по последнему отработанному id
            $last_processed_id = CronData::get_last_processed_data_id();
            $new_data_count = DB::table('data')
                ->where([
                    ['indicator_id', '=', $notification_watcher->indicator_id],
                    ['id', '>', $last_processed_id]
                ])
                ->count();
            
            // Если есть новые данные, нужно задать для них уведомления
            if($new_data_count == 0){                                           // если не было изменений
                $last_data_entry_id = Dataset::orderBy('id', 'desc')->first();                
            }else{                                                              // изменения есть
                $last_data_entry_id = Dataset::orderBy('id', 'desc')->first();
                if($notification_watcher->are_instant_notifications_on() === true){  // проверяем когда отправлять уведомление (сразу)
                    $new_notification = new Notification();
                    $new_notification->user_id = $notification_watcher->user_id;
                    $new_notification->indicator_id = $notification_watcher->indicator_id;
                    $new_notification->seen = 0;
                    $new_notification->save();
                        
                    }else{                                                      // отправка "раз в сутки", сохраняем т таблицу daily_notification_watch_list
                        $new_daily_notification = new Daily_notifications();
                        $new_daily_notification->user_id = $notification_watcher->user_id;
                        $new_daily_notification->indicator_id = $notification_watcher->indicator_id;
                        $new_daily_notification->seen = 0;
                        $new_daily_notification->save(); 
                                
                        }
                        
            }             
                                        
            
        } // end foreach

        //Устанавливаем новый последний отработанный ID
        // !! Раскоментировать, закоменчено для теста
        CronData::set_last_processed_data_entry_id($last_data_entry_id->id);
        

        /*
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
        */
    } /* Конец функции */

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
            $new_notification->indicator_id = $daily_notification->indicator_id;
            $new_notification->seen = false;
            $new_notification->save();

            /* Удаляем из старой таблицы */
            $daily_notification->delete();
        } // endforeach
    }
}
