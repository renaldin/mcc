<?php

namespace App\Http\Controllers;

use App\Models\ChecksheetTreatment;
use App\Models\ChecksheetTreatmentDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'title'                         => 'Detail Check Sheet Treatment',
            'checksheetTreetment'           => ChecksheetTreatment::find($checksheetTreatmentId),
            'checksheetTreatmentDetailList' => $checksheetTreatmentListDetail->get(),
            'user'                          => User::find(Session()->get('id_user'))
        ];
        return view('checksheetTreatmentDetail.index', $data);
    }

    public function update(Request $request, $checksheetTreatmentDetailId)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $checksheetTreatmentDetail = ChecksheetTreatmentDetail::find($checksheetTreatmentDetailId);
            // dd($checksheetTreatmentDetail);
            if ($request->inspection_result_1 !== null) {
                $checksheetTreatmentDetail->inspection_result_1 = $request->inspection_result_1;

                if ($checksheetTreatmentDetail->process === 'Degreasing') {
                    if ($checksheetTreatmentDetail->parameter === 'Water Temperature') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Naikkan suhu heater pada tangki';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Turunkan suhu heater pada tangki';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Total Alkali') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan degreaser CS.13-03 dan booster CS.6-019 sesuai kebutuhan';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan kurangi dosis chemical';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Water Rinse') {
                    if ($checksheetTreatmentDetail->parameter === 'pH (supply)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan bahan kimia penyeimbang';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan larutan asam untuk menurunkan pH';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Contamination') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = '-';
                            $checksheetTreatmentDetail->recommendation = '-';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Pt lakukan overflow/penambahan air bersih';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Surfacing') {
                    if ($checksheetTreatmentDetail->parameter === 'Ph') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical Surface Conditioner CS. 7-071';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Phosphating') {
                    if ($checksheetTreatmentDetail->parameter === 'Ph') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical Surface Conditioner CS. 7-071';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Total Acid (TA)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical Zincoat  1-192 A/B';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air untuk menurunkan konsentrasi';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Free Acid (FA)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tabaha chemical Starter CS 13-21B';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air untuk menurunkan konsentrasi';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Accelerator (AC)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical accelerator CS 9-01';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Kurangi chemical accelerator CS 9-01';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Phosphating rinse 1') {
                    if ($checksheetTreatmentDetail->parameter === 'pH (supply)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan bahan kimia penyeimbang';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan larutan asam untuk menurunkan pH';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Contamination') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = '-';
                            $checksheetTreatmentDetail->recommendation = '-';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Pt lakukan overflow/penambahan air bersih';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Phosphating rinse 2') {
                    if ($checksheetTreatmentDetail->parameter === 'pH (supply)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan bahan kimia penyeimbang';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan larutan asam untuk menurunkan pH';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Contamination') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = '-';
                            $checksheetTreatmentDetail->recommendation = '-';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Pt lakukan overflow/penambahan air bersih';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'CED Painting') {
                    if ($checksheetTreatmentDetail->parameter === 'Water temperature (Start process)') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Sesuaikan kontrol suhu';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Sesuaikan kontrol suhu';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Ph') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical surface conditioner CS. 7-071';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Anolyte') {
                    if ($checksheetTreatmentDetail->parameter === 'Aliran air') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Ganti larutan anolyte';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Ganti larutan anolyte';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'CED Rinse 01') {
                    if ($checksheetTreatmentDetail->parameter === 'Ph') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical surface conditioner CS. 7-071';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'CED Rinse 02') {
                    if ($checksheetTreatmentDetail->parameter === 'Ph') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical surface conditioner CS. 7-071';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }

                if ($checksheetTreatmentDetail->process === 'Oven') {
                    if ($checksheetTreatmentDetail->parameter === 'Menit ke 15') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 45') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 60') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 90') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 120') {
                        if ((int)$request->inspection_result_1 < $checksheetTreatmentDetail->min_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                        } else if ((int)$request->inspection_result_1 > $checksheetTreatmentDetail->max_standard) {
                            $checksheetTreatmentDetail->judgement = 'NG';
                            $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                        } else {
                            $checksheetTreatmentDetail->judgement = 'Ok';
                            $checksheetTreatmentDetail->recommendation = '-';
                        }
                    }
                }
            }

            if ($request->inspection_result_2 !== null) {
                if ($checksheetTreatmentDetail->inspection_result_1 !== null) {
                    $checksheetTreatmentDetail->inspection_result_2 = $request->inspection_result_2;

                    if ($checksheetTreatmentDetail->process === 'Degreasing') {
                        if ($checksheetTreatmentDetail->parameter === 'Water Temperature') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Naikkan suhu heater pada tangki';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Turunkan suhu heater pada tangki';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Total Alkali') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan degreaser CS.13-03 dan booster CS.6-019 sesuai kebutuhan';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan kurangi dosis chemical';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Water Rinse') {
                        if ($checksheetTreatmentDetail->parameter === 'pH (supply)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan bahan kimia penyeimbang';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan larutan asam untuk menurunkan pH';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Contamination') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = '-';
                                $checksheetTreatmentDetail->recommendation = '-';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Pt lakukan overflow/penambahan air bersih';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Surfacing') {
                        if ($checksheetTreatmentDetail->parameter === 'Ph') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical Surface Conditioner CS. 7-071';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Phosphating') {
                        if ($checksheetTreatmentDetail->parameter === 'Ph') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical Surface Conditioner CS. 7-071';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Total Acid (TA)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical Zincoat  1-192 A/B';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air untuk menurunkan konsentrasi';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Free Acid (FA)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tabaha chemical Starter CS 13-21B';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air untuk menurunkan konsentrasi';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Accelerator (AC)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical accelerator CS 9-01';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Kurangi chemical accelerator CS 9-01';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Phosphating rinse 1') {
                        if ($checksheetTreatmentDetail->parameter === 'pH (supply)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan bahan kimia penyeimbang';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan larutan asam untuk menurunkan pH';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Contamination') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = '-';
                                $checksheetTreatmentDetail->recommendation = '-';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Pt lakukan overflow/penambahan air bersih';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Phosphating rinse 2') {
                        if ($checksheetTreatmentDetail->parameter === 'pH (supply)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan bahan kimia penyeimbang';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan larutan asam untuk menurunkan pH';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Contamination') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = '-';
                                $checksheetTreatmentDetail->recommendation = '-';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Pt lakukan overflow/penambahan air bersih';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'CED Painting') {
                        if ($checksheetTreatmentDetail->parameter === 'Water temperature (Start process)') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Sesuaikan kontrol suhu';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Sesuaikan kontrol suhu';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Ph') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical surface conditioner CS. 7-071';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Anolyte') {
                        if ($checksheetTreatmentDetail->parameter === 'Aliran air') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Ganti larutan anolyte';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Ganti larutan anolyte';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'CED Rinse 01') {
                        if ($checksheetTreatmentDetail->parameter === 'Ph') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical surface conditioner CS. 7-071';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'CED Rinse 02') {
                        if ($checksheetTreatmentDetail->parameter === 'Ph') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan chemical surface conditioner CS. 7-071';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Tambahkan air bersih dan larutan asam';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }

                    if ($checksheetTreatmentDetail->process === 'Oven') {
                        if ($checksheetTreatmentDetail->parameter === 'Menit ke 15') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 45') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 60') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 90') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        } else if ($checksheetTreatmentDetail->parameter === 'Menit ke 120') {
                            if ((int)$request->inspection_result_2 < $checksheetTreatmentDetail->min_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Naikan temperature suhu';
                            } else if ((int)$request->inspection_result_2 > $checksheetTreatmentDetail->max_standard) {
                                $checksheetTreatmentDetail->judgement = 'NG';
                                $checksheetTreatmentDetail->recommendation = 'Turunkan temperature suhu';
                            } else {
                                $checksheetTreatmentDetail->judgement = 'Ok';
                                $checksheetTreatmentDetail->recommendation = '-';
                            }
                        }
                    }
                } else {
                    DB::rollBack();
                    return back()->with('fail', 'Inspection Result 1 belum diisi!');
                }
            }



            $checksheetTreatmentDetail->save();

            DB::commit();
            return redirect("/detail-checksheet-treatment/$checksheetTreatmentDetail->checksheet_treatment_id")->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', $th->getMessage());
        }
    }

    public function cetakPDF($treatmentId)
    {
        // Ambil data treatment berdasarkan ID
        $checksheetTreatment = ChecksheetTreatment::findOrFail($treatmentId);

        // Ambil semua detail yang berelasi dengan treatment ini
        $details = ChecksheetTreatmentDetail::where('checksheet_treatment_id', $treatmentId)->get();

        // Ambil data user
        $user = User::find(session()->get('id_user'));

        // Buat PDF
        $pdf = Pdf::loadView('checksheetTreatment.laporan_pdf', [
            'checksheetTreatment' => $checksheetTreatment,
            'details' => $details,
            'title' => 'Laporan Check Sheet Treatment',
            'user' => $user
        ]);

        return $pdf->download('laporan-checksheet-treatment-' . $treatmentId . '.pdf');
    }
}
