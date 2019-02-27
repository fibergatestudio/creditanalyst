<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Support\Facades\DB;

class IndicatorWatcher extends Model
{
    protected $table = 'user_indicator_watch_list';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function indicator()
    {
        return $this->belongsTo('App\Indicator');
    }

    public static function getDataListByUserId($userId): array
    {
        $userId = (int)$userId;
        $sql = 'SELECT 
`uiwl`.`id`,
`uiwl`.`indicator_id`,
`uiwl`.`alias`,
`uiwl`.`position`,
`uiwl`.`notify`,
`uiwl`.`notify_info`,
`i`.`name`,
`i`.`frequency`,
(SELECT `d`.`value` FROM `data` AS `d` WHERE `d`.`indicator_id` = `i`.`id` ORDER BY `d`.`id` DESC LIMIT 1) AS `value`
FROM `user_indicator_watch_list` AS `uiwl`
JOIN `indicators` AS `i` ON `i`.`id` = `uiwl`.`indicator_id`
WHERE
    `uiwl`.`user_id` = ?
ORDER BY `uiwl`.`position` DESC;';
        $result = DB::select($sql, [$userId]);
        foreach ($result as $key => $val) {
            $result[$key]->notify = (bool)$val->notify;
            $result[$key]->value = (float)$val->value;
            $result[$key]->notify_info = json_decode($val->notify_info);
        }
        return $result;
    }
    
    /* Функция, которая даёт информацию о том, уведомление моментальное (true) или ежедневное (false) */
    public function are_instant_notifications_on(){
        $notification_info = json_decode($this->notify_info);
        if(property_exists($notification_info, 'when') && $notification_info->when == 'digest'){
            return false;
        } else {
            return true;
        }
    }
    
    // Функция, которая дает информацию о том, нужно  отправлять уведомление по почте (true) или нет
    public function are_send_to_email(){
        $notification_info = json_decode($this->notify_info);
        if(property_exists($notification_info, 'way') && in_array('email', $notification_info->way)){
            return true;
        } else {
            return false;
        }
    }
}
