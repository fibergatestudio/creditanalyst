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

    public static function getDeltaByIndicator($indicator_id, $frequency)
    {
        $delta = [
            'number'  => 0,
            'percent' => 0
        ];
        $indicator_id = (int)$indicator_id;
        //$sql = 'SELECT AVG(`value`) as `avg`, MONTH(`date`), YEAR(`date`) FROM `data` WHERE `indicator_id` = ?';
        $sql = 'SELECT AVG(`value`) as `avg` FROM `data` WHERE `indicator_id` = ?';
        switch ($frequency) {
            case 'D':
                $sql.=' GROUP BY DAY(`date`), MONTH(`date`), YEAR(`date`)';
                break;
            case 'M':
                $sql.=' GROUP BY MONTH(`date`), YEAR(`date`)';
                break;
            case 'Q':
                $sql.=' GROUP BY QUARTER(`date`)';
                break;
            case 'Y':
                $sql.=' GROUP BY YEAR(`date`)';
                break;
        }
        $sql .= ' ORDER BY `date` DESC LIMIT 2';
        $result = DB::select($sql, [$indicator_id]);
        if (is_array($result) && count($result) == 2) {
            $delta = [
                'number'  => round(($result[0]->avg - $result[1]->avg), 2),
                'percent' => round(((1 - $result[1]->avg / $result[0]->avg) * 100), 2)
            ];
        }
        return $delta;
    }
}
