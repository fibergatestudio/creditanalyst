<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CronData extends Model
{
    protected $table = 'cron_data';

    /*
    * Функция, которая получает ID последнего отработанного элемента
    */
    public static function get_last_processed_indicator_id(){
        $data_last_processed_indicator_id = 
            DB::table('cron_data')
            ->where('key', '=', 'last_processed_indicator_id')
            ->first();
        $id_to_return = $data_last_processed_indicator_id->value;
        return $id_to_return;

    }

    /*
    * Функция, которая устанавливает ID последнего отработанного элемента
    */

    public static function set_last_processed_data_entry_id($id){
        DB::table('cron_data')
            ->where('key', '=', 'last_processed_indicator_id')
            ->update(['value' => $id]);
    }
}
