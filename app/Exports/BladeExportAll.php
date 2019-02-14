<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Illuminate\Support\Facades\DB;

use App\Indicator;

class BladeExportAll implements FromView, ShouldAutoSize
{

  public function view(): View
  {

    $export_dataset = 
    DB::table('data')
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
}
