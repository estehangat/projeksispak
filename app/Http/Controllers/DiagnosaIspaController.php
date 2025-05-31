<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\AturanIspa;
use App\Models\Feedback;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DiagnosaIspaController extends Controller
{
    public function showStartPage()
    {
        Session::forget(['biodata', 'riwayat_jawaban', 'kode_gejala_sekarang', 'hasil_diagnosa']);
        return view('diagnosa.start');
    }

    public function showInformasiPage()
    {
        return view('diagnosa.informasi');
    }

    public function showBiodataForm()
    {
        return view('diagnosa.biodata');
    }

    public function submitBiodataAndStart(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer|min:0',
        ]);

        Session::put('biodata', [
            'nama' => $request->nama,
            'usia' => $request->usia,
        ]);
        Session::put('riwayat_jawaban', []);
        Session::forget('hasil_diagnosa');

        $aturanAwal = AturanIspa::where('is_pertanyaan_awal', true)->first();

        if (!$aturanAwal) {
            return redirect()->route('diagnosa.start')
                             ->with('error', 'Sistem pakar belum siap, aturan awal tidak ditemukan.');
        }

        Session::put('kode_gejala_sekarang', $aturanAwal->id_gejala_sekarang);
        return redirect()->route('diagnosa.pertanyaan');
    }

    public function showQuestionPage()
    {
        $kodeGejalaSekarang = Session::get('kode_gejala_sekarang');

        if (!$kodeGejalaSekarang) {
            if (Session::has('hasil_diagnosa')) {
                return redirect()->route('diagnosa.hasil');
            }
            return redirect()->route('diagnosa.start')->with('error', 'Silakan mulai diagnosa dari awal.');
        }

        $gejala = Gejala::where('kode_gejala', $kodeGejalaSekarang)->first();

        if (!$gejala) {
            Session::put('hasil_diagnosa', ['error' => 'Gejala dengan kode '.$kodeGejalaSekarang.' tidak ditemukan.']);
            Session::forget('kode_gejala_sekarang');
            return redirect()->route('diagnosa.hasil');
        }

        return view('diagnosa.pertanyaan', compact('gejala'));
    }

    public function processAnswer(Request $request)
    {
        $request->validate([
            'kode_gejala_sekarang' => 'required|string',
            'jawaban' => 'required|in:YA,TIDAK',
        ]);

        $kodeGejalaSaatIni = $request->kode_gejala_sekarang;
        $jawabanUser = $request->jawaban;

        $gejalaSaatIniInfo = Gejala::where('kode_gejala', $kodeGejalaSaatIni)->first();
        $riwayat = Session::get('riwayat_jawaban', []);
        $riwayat[] = [
            'kode_gejala' => $kodeGejalaSaatIni,
            'pertanyaan' => $gejalaSaatIniInfo ? $gejalaSaatIniInfo->gejala : $kodeGejalaSaatIni,
            'jawaban' => $jawabanUser,
        ];
        Session::put('riwayat_jawaban', $riwayat);

        $aturan = AturanIspa::where('id_gejala_sekarang', $kodeGejalaSaatIni)
                            ->where('jawaban', $jawabanUser)
                            ->first();

        if (!$aturan) {
            Session::put('hasil_diagnosa', ['error' => 'Tidak dapat menentukan penyakit berdasarkan kombinasi gejala yang diberikan.']);
            Session::forget('kode_gejala_sekarang');
            return redirect()->route('diagnosa.hasil');
        }

        if ($aturan->id_penyakit_hasil) {
            $penyakit = Penyakit::where('kode_penyakit', $aturan->id_penyakit_hasil)->first();
            if ($penyakit) {
                Session::put('hasil_diagnosa', [
                    'nama_penyakit' => $penyakit->penyakit,
                    'deskripsi' => $penyakit->deskripsi,
                    'solusi' => $penyakit->solusi,
                ]);
            } else {
                Session::put('hasil_diagnosa', ['error' => 'Penyakit dengan kode '.$aturan->id_penyakit_hasil.' tidak ditemukan.']);
            }
            Session::forget('kode_gejala_sekarang');
            return redirect()->route('diagnosa.hasil');
        }

        if ($aturan->id_gejala_selanjutnya) {
            Session::put('kode_gejala_sekarang', $aturan->id_gejala_selanjutnya);
            return redirect()->route('diagnosa.pertanyaan');
        }

        Session::put('hasil_diagnosa', ['error' => 'Alur diagnosa tidak lengkap pada aturan ini.']);
        Session::forget('kode_gejala_sekarang');
        return redirect()->route('diagnosa.hasil');
    }

    public function showResultPage()
    {
        $biodata = Session::get('biodata');
        $riwayatJawaban = Session::get('riwayat_jawaban');
        $hasilDiagnosa = Session::get('hasil_diagnosa');

        if (!$biodata || !$hasilDiagnosa) {
            return redirect()->route('diagnosa.start')->with('error', 'Silakan mulai diagnosa dari awal untuk melihat hasil.');
        }

        return view('diagnosa.hasil', compact('biodata', 'riwayatJawaban', 'hasilDiagnosa'));
    }

    public function showFeedbackForm(Request $request)
    {
        $diagnosaPenyakit = $request->query('diagnosa_penyakit');
        return view('diagnosa.feedback_form', compact('diagnosaPenyakit'));
    }

    public function storeFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'rating' => 'nullable|integer|min:1|max:5',
            'komentar' => 'required|string|min:10',
            'diagnosa_penyakit_feedback' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('diagnosa.feedback.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        Feedback::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
            'diagnosa_penyakit' => $request->diagnosa_penyakit_feedback,
            'sesi_diagnosa' => session()->has('riwayat_jawaban') ? json_encode(session('riwayat_jawaban')) : null,
        ]);

        return redirect()->route('diagnosa.feedback.form')
                         ->with('showSuccessModal', true)
                         ->with('feedback_success_message', 'Terima kasih banyak! Masukan Anda telah berhasil terkirim.');
    }
}