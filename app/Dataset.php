<?php

namespace App;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Support\Facades\DB;

class Dataset extends Model
{
    protected $table = 'data';

    public static function getDataGroupedByYears($id)
    {
        $id = (int)$id;
        $sql = 'SELECT SUM(`value`) AS `value`, YEAR(`date`) AS `label` FROM `data` WHERE `indicator_id` = ? GROUP BY YEAR(`date`) ORDER BY `date` ASC;';
        $result = DB::select($sql, [$id]);
        foreach ($result as $key => $value) {
            $result[$key]->label = (int)$value->label;
            $result[$key]->value = (float)$value->value;
        }
        return $result;
    }
}
