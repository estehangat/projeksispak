<?php

namespace App\Http\Controllers;

use App\Models\HasilDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatDiagnosaController extends Controller
{
    public function show(HasilDiagnosa $hasilDiagnosa) 
    {
        if ($hasilDiagnosa->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $hasilDiagnosa->load('penyakit', 'user'); 

        $biodataSesi = $hasilDiagnosa->biodata_sesi ?? ['nama' => 'N/A', 'usia' => 'N/A'];
        $riwayatJawabanSesi = $hasilDiagnosa->riwayat_jawaban_sesi ?? [];

        return view('diagnosa.profile.riwayat_detail', compact('hasilDiagnosa', 'biodataSesi', 'riwayatJawabanSesi'));
    }
}