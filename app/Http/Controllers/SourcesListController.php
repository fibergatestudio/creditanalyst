<?php
/*
* Контроллер, который отображает страницу показателей
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


        $curent_language = Auth::user()->preferred_language;
        if($curent_language == 'ru'){
            $language = 'name_ru';
        }
        else if($curent_language == 'en'){
            $language = 'name_en';
        }
        else if($curent_language == 'ua'){
            $language = 'name_ua';
        }

        $infosources = 
            DB::table('infosources')
                ->join('frequency_units', 'infosources.max_frequency', '=', 'frequency_units.slug')
                ->join('geography_units', 'infosources.max_geographic_unit', '=', 'geography_units.slug')
                ->select('infosources.*', 'frequency_units.'.$language.' AS frequency_unit_name', 'geography_units.'.$language.' AS geography_unit_name')
                ->paginate(10);
        

        foreach($infosources as $infosource){
            // Переделываем в eloquent

            // Берём соответствующий eloquent объект
            $infosource_eloquent = Infosource::find($infosource->id);

            // И для объекта, который уходит во вьюху, создаём новые свойства (в данном случае localized_name, в который из элоквента подтягиваем нужные данные)
            $infosource->localized_name = $infosource_eloquent->language_name();
            
        }

        foreach ($infosources as $infosource) {
            $infosource_eloquent = Infosource::find($infosource->id);

            $infosource->localized_description = $infosource_eloquent->language_description();            
        }

        foreach ($infosources as $infosource) {
            $infosource_eloquent = Infosource::find($infosource->id);

            $infosource->localized_procurer = $infosource_eloquent->language_procurer();
        }

        return view('sources_list.sources_index', ['infosources' => $infosources, 'active_sidebar_name' => 'sources']);

    }
}
