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
                    'status'        => 'required',
                ]);

                $drainSchedule = new DrainSchedule();
                $drainSchedule->tangki      = $request->tangki;
                $drainSchedule->date      = $request->date;
                $drainSchedule->status    = $request->status;
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
                    'status'        => 'required',
                ]);

                $drainSchedule = DrainSchedule::find($drainScheduleId);
                $drainSchedule->tangki      = $request->tangki;
                $drainSchedule->date      = $request->date;
                $drainSchedule->status    = $request->status;
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
}
