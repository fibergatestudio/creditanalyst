<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Notification;
use App\Dataset;
use App\Indicator;

class NotificationsController extends Controller
{
    public function show_notifications(){
        $user_id = Auth::id();

        $notifications =
            DB::table('notifications')
                ->where('user_id', '=', $user_id)
                ->join('data', 'notifications.dataset_entry_id', '=', 'data.id')
                ->join('indicators', 'data.indicator_id', '=', 'indicators.id')
                ->join('koatuu', 'data.geography', '=', 'koatuu.unique_koatuu_id')
                ->join('measurement_units', 'indicators.measurement_unit', '=', 'measurement_units.slug')
                ->select(
                    'notifications.*',
                    'koatuu.name_ru AS koatuu_name',
                    'data.value AS data_value',
                    'measurement_units.name_ru AS measurement_unit_name',
                    'data.date AS period_start_date',
                    'indicators.name AS indicator_name'
                )
                ->orderBy('notifications.created_at', 'desc')
                ->get();
        
        return view('notifications.notifications_index',
            [
                'notifications' => $notifications
            ]
        );
    }
}
