<?php

namespace App\Http\Controllers;

use App\Models\JadwalKalibrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua User
    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $userList = User::orderBy('id', 'DESC');
        $data = [
            'title'     => 'Kelola User',
            'userList'  => $userList->get(),
            'user'      => User::find(Session()->get('id_user'))
        ];
        return view('user.index', $data);
    }

    public function store(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if (!$request->name) {
            $data = [
                'title'     => 'Kelola User',
                'subTitle'  => 'Tambah User',
                'form'      => 'Tambah',
                'user'      => User::find(Session()->get('id_user'))
            ];
            return view('user.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'name'      => 'required',
                    'email'     => 'required',
                    'phone'     => 'required',
                    'password'  => 'required',
                    'role'      => 'required',
                    'status' => 'required',
                ]);

                $userCheck = User::where('email', $request->email)->first();
                if ($userCheck) {
                    DB::rollBack();
                    return back()->with('fail', 'User dengan email ' . $request->email . ' sudah ada!');
                }

                $user = new User();
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->phone        = $request->phone;
                $user->password     = Hash::make($request->password);
                $user->status    = $request->status;
                $user->role         = $request->role;
                $user->save();

                DB::commit();
                return redirect()->route('kelola-user')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function update(Request $request, $userId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if (!$request->name) {
            $data = [
                'title'     => 'Kelola User',
                'subTitle'  => 'Edit User',
                'detail'    => User::find($userId),
                'form'      => 'Edit',
                'user'      => User::find(Session()->get('id_user'))
            ];
            return view('user.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'name'      => 'required',
                    'email'     => 'required',
                    'phone'     => 'required',
                    'role'      => 'required',
                    'status' => 'required',
                ]);

                $user = User::find($userId);
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->phone        = $request->phone;
                if ($request->password) {
                    $user->password     = Hash::make($request->password);
                }
                $user->status    = $request->status;
                $user->role         = $request->role;
                $user->save();

                DB::commit();
                return redirect()->route('kelola-user')->with('success', 'Data berhasil diedit!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function delete($userId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $user = User::find($userId);
        $user->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function profileQC()
    {
        // Pastikan role adalah 'Quality Control'
        if (!session()->get('role') || session()->get('role') !== 'QC') {
            return redirect()->route('login');
        }

        $user = User::find(session()->get('id_user'));  // Ambil data user berdasarkan session

        return view('user.profile_qc', [
            'title' => 'Profil Quality Control',
            'user' => $user
        ]);
    }

    // Update profil QC
    public function updateProfileQC(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'nullable|min:6|confirmed', // password opsional, tapi jika ada harus valid
        ]);

        // Ambil data user yang login
        $user = User::find(session()->get('id_user'));

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Jika password diubah, update password
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Simpan perubahan ke database

        return redirect()->route('profile.qc')->with('success', 'Profil berhasil diperbarui!');
    }

    public function profileMaintenance()
    {
        if (!session()->get('role') || session()->get('role') !== 'Maintenance') {
            return redirect()->route('login');
        }

        $user = User::find(session()->get('id_user'));

        return view('user.profile_maintenance', [
            'title' => 'Profil Maintenance',
            'user' => $user
        ]);
    }

    // Update profil Maintenance
    public function updateProfileMaintenance(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::find(session()->get('id_user'));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.maintenance')->with('success', 'Profil berhasil diperbarui!');
    }
}
