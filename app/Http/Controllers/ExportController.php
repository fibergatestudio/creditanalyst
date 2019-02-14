<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

use App\Indicator;

use App\Exports\BladeExport;
use App\Exports\BladeExportAll;

class ExportController extends Controller
{

    function view_export_page($indicator_id)
    {

        // $indicators = DB::table('indicators')
        //     ->join('geography_units', 'indicators.geography_unit', '=', 'geography_units.slug')
        //     ->join('frequency_units', 'indicators.frequency', '=', 'frequency_units.slug')
        //     ->join('measurement_units', 'indicators.measurement_unit', '=', 'measurement_units.slug')
        //     ->select('indicators.*', 'geography_units.name_ru AS geography_unit_name','frequency_units.name_ru AS frequency_unit_name','measurement_units.name_ru AS measurement_unit_name')
        //     ->get();
        $export_dataset = 
        DB::table('data')
            ->where('indicator_id', '=', $indicator_id)
            ->join('koatuu', 'data.geography', '=', 'koatuu.unique_koatuu_id')
            ->join('indicators', 'data.indicator_id', '=', 'indicators.id')
            ->join('geography_units', 'indicators.geography_unit', '=', 'geography_units.slug')
            ->join('frequency_units', 'indicators.frequency', '=', 'frequency_units.slug')
            ->join('measurement_units', 'indicators.measurement_unit', '=', 'measurement_units.slug')
            ->select('data.*', 
                'koatuu.name_ru AS koatuu_name', 
                'indicators.id AS indicator_id', 
                'geography_units.name_ru AS geography_unit_name',
                'frequency_units.name_ru AS frequency_unit_name',
                'measurement_units.name_ru AS measurement_unit_name',
                'indicators.name_ru AS indicator_name' 
                    )
            ->orderBy('data.date', 'desc')
            ->get();

        return view('exports.xml', 
        [
            'export_dataset' => $export_dataset
        ]);
    }
    //Экспорт данных по показателю
    public function export($infosource_id)
    {
        return Excel::download(new BladeExport($infosource_id), 'export.xlsx');
        
        //return Excel::download(new UsersExport, 'users.xlsx');
    }
    //Экспорт всех данных
    public function export_all()
    {
        return Excel::download(new BladeExportAll(), 'exportall.xlsx'); 
    }
}
