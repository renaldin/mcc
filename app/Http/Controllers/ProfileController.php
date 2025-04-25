<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function index()
    {
        // Pastikan pengguna sudah login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        // Menampilkan halaman profil dengan data user
        return view('auth.profile', compact('user'));
    }

    // Mengupdate data profil
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        if ($user->save()) {
            // Refresh data pengguna
            Auth::setUser($user); // Pastikan data yang ditampilkan di halaman diperbarui

            // Berikan pesan sukses
            return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
        } else {
            // Log untuk debug jika gagal menyimpan
            Log::info('Data sebelum disimpan:', $user->getAttributes());

            // Berikan pesan error
            return back()->withErrors('Terjadi kesalahan saat memperbarui profil.');
        }
    }
}
