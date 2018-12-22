<?php
/*
* Контроллер, который отображает страницу для сохранения карты
*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class MapForSaveController extends AdminController
{
    /*
    * Отображает карту для сохранения
    */
    public function show(){

        return view('map_for_save', ['indicators_obj' => $this->indicators_obj(), 'indicators_name' => $this->get_arr_name_indicators(), 'months' => $this->months, 'years' => $this->years, 'data_obj' => $this->data_obj(), 'files_charts' => $this->files_charts(), 'files_charts_full' => $this->files_charts_full()]);
    }
}
