<?php

namespace App\Http\Controllers;

use App\Models\ChecksheetTreatment;
use App\Models\ChecksheetTreatmentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecksheetTreatmentController extends Controller
{
    // Menampilkan semua User
    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $checksheetTreatmentList = ChecksheetTreatment::orderBy('id', 'DESC');
        $data = [
            'title'                     => 'Kelola Checksheet Treatment',
            'checksheetTreatmentList'   => $checksheetTreatmentList->get(),
            'user'                      => User::find(Session()->get('id_user'))
        ];
        return view('checksheetTreatment.index', $data);
    }

    public function store(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->date) {
            $data = [
                'title'         => 'Tambah Checksheet Treatment',
                'form'          => 'Tambah',
                'document_no'   => 'C.04/01/08/QC/MCC-2024',
                'user'          => User::find(Session()->get('id_user'))
            ];
            return view('checksheetTreatment.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'date'          => 'required',
                    'document_no'   => 'required',
                ]);

                $checksheetTreatment = new ChecksheetTreatment();
                $checksheetTreatment->date         = $request->date;
                $checksheetTreatment->document_no  = $request->document_no;
                $checksheetTreatment->save();

                $detail_1 = new ChecksheetTreatmentDetail();
                $detail_1->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_1->process                    = 'Degreasing';
                $detail_1->parameter                  = 'Water Temperature';
                $detail_1->standard                   = '45 ~ 55 °C';
                $detail_1->tools                      = 'Temperatur meter';
                $detail_1->save();
                
                $detail_2 = new ChecksheetTreatmentDetail();
                $detail_2->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_2->process                    = 'Degreasing';
                $detail_2->parameter                  = 'Total Alkali';
                $detail_2->standard                   = '35 ~ 40 point';
                $detail_2->tools                      = 'Elemeyer,pippet volume,phenolpthalein Ind.(PP),Solution 02';
                $detail_2->save();

                $detail_3 = new ChecksheetTreatmentDetail();
                $detail_3->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_3->process                    = 'Water Rinse';
                $detail_3->parameter                  = 'pH (supply)';
                $detail_3->standard                   = '7 ~ 9';
                $detail_3->tools                      = 'PH Meter';
                $detail_3->save();

                $detail_4 = new ChecksheetTreatmentDetail();
                $detail_4->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_4->process                    = 'Water Rinse';
                $detail_4->parameter                  = 'Contamination';
                $detail_4->standard                   = '6 point';
                $detail_4->tools                      = 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 02';
                $detail_4->save();

                $detail_5 = new ChecksheetTreatmentDetail();
                $detail_5->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_5->process                    = 'Surfacing';
                $detail_5->parameter                  = 'Ph';
                $detail_5->standard                   = '8 ~ 10';
                $detail_5->tools                      = 'PH Meter';
                $detail_5->save();

                $detail_6 = new ChecksheetTreatmentDetail();
                $detail_6->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_6->process                    = 'Phosphating';
                $detail_6->parameter                  = 'Ph';
                $detail_6->standard                   = '2 ~ 4';
                $detail_6->tools                      = 'PH Meter';
                $detail_6->save();

                $detail_7 = new ChecksheetTreatmentDetail();
                $detail_7->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_7->process                    = 'Phosphating';
                $detail_7->parameter                  = 'Total Acid (TA)';
                $detail_7->standard                   = '30 ~ 32 point';
                $detail_7->tools                      = 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 01';
                $detail_7->save();

                $detail_8 = new ChecksheetTreatmentDetail();
                $detail_8->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_8->process                    = 'Phosphating';
                $detail_8->parameter                  = 'Accelerator (AC)';
                $detail_8->standard                   = '1 ~ 3 point';
                $detail_8->tools                      = 'Elemeyer,pippet volume,Bromophenol Blue Ind. (BPB),Solution 01';
                $detail_8->save();

                $detail_9 = new ChecksheetTreatmentDetail();
                $detail_9->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_9->process                    = 'Phosphating';
                $detail_9->parameter                  = 'Accelerator (AC)';
                $detail_9->standard                   = '6 ~ 8 point';
                $detail_9->tools                      = 'Saccarometer,Titre Powder (sulfamic acid)';
                $detail_9->save();

                $detail_10 = new ChecksheetTreatmentDetail();
                $detail_10->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_10->process                    = 'Phosphating rinse 1';
                $detail_10->parameter                  = 'pH (supply)';
                $detail_10->standard                   = '5 ~ 7';
                $detail_10->tools                      = 'PH Meter';
                $detail_10->save();

                $detail_11 = new ChecksheetTreatmentDetail();
                $detail_11->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_11->process                    = 'Phosphating rinse 1';
                $detail_11->parameter                  = 'Contamination';
                $detail_11->standard                   = '< 6 point';
                $detail_11->tools                      = 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 01';
                $detail_11->save();

                $detail_12 = new ChecksheetTreatmentDetail();
                $detail_12->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_12->process                    = 'Phosphating rinse 2';
                $detail_12->parameter                  = 'pH (supply)';
                $detail_12->standard                   = '5 ~ 7';
                $detail_12->tools                      = 'PH Meter';
                $detail_12->save();

                $detail_13 = new ChecksheetTreatmentDetail();
                $detail_13->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_13->process                    = 'Phosphating rinse 2';
                $detail_13->parameter                  = 'Contamination';
                $detail_13->standard                   = '< 6 point';
                $detail_13->tools                      = 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 01';
                $detail_13->save();

                $detail_14 = new ChecksheetTreatmentDetail();
                $detail_14->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_14->process                    = 'CED Painting';
                $detail_14->parameter                  = 'Water temperature (Start process)';
                $detail_14->standard                   = '27 ~ 30° C';
                $detail_14->tools                      = 'Temperatur meter';
                $detail_14->save();

                $detail_15 = new ChecksheetTreatmentDetail();
                $detail_15->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_15->process                    = 'CED Painting';
                $detail_15->parameter                  = 'Viscosity';
                $detail_15->standard                   = 'Min 1,003 g/cm³';
                $detail_15->tools                      = 'Hydrometer';
                $detail_15->save();

                $detail_16 = new ChecksheetTreatmentDetail();
                $detail_16->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_16->process                    = 'CED Painting';
                $detail_16->parameter                  = 'Ph';
                $detail_16->standard                   = '5 ~ 7';
                $detail_16->tools                      = 'PH Meter';
                $detail_16->save();

                $detail_17 = new ChecksheetTreatmentDetail();
                $detail_17->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_17->process                    = 'Anolyte';
                $detail_17->parameter                  = 'Aliran air';
                $detail_17->standard                   = '400 ~ 700µs/cm';
                $detail_17->tools                      = 'El.conductivity mtr';
                $detail_17->save();

                $detail_18 = new ChecksheetTreatmentDetail();
                $detail_18->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_18->process                    = 'Anolyte';
                $detail_18->parameter                  = 'Aliran air';
                $detail_18->standard                   = 'o,5 ~ 1,5 lt/menit';
                $detail_18->tools                      = 'Baker glass,stop watch';
                $detail_18->save();

                $detail_19 = new ChecksheetTreatmentDetail();
                $detail_19->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_19->process                    = 'Anolyte';
                $detail_19->parameter                  = 'Ph';
                $detail_19->standard                   = 'o,5 ~ 1,5 lt/menit';
                $detail_19->tools                      = 'Baker glass,stop watch';
                $detail_19->save();

                $detail_20 = new ChecksheetTreatmentDetail();
                $detail_20->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_20->process                    = 'CED Rinse 01';
                $detail_20->parameter                  = 'Ph';
                $detail_20->standard                   = '5 ~ 7';
                $detail_20->tools                      = 'PH Meter';
                $detail_20->save();

                $detail_21 = new ChecksheetTreatmentDetail();
                $detail_21->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_21->process                    = 'CED Rinse 02';
                $detail_21->parameter                  = 'Ph';
                $detail_21->standard                   = '5 ~ 7';
                $detail_21->tools                      = 'PH Meter';
                $detail_21->save();

                $detail_22 = new ChecksheetTreatmentDetail();
                $detail_22->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_22->process                    = 'Oven';
                $detail_22->parameter                  = 'Oven temperature';
                $detail_22->standard                   = '180 ~ 200° C';
                $detail_22->tools                      = 'emperatur meter';
                $detail_22->save();

                $detail_23 = new ChecksheetTreatmentDetail();
                $detail_23->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_23->process                    = 'Oven';
                $detail_23->parameter                  = 'Menit ke';
                $detail_23->standard                   = '15';
                $detail_23->tools                      = 'emperatur meter';
                $detail_23->save();

                $detail_24 = new ChecksheetTreatmentDetail();
                $detail_24->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_24->process                    = 'Oven';
                $detail_24->parameter                  = 'Menit ke';
                $detail_24->standard                   = '45';
                $detail_24->tools                      = 'emperatur meter';
                $detail_24->save();

                $detail_25 = new ChecksheetTreatmentDetail();
                $detail_25->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_25->process                    = 'Oven';
                $detail_25->parameter                  = 'Menit ke';
                $detail_25->standard                   = '60';
                $detail_25->tools                      = 'emperatur meter';
                $detail_25->save();

                $detail_26 = new ChecksheetTreatmentDetail();
                $detail_26->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_26->process                    = 'Oven';
                $detail_26->parameter                  = 'Menit ke';
                $detail_26->standard                   = '90';
                $detail_26->tools                      = 'emperatur meter';
                $detail_26->save();

                $detail_27 = new ChecksheetTreatmentDetail();
                $detail_27->checksheet_treatment_id    = $checksheetTreatment->id;;
                $detail_27->process                    = 'Oven';
                $detail_27->parameter                  = 'Menit ke';
                $detail_27->standard                   = '120';
                $detail_27->tools                      = 'emperatur meter';
                $detail_27->save();

                DB::commit();
                return redirect()->route('kelola-checksheet-treatment')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function update(Request $request, $checksheetTreatmentId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(!$request->date) {
            $data = [
                'title'     => 'Edit Checksheet Treatment',
                'detail'    => ChecksheetTreatment::find($checksheetTreatmentId),
                'form'      => 'Edit',
                'user'      => User::find(Session()->get('id_user'))
            ];
            return view('checksheetTreatment.form', $data);
        } else {
            DB::beginTransaction();
            try {
                $request->validate([
                    'date'          => 'required',
                    'document_no'   => 'required',
                ]);

                $checksheetTreatment = ChecksheetTreatment::find($checksheetTreatmentId);
                $checksheetTreatment->date         = $request->date;
                $checksheetTreatment->document_no  = $request->document_no;
                $checksheetTreatment->save();

                DB::commit();
                return redirect()->route('kelola-checksheet-treatment')->with('success', 'Data berhasil diedit!');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('fail', $th->getMessage());
            }
        }
    }

    public function delete($checksheetTreatmentId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $checksheetTreatment = ChecksheetTreatment::find($checksheetTreatmentId);
        $detail = ChecksheetTreatmentDetail::where('checksheet_treatment_id', $checksheetTreatmentId)->get();
        foreach($detail as $item) {
            $item->delete();
        }
        $checksheetTreatment->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
