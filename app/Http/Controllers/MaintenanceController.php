<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MaintenanceController extends Controller
{
    // Dashboard dengan kalender
    public function index()
    {
        $schedules = Schedule::all();
        return view('Maintenance.dashboard', compact('schedules'));
    }

    // Form tambah jadwal
    public function create()
    {
        return view('Maintenance.create');
    }

    // Simpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'tank_name' => 'required|string|max:255',
            'scheduled_date' => 'required|date',
        ]);

        Schedule::create($request->all());
        return redirect()->route('Maintenance.dashboard')->with('success', 'Jadwal pengurasan berhasil dibuat!');
    }

    // Form edit jadwal
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('Maintenance.edit', compact('schedule'));
    }

    // Update jadwal
    public function update(Request $request, $id)
    {
        $request->validate([
            'tank_name' => 'required|string|max:255',
            'scheduled_date' => 'required|date',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        return redirect()->route('Maintenance.dashboard')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Verifikasi pengurasan
    public function verify($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update(['is_verified' => true]);
        return redirect()->route('Maintenance.dashboard')->with('success', 'Jadwal berhasil diverifikasi!');
    }

    // Cek notifikasi
    public function notify()
    {
        $today = Carbon::today();
        $notifications = Schedule::where('scheduled_date', $today)->get();
        return view('Maintenance.notifications', compact('notifications'));
    }
}
