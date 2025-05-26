<?php

namespace App\Http\Controllers;

use App\Models\CalibrationSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalibrationScheduleController extends Controller
{
    
    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $calibrationScheduleList = CalibrationSchedule::orderBy('id', 'DESC');
        $data = [
            'title'                     => 'Kelola Jadwal Kalibrasi',
            'calibrationScheduleList'   => $calibrationScheduleList->get(),
            'user'                      => User::find(Session()->get('id_user'))
        ];
        return view('calibrationSchedule.index', $data);
    }

    public function detail($calibrationScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Detail Jadwal Kalibrasi',
            'detail'    => CalibrationSchedule::find($calibrationScheduleId),
            'form'      => 'Detail',
            'user'      => User::find(Session()->get('id_user'))
        ];
        return view('calibrationSchedule.form', $data);
    }

    public function store(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->tool) {
            $data = [
                'title'         => 'Tambah Jadwal Kalibrasi',
                'form'          => 'Tambah',
                'user'          => User::find(Session()->get('id_user'))
            ];
            return view('calibrationSchedule.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'tool'          => 'required',
                    'date'          => 'required',
                    'start_hour'    => 'required',
                    'end_hour'      => 'required',
                ]);

                $calibrationSchedule = new CalibrationSchedule();
                $calibrationSchedule->tool      = $request->tool;
                $calibrationSchedule->date      = $request->date;
                $calibrationSchedule->status    = 'Belum Dilakukan';
                $calibrationSchedule->start_hour    = $request->start_hour;
                $calibrationSchedule->end_hour      = $request->end_hour;
                $calibrationSchedule->save();

                DB::commit();
                return redirect()->route('kelola-jadwal-kalibrasi')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function update(Request $request, $calibrationScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->tool) {
            $data = [
                'title'     => 'Edit Jadwal Kalibrasi',
                'detail'    => CalibrationSchedule::find($calibrationScheduleId),
                'form'      => 'Edit',
                'user'      => User::find(Session()->get('id_user'))
            ];
            return view('calibrationSchedule.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'tool'          => 'required',
                    'date'          => 'required',
                    'start_hour'    => 'required',
                    'end_hour'      => 'required',
                ]);

                $calibrationSchedule = CalibrationSchedule::find($calibrationScheduleId);
                $calibrationSchedule->tool      = $request->tool;
                $calibrationSchedule->date      = $request->date;
                $calibrationSchedule->start_hour    = $request->start_hour;
                $calibrationSchedule->end_hour      = $request->end_hour;
                $calibrationSchedule->save();

                DB::commit();
                return redirect()->route('kelola-jadwal-kalibrasi')->with('success', 'Data berhasil diedit!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function delete($calibrationScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $calibrationSchedule = CalibrationSchedule::find($calibrationScheduleId);
        $calibrationSchedule->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function verify($calibrationScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $calibrationSchedule = CalibrationSchedule::find($calibrationScheduleId);
            $calibrationSchedule->status      = 'Sudah Dilakukan';
            $calibrationSchedule->save();

            DB::commit();
            return redirect()->route('kelola-jadwal-kalibrasi')->with('success', 'Data berhasil diverifikasi!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', $th->getMessage());
        }
    }
}
