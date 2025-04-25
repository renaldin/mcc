<?php

namespace App\Http\Controllers;

use App\Models\JadwalKalibrasi;
use Illuminate\Http\Request;

class JadwalKalibrasiController extends Controller
{
    // Menampilkan semua jadwal kalibrasi
    public function index()
    {
        $jadwal = JadwalKalibrasi::all();
        return view('JadwalKalibrasi', compact('jadwal'));
    }

    // Menyimpan jadwal baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
        ]);

        // Gunakan model yang benar
        $jadwal = new JadwalKalibrasi();
        $jadwal->title = $request->title;
        $jadwal->start = $request->start;
        $jadwal->end = $request->end ?? $request->start; // default end = start jika null
        $jadwal->save();

        // Kembalikan data ke frontend agar bisa langsung dimasukkan ke kalender
        return response()->json([
            'id' => $jadwal->id,
            'title' => $jadwal->title,
            'start' => $jadwal->start,
            'end' => $jadwal->end,
        ]);
    }
    // Fungsi untuk memperbarui jadwal yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
        ]);

        // Cari jadwal berdasarkan ID
        $jadwal = JadwalKalibrasi::find($id);

        // Jika jadwal tidak ditemukan
        if (!$jadwal) {
            return response()->json(['error' => 'Jadwal tidak ditemukan'], 404);
        }

        // Perbarui data jadwal
        $jadwal->title = $request->title;
        $jadwal->start = $request->start;
        $jadwal->end = $request->end;
        $jadwal->save();

        // Kembalikan response dalam format JSON
        return response()->json($jadwal);
    }
}
