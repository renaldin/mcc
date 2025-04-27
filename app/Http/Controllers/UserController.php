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

        if(!$request->name) {
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
                    return back()->with('fail', 'User dengan email '.$request->email.' sudah ada!');
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

        if(!$request->name) {
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
}
