<?php

namespace App\Http\Controllers;

use App\Models\ChecksheetTreatment;
use App\Models\ChecksheetTreatmentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecksheetTreatmentDetailController extends Controller
{
    // Menampilkan semua User
    public function index($checksheetTreatmentId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $checksheetTreatmentListDetail = ChecksheetTreatmentDetail::where('checksheet_treatment_id', $checksheetTreatmentId)->orderBy('id', 'ASC');
        $data = [
            'title'                         => 'Detail Checksheet Treatment',
            'checksheetTreetment'           => ChecksheetTreatment::find($checksheetTreatmentId),
            'checksheetTreatmentDetailList' => $checksheetTreatmentListDetail->get(),
            'user'                          => User::find(Session()->get('id_user'))
        ];
        return view('checksheetTreatmentDetail.index', $data);
    }
}
