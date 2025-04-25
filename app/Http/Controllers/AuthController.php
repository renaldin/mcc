<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Route dashboard admin
            } elseif ($user->role === 'maintenance') {
                return redirect()->route('maintenance.dashboard'); // Route dashboard maintenance
            }
        }

        // Jika gagal, kembali dengan error
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout(); // Menghapus session login
        return redirect('/')->with('success', 'Anda berhasil logout'); // Redirect ke halaman utama
    }
}
