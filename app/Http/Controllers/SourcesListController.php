<?php
/*
* Контроллер, который отображает страницу показателей
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Infosource;

class SourcesListController extends Controller
{
    //

    /*
    * Отображает список показателей
    */
    public function show(){

        $infosources = Infosource::all(); // Получаем данные об Источниках

        
        $infosources = 
            DB::table('infosources')
                ->join('frequency_units', 'infosources.max_frequency', '=', 'frequency_units.slug')
                ->join('geography_units', 'infosources.max_geographic_unit', '=', 'geography_units.slug')
                ->select('infosources.*', 'frequency_units.name_ru AS frequency_unit_name', 'geography_units.name_ru AS geography_unit_name')
                ->get();
        

        return view('sources_list.sources_index', ['infosources' => $infosources]);

    }
}
