<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Exports\InvoicesExport;

class ImportController extends Controller
{
    public function import_test_data(){
        $debug = false;

        /*
        * Проверка на то, вызывался ли уже импорт
        */

        $test_data_dump = DB::table('infosources')->get();
        if($test_data_dump->count() > 0){
            die('Импорт уже был произведён. Чтобы провести импорт ещё раз, обновите базу с помощь php artisan migrate:refresh в комадной строке, и потом запустите импорт.');
        }

        /*
        * Начало импорта
        */

        $array = Excel::toArray(new DataImport, 'creditanalyst.xlsx');

        // Берём первую страницу - infosources (источники)
        $first_page = $array[0];

        // Перебираем все показатели
        $data_to_import = [];
        foreach($first_page as $first_page_row){
            // Если это не первая строка
            if($first_page_row[0] != 'id' && !empty($first_page_row[0])){
                // То набираем данные для импорта
                $data_to_import[] = [
                    'id' => $first_page_row[0],
                    'name' => $first_page_row[1],
                    'procurer' => $first_page_row[2],
                    'description' => $first_page_row[3],
                    'max_frequency' => $first_page_row[4],
                    'max_geographic_unit' => $first_page_row[5]
                ];
            }
        }
        
        if($debug == false){
            DB::table('infosources')->insert($data_to_import);
        }

        /*
        * Вторая страница - indicators (показатели)
        */
        $indicators_page = $array[1];
        $indicators_data_to_import = [];
        foreach($indicators_page as $indicator){
            // Если это не первая строка и не пустая
            if($indicator[0] != 'id' && !empty($indicator[0])){
                $indicator_data_to_import[] = [
                    'id' => $indicator[0],
                    'name' => $indicator[1],
                    'frequency' => $indicator[2],
                    'geography_unit' => $indicator[3],
                    'measurement_unit' => $indicator[4],
                    'source_id' => $indicator[5]
                ];
            }
        }

        if($debug == false){
            DB::table('indicators')->insert($indicator_data_to_import);
        }

        /*
        * Третья страница - data (данные)
        */
        $data_page = $array[2];
        $data_data_to_import = [];
        $id = 1; // ID строки
        foreach($data_page as $data_entry){
            // Если это не первая строка и не пустая
            if($data_entry[0] != 'id' && !empty($data_entry[1])){
                // Перевод даты из формата MM.DD.YYYY в YYYY.DD.MM
                $raw_date = $data_entry[1];
                $UNIX_DATE = ($raw_date - 25569) * 86400;
                $new_date = gmdate("Y-m-d", $UNIX_DATE);

                $data_data_to_import[] = [
                    'id' => $id,
                    'date' => $new_date,
                    'geography' => $data_entry[2],
                    'value' => floatval(str_replace(',', '.', $data_entry[3])),
                    'indicator_id' => $data_entry[4]
                ];
                $id += 1;
            } // end if
        } // end foreach
        

        if($debug == false){        
            DB::table('data')->insert($data_data_to_import);
        }

        /*
        * Четвёртая страница - koatuu (географические единицы)
        */

        $koatuu_page = $array[3];
        $koatuu_to_import = [];
        foreach($koatuu_page as $koatuu_entry){
            if($koatuu_entry[0] != 'id' && !empty($koatuu_entry[1])){
                $koatuu_to_import[] = [
                    'id' => $koatuu_entry[0],
                    'unique_koatuu_id' => $koatuu_entry[1],
                    'name_en' => $koatuu_entry[2],
                    'name_ua' => $koatuu_entry[3],
                    'name_ru' => $koatuu_entry[4]
                ];
            } // end if
        } // end foreach

        if($debug == false){
            DB::table('koatuu')->insert($koatuu_to_import);
        }

        /*
        * Пятая страница - freqency_units
        */
        $frequency_units = $array[4];
        $frequency_units_to_import = [];
        foreach($frequency_units as $frequency_unit_entry){
            if($frequency_unit_entry[0] != 'id' && !empty($frequency_unit_entry[1])){
                $frequency_units_to_import[] = [
                    'id' => $frequency_unit_entry[0],
                    'slug' => $frequency_unit_entry[1],
                    'name_en' => $frequency_unit_entry[2],
                    'name_ua' => $frequency_unit_entry[3],
                    'name_ru' => $frequency_unit_entry[4]
                ];
            } // end if
        } //end foreach


        if($debug == false){
            DB::table('frequency_units')->insert($frequency_units_to_import);
        }

        /*
        * Шестая страница - geography_units
        */

        $geography_units = $array[5];
        $geography_units_to_import = [];
        foreach($geography_units as $geography_unit_entry){
            if($geography_unit_entry[0] != 'id' && !empty($geography_unit_entry[1])){
                $geography_units_to_import[] = [
                    'id' => $geography_unit_entry[0],
                    'slug' => $geography_unit_entry[1],
                    'name_en' => $geography_unit_entry[2],
                    'name_ua' => $geography_unit_entry[3],
                    'name_ru' => $geography_unit_entry[4]
                ];
            } // end if
        } //end foreach

        if($debug == false){
            DB::table('geography_units')->insert($geography_units_to_import);
        }

        /*
        * Седьмая страница - measurement_units
        */

        $measurement_units = $array[6];
        $measurement_units_to_import = [];
        foreach($measurement_units as $measurement_unit_entry){
            if($measurement_unit_entry[0] != 'id' && !empty($measurement_unit_entry[1])){
                $measurement_units_to_import[] = [
                    'id' => $measurement_unit_entry[0],
                    'slug' => $measurement_unit_entry[1],
                    'name_en' => $measurement_unit_entry[2],
                    'name_ua' => $measurement_unit_entry[3],
                    'name_ru' => $measurement_unit_entry[4]
                ];
            } // end if
        } //end foreach


        if($debug == false){
            DB::table('measurement_units')->insert($measurement_units_to_import);
        }

    }

    public function export_to_exel($infosource_id){

        // Excel::create('Filename', function($excel) {

        // })->export('xls');

        //return Excel::download(new UsersExport, 'users.xlsx');
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
        //return (new UsersExport(2018))->download('invoices.xlsx');
    }

    public function export() 
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }
}
