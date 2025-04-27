<?php

namespace App\Http\Controllers;

use App\Models\JadwalKalibrasi;

class LihatJadwalKalibrasiController extends Controller
{
    // Menampilkan semua jadwal kalibrasi
    public function index()
    {
        $jadwalKalibrasi = JadwalKalibrasi::orderBy('title', 'ASC');
        $data = [
            'title'             => 'Lihat Jadwal Kalibrasi',
            'jadwalKalibrasi'   => $jadwalKalibrasi->get()
        ];
        return view('lihatJadwalKalibrasi.index', $data);
    }
}
