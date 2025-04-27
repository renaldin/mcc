<?php

namespace App\Http\Controllers;

use App\Models\JadwalKalibrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalKalibrasiController extends Controller
{
    // Menampilkan semua jadwal kalibrasi
    public function index()
    {
        $jadwalKalibrasi = JadwalKalibrasi::orderBy('title', 'ASC');
        $data = [
            'title'             => 'Kelola Jadwal Kalibrasi',
            'jadwalKalibrasi'   => $jadwalKalibrasi->get()
        ];
        return view('jadwalKalibrasi.index', $data);
    }

    public function store(Request $request)
    {
        if(!$request->title) {
            $data = [
                'title'     => 'Kelola Jadwal Kalibrasi',
                'subTitle'  => 'Tambah Jadwal Kalibrasi',
                'form'      => 'Tambah'
            ];
            return view('jadwalKalibrasi.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'title' => 'required|string',
                    'start' => 'required|date',
                    'end' => 'nullable|date',
                ]);

                $jadwalKalibrasi = new JadwalKalibrasi();
                $jadwalKalibrasi->title         = $request->title;
                $jadwalKalibrasi->start         = $request->start;
                $jadwalKalibrasi->end           = $request->end;
                $jadwalKalibrasi->save();

                DB::commit();
                return redirect()->route('kelola-jadwal-kalibrasi')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function update(Request $request, $jadwalKalibrasiId)
    {
        if(!$request->title) {
            $data = [
                'title'     => 'Kelola Jadwal Kalibrasi',
                'subTitle'  => 'Edit Jadwal Kalibrasi',
                'detail'    => JadwalKalibrasi::find($jadwalKalibrasiId),
                'form'      => 'Edit'
            ];
            return view('jadwalKalibrasi.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'title' => 'required|string',
                    'start' => 'required|date',
                    'end' => 'nullable|date',
                ]);

                $jadwalKalibrasi = JadwalKalibrasi::find($jadwalKalibrasiId);
                $jadwalKalibrasi->title         = $request->title;
                $jadwalKalibrasi->start         = $request->start;
                $jadwalKalibrasi->end           = $request->end;
                $jadwalKalibrasi->save();

                DB::commit();
                return redirect()->route('kelola-jadwal-kalibrasi')->with('success', 'Data berhasil diedit!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function delete($jadwalKalibrasiId)
    {
        $jadwalKalibrasi = JadwalKalibrasi::find($jadwalKalibrasiId);
        $jadwalKalibrasi->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
