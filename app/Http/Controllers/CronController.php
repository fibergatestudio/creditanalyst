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

class CronController extends Controller
{
    //

    /*
    * Функция, которая отвечает за рассылку уведомлений пользователям
    */
    public function notification_pusher(){
        
        
        // Получить список всех новых показателей, которые "зашли" в систему с прошлого прогона
        // Для этого используются данные об ID последнего проработанного вхождения данных
        $last_processed_id = CronData::get_last_processed_indicator_id();
        
        // !!! ЗАМЕНИТЬ ПОКАЗАТЕЛИ НА ВХОЖДЕНИЯ ДАННЫХ
        
        $new_data_entries = Dataset::where('id', '>=', $last_processed_id)->get();
        foreach($new_data_entries as $new_data_entry){ // Перебираем все "зашедшие" показатели
            $indicator_watchers = Indicator_watcher::where('indicator_id', '=', $new_data_entry->indicator_id)->get(); // И собираем пользователей, которых нужно оповестить
            foreach($indicator_watchers as $indicator_watcher){ // Перебираем каждое вхождение
                $user_to_be_notified_id = $indicator_watcher->user_id; // Берём по очереди каждого пользователя
                // И добавляем для него уведомление

                // ...
            }
            

        }
        // ...

        // Проходимся по списку показателей и проверяем, кто из пользователей "подписан" на показатель
        // Для каждого подписанного пользователя добавляем уведомление в базу


        // ...

        // Устанавливаем новый ID последнего проработанного показателя

        //...

        // Т.к. этот скрипт отрабатывает по крону, не делаем редирект

        
    }
}
