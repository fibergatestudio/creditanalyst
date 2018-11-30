<?php
/*
* Контроллер, который отображает страницу показателей
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Infosource;

class SourcesListController extends Controller
{
    //

    /*
    * Отображает список показателей
    */
    public function show(){

        $infosources = Infosource::all(); // Получаем данные об Источниках
        return view('sources_list.sources_index', ['infosources' => $infosources]);

    }
}
