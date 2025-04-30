<?php

namespace App\Http\Controllers;

use App\Models\CalibrationSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarCalibrationScheduleController extends Controller
{
    
    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $colors = [
            '#f56954', // red
            '#f39c12', // yellow
            '#0073b7', // blue
            '#00c0ef', // aqua
            '#00a65a', // green
            '#3c8dbc', // light blue
            '#d81b60', // pink
        ];
        
        $calibrationScheduleList = CalibrationSchedule::orderBy('id', 'DESC')->get();
        $dataCalendar = [];
        foreach($calibrationScheduleList as $item) {
            $randomColor = $colors[array_rand($colors)];
            $event = [
                'title'           => $item->tool,
                'start'           => $item->date,
                'backgroundColor' => $randomColor,
                'borderColor'     => $randomColor,
                'allDay'          => true
            ];
        
            $dataCalendar[] = $event;
        }
        $data = [
            'title'                     => 'Kalender Jadwal Kalibrasi',
            'dataCalendar'              => $dataCalendar,
            'user'                      => User::find(Session()->get('id_user'))
        ];
        return view('calendarCalibrationSchedule.index', $data);
    }
}
