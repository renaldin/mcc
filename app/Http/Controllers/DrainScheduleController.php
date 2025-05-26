<?php

namespace App\Http\Controllers;

use App\Models\DrainSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrainScheduleController extends Controller
{
    
    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $drainScheduleList = DrainSchedule::orderBy('id', 'DESC');
        $data = [
            'title'             => 'Kelola Jadwal Pengurasan',
            'drainScheduleList' => $drainScheduleList->get(),
            'user'              => User::find(Session()->get('id_user'))
        ];
        return view('drainSchedule.index', $data);
    }

    public function detail($drainScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Detail Jadwal Pengurasan',
            'detail'    => DrainSchedule::find($drainScheduleId),
            'form'      => 'Detail',
            'user'      => User::find(Session()->get('id_user'))
        ];
        return view('drainSchedule.form', $data);
    }

    public function store(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->tangki) {
            $data = [
                'title'         => 'Tambah Jadwal Pengurasan',
                'form'          => 'Tambah',
                'user'          => User::find(Session()->get('id_user'))
            ];
            return view('drainSchedule.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'tangki'        => 'required',
                    'date'          => 'required',
                    'start_hour'    => 'required',
                    'end_hour'      => 'required',
                ]);

                $drainSchedule = new DrainSchedule();
                $drainSchedule->tangki      = $request->tangki;
                $drainSchedule->date        = $request->date;
                $drainSchedule->status      = 'Belum Dilakukan';
                $drainSchedule->start_hour  = $request->start_hour;
                $drainSchedule->end_hour    = $request->end_hour;
                $drainSchedule->save();

                DB::commit();
                return redirect()->route('kelola-jadwal-pengurasan')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function update(Request $request, $drainScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->tangki) {
            $data = [
                'title'     => 'Edit Jadwal Pengurasan',
                'detail'    => DrainSchedule::find($drainScheduleId),
                'form'      => 'Edit',
                'user'      => User::find(Session()->get('id_user'))
            ];
            return view('drainSchedule.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'tangki'        => 'required',
                    'date'          => 'required',
                    'start_hour'    => 'required',
                    'end_hour'      => 'required',
                ]);

                $drainSchedule = DrainSchedule::find($drainScheduleId);
                $drainSchedule->tangki      = $request->tangki;
                $drainSchedule->date        = $request->date;
                $drainSchedule->start_hour  = $request->start_hour;
                $drainSchedule->end_hour    = $request->end_hour;
                $drainSchedule->save();

                DB::commit();
                return redirect()->route('kelola-jadwal-pengurasan')->with('success', 'Data berhasil diedit!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function delete($drainScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $drainSchedule = DrainSchedule::find($drainScheduleId);
        $drainSchedule->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function verify($drainScheduleId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $drainSchedule = DrainSchedule::find($drainScheduleId);
            $drainSchedule->status      = 'Sudah Dilakukan';
            $drainSchedule->save();

            DB::commit();
            return redirect()->route('kelola-jadwal-pengurasan')->with('success', 'Data berhasil diverifikasi!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', $th->getMessage());
        }
    }
}
