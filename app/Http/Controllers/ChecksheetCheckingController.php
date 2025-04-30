<?php

namespace App\Http\Controllers;

use App\Models\ChecksheetChecking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecksheetCheckingController extends Controller
{
    
    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $checksheetCheckingList = ChecksheetChecking::orderBy('id', 'DESC');
        $data = [
            'title'                     => 'Kelola Checksheet Pengecheckan',
            'checksheetCheckingList'    => $checksheetCheckingList->get(),
            'user'                      => User::find(Session()->get('id_user'))
        ];
        return view('checksheetChecking.index', $data);
    }

    public function store(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->date) {
            $data = [
                'title'         => 'Tambah Checksheet Pengecheckan',
                'form'          => 'Tambah',
                'user'          => User::find(Session()->get('id_user'))
            ];
            return view('checksheetChecking.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'part_name'     => 'required',
                    'date'          => 'required',
                    'air_pocket'    => 'required',
                    'gumpal'        => 'required',
                    'bercak'        => 'required',
                    'tipis'         => 'required',
                    'meler'         => 'required',
                    'tunggu_repair' => 'required',
                    'total_check'   => 'required',
                ]);

                $checksheetChecking = new ChecksheetChecking();
                $checksheetChecking->part_name      = $request->part_name;
                $checksheetChecking->date           = $request->date;
                $checksheetChecking->air_pocket     = $request->air_pocket;
                $checksheetChecking->gumpal         = $request->gumpal;
                $checksheetChecking->bercak         = $request->bercak;
                $checksheetChecking->tipis          = $request->tipis;
                $checksheetChecking->meler          = $request->meler;
                $checksheetChecking->tunggu_repair  = $request->tunggu_repair;
                $checksheetChecking->total_check    = $request->total_check;
                $checksheetChecking->save();

                DB::commit();
                return redirect()->route('kelola-checksheet-pengecheckan')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function update(Request $request, $checksheetCheckingId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->date) {
            $data = [
                'title'     => 'Edit Checksheet Pengecheckan',
                'detail'    => ChecksheetChecking::find($checksheetCheckingId),
                'form'      => 'Edit',
                'user'      => User::find(Session()->get('id_user'))
            ];
            return view('checksheetChecking.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'part_name'     => 'required',
                    'date'          => 'required',
                    'air_pocket'    => 'required',
                    'gumpal'        => 'required',
                    'bercak'        => 'required',
                    'tipis'         => 'required',
                    'meler'         => 'required',
                    'tunggu_repair' => 'required',
                    'total_check'   => 'required',
                ]);

                $checksheetChecking = ChecksheetChecking::find($checksheetCheckingId);
                $checksheetChecking->part_name      = $request->part_name;
                $checksheetChecking->date           = $request->date;
                $checksheetChecking->air_pocket     = $request->air_pocket;
                $checksheetChecking->gumpal         = $request->gumpal;
                $checksheetChecking->bercak         = $request->bercak;
                $checksheetChecking->tipis          = $request->tipis;
                $checksheetChecking->meler          = $request->meler;
                $checksheetChecking->tunggu_repair  = $request->tunggu_repair;
                $checksheetChecking->total_check    = $request->total_check;
                $checksheetChecking->save();

                DB::commit();
                return redirect()->route('kelola-checksheet-pengecheckan')->with('success', 'Data berhasil diedit!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function delete($checksheetCheckingId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $checksheetChecking = ChecksheetChecking::find($checksheetCheckingId);
        $checksheetChecking->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
