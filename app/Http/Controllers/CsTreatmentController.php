<?php

namespace App\Http\Controllers;

use App\Models\CsTreatment;
use Illuminate\Http\Request;
use Mockery\Generator\Parameter;

class CsTreatmentController extends Controller
{
    public function index()
    {
        $treatments = CsTreatment::all();
        foreach ($treatments as $treatment) {
            $treatment->is_not_standard = $treatment->inspection_result_1 != $treatment->standard; // Bisa ditambahkan logika lebih kompleks
        }
        return view('cs_treatment.index', compact('treatments'));
    }

    public function create()
    {
        // Definisikan data parameter
        $parameters = [
            [
                'name' => 'Water temperature',
                'standard' => '45-55',
                'result' => null,
                'action' => 'Periksa dan sesuaikan suhu tangki menggunakan alat pengontrol suhu.',
            ],
            [
                'name' => 'pH',
                'standard' => '6.5-7.5',
                'result' => null,
                'action' => 'Tambahkan larutan kimia untuk menyeimbangkan pH.',
            ],
            [
                'name' => 'Contamination',
                'standard' => '0-10',
                'result' => null,
                'action' => 'Ganti air pada tangki untuk mengurangi kontaminasi.',
            ],
        ];

        return view('cs_treatment.create', compact('parameters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'process' => 'required|string|max:255',
            'parameter' => 'required|string|max:255',
            'standard' => 'required|string|max:255',
            'tools' => 'required|string|max:255',
            'inspection_result_1' => 'nullable|numeric',
            'inspection_result_2' => 'nullable|numeric',
            'judgement' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Parse standard
        try {
            $standard = $this->parseStandard($data['standard']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }

        // Logika untuk menentukan judgment
        $inspectionResult1 = $data['inspection_result_1'] ?? null;
        $inspectionResult2 = $data['inspection_result_2'] ?? null;

        if (
            ($inspectionResult1 < $standard['min'] || $inspectionResult1 > $standard['max']) ||
            (!is_null($inspectionResult2) && ($inspectionResult2 < $standard['min'] || $inspectionResult2 > $standard['max']))
        ) {
            $data['judgement'] = 'Not OK';
            $data['recommendation'] = $this->generateRecommendation($data['parameter']);
        } else {
            $data['judgement'] = 'OK';
            $data['recommendation'] = null; // Kosong jika OK
        }

        // Simpan ke database
        CsTreatment::create($data);

        return redirect()->route('cs_treatment.index')->with('success', 'Check sheet berhasil disimpan.');
    }


    // Helper untuk parsing standar (contoh: "45-55" menjadi array min/max)
    private function parseStandard($standard)
    {
        // Hapus spasi berlebih
        $standard = str_replace(' ', '', $standard);

        // Pastikan format valid
        if (strpos($standard, '-') === false) {
            throw new \Exception('Format standar tidak valid. Gunakan format seperti "45-55".');
        }

        [$min, $max] = explode('-', $standard);
        return ['min' => (float)$min, 'max' => (float)$max];
    }

    // Helper untuk menghasilkan rekomendasi otomatis
    private function generateRecommendation($parameter)
    {
        $recommendations = [
            'Water temperature' => 'Periksa dan sesuaikan suhu tangki menggunakan alat pengontrol suhu.',
            'pH' => 'Tambahkan larutan kimia untuk menyeimbangkan pH.',
            'Contamination' => 'Ganti air pada tangki untuk mengurangi kontaminasi.',
            // Tambahkan rekomendasi lainnya
        ];

        return $recommendations[$parameter] ?? 'Lakukan perbaikan sesuai prosedur operasional.';
    }
}
