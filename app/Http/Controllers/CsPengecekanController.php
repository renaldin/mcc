<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsPengecekan;

class CsPengecekanController extends Controller
{
    public function index()
    {
        $data = CsPengecekan::all();
        return view('cs_pengecekan.index', compact('data'));
    }

    public function create()
    {
        return view('cs_pengecekan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_part' => 'required|string',
            'air_pocket' => 'required|integer',
            'gumpal' => 'nullable|integer',
            'bercak' => 'nullable|integer',
            'tipis' => 'nullable|integer',
            'meler' => 'nullable|integer',
            'tunggu_repair' => 'required|integer',
            'total_check' => 'required|integer',
        ]);

        CsPengecekan::create($request->all());

        return redirect()->route('cs_pengecekan.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
