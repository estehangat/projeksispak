<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\AturanIspa;
use App\Models\Feedback;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DiagnosaIspaController extends Controller
{
    public function showStartPage()
    {
        Session::forget(['biodata', 'riwayat_jawaban', 'kode_gejala_sekarang', 'hasil_diagnosa']);

        $artikelTerbaru = Artikel::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc') 
            ->orderBy('updated_at', 'desc')   
            ->take(3)
            ->get();

        $contohRumahSakit = RumahSakit::with('kabupaten.provinsi')
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('diagnosa.start', compact('artikelTerbaru', 'contohRumahSakit'));
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
            'usia' => 'required|integer|min:0|max:150', 
        ]);

        Session::put('biodata', [
            'nama' => $request->input('nama'),
            'usia' => $request->input('usia'),
        ]);
        Session::put('riwayat_jawaban', []);
        Session::forget('hasil_diagnosa'); 

        $aturanAwal = AturanIspa::where('is_pertanyaan_awal', true)->first();

        if (!$aturanAwal || !$aturanAwal->id_gejala_sekarang) {
            return redirect()->route('diagnosa.start')
                ->with('error', 'Sistem pakar belum siap atau aturan awal tidak valid.');
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
            return redirect()->route('diagnosa.start')
                ->with('error', 'Sesi diagnosa tidak ditemukan. Silakan mulai dari awal.');
        }

        $gejala = Gejala::where('kode_gejala', $kodeGejalaSekarang)->first();

        if (!$gejala) {
            Session::put('hasil_diagnosa', ['error' => 'Data gejala dengan kode ' . $kodeGejalaSekarang . ' tidak ditemukan dalam sistem.']);
            Session::forget('kode_gejala_sekarang');
            return redirect()->route('diagnosa.hasil');
        }

        return view('diagnosa.pertanyaan', compact('gejala'));
    }

    public function processAnswer(Request $request)
    {
        $request->validate([
            'kode_gejala_sekarang' => 'required|string|exists:gejalas,kode_gejala',
            'jawaban'              => 'required|in:YA,TIDAK',
        ]);

        $kodeGejalaSaatIni = $request->input('kode_gejala_sekarang');
        $jawabanUser       = $request->input('jawaban');

        $gejalaSaatIniInfo = Gejala::where('kode_gejala', $kodeGejalaSaatIni)->first();
        $riwayat           = Session::get('riwayat_jawaban', []);
        $riwayat[]         = [
            'kode_gejala' => $kodeGejalaSaatIni,
            'pertanyaan'  => $gejalaSaatIniInfo ? $gejalaSaatIniInfo->gejala : 'Gejala ' . $kodeGejalaSaatIni,
            'jawaban'     => $jawabanUser,
        ];
        Session::put('riwayat_jawaban', $riwayat);

        $aturan = AturanIspa::where('id_gejala_sekarang', $kodeGejalaSaatIni)
            ->where('jawaban', $jawabanUser)
            ->first();

        if (!$aturan) {
            Session::put('hasil_diagnosa', ['error' => 'Tidak dapat menentukan langkah selanjutnya berdasarkan kombinasi gejala dan jawaban yang diberikan. Aturan tidak ditemukan.']);
            Session::forget('kode_gejala_sekarang');
            return redirect()->route('diagnosa.hasil');
        }

        if ($aturan->id_penyakit_hasil) {
            $penyakit = Penyakit::where('kode_penyakit', $aturan->id_penyakit_hasil)->first();
            if ($penyakit) {
                Session::put('hasil_diagnosa', [
                    'nama_penyakit' => $penyakit->penyakit,
                    'deskripsi'     => $penyakit->deskripsi,
                    'solusi'        => $penyakit->solusi,
                    'kode_penyakit' => $penyakit->kode_penyakit, 
                ]);
            } else {
                Session::put('hasil_diagnosa', ['error' => 'Data penyakit dengan kode ' . $aturan->id_penyakit_hasil . ' tidak ditemukan.']);
            }
            Session::forget('kode_gejala_sekarang');
            return redirect()->route('diagnosa.hasil');
        }

        if ($aturan->id_gejala_selanjutnya) {
            Session::put('kode_gejala_sekarang', $aturan->id_gejala_selanjutnya);
            return redirect()->route('diagnosa.pertanyaan');
        }

        Session::put('hasil_diagnosa', ['error' => 'Alur diagnosa tidak lengkap pada aturan ini. Tidak ada penyakit hasil atau gejala selanjutnya.']);
        Session::forget('kode_gejala_sekarang');
        return redirect()->route('diagnosa.hasil');
    }

    public function showResultPage()
    {
        $biodata       = Session::get('biodata');
        $riwayatJawaban = Session::get('riwayat_jawaban');
        $hasilDiagnosa = Session::get('hasil_diagnosa');

        if (!$biodata || !$riwayatJawaban || !$hasilDiagnosa) { 
            return redirect()->route('diagnosa.start')
                ->with('error', 'Sesi diagnosa tidak lengkap atau tidak valid. Silakan mulai dari awal.');
        }

        return view('diagnosa.hasil', compact('biodata', 'riwayatJawaban', 'hasilDiagnosa'));
    }

    public function showFeedbackForm(Request $request)
    {
        $diagnosaKodePenyakit = $request->query('kode_penyakit');
        $diagnosaNamaPenyakit = $request->query('nama_penyakit');

        return view('diagnosa.feedback_form', compact('diagnosaKodePenyakit', 'diagnosaNamaPenyakit'));
    }

    public function storeFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'                   => 'nullable|string|max:255',
            'email'                  => 'nullable|email|max:255',
            'rating'                 => 'nullable|integer|min:1|max:5',
            'komentar'               => 'required|string|min:10|max:5000', 
            'diagnosa_penyakit_kode' => 'nullable|string|max:255', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('diagnosa.feedback.form')
                ->withErrors($validator)
                ->withInput()
                ->with('diagnosaKodePenyakit', $request->input('diagnosa_penyakit_kode'))
                ->with('diagnosaNamaPenyakit', $this->getNamaPenyakitFromKode($request->input('diagnosa_penyakit_kode')));
        }

        Feedback::create([
            'nama'              => $request->input('nama'),
            'email'             => $request->input('email'),
            'rating'            => $request->input('rating'),
            'komentar'          => $request->input('komentar'),
            'diagnosa_penyakit' => $request->input('diagnosa_penyakit_kode'),
            'sesi_diagnosa'     => session()->has('riwayat_jawaban') ? json_encode(session('riwayat_jawaban')) : null,
        ]);

        return redirect()->route('diagnosa.feedback.form')
            ->with('showSuccessModal', true)
            ->with('feedback_success_message', 'Terima kasih! Masukan Anda telah berhasil dikirim dan sangat berharga bagi kami.');
    }

    private function getNamaPenyakitFromKode($kodePenyakit)
    {
        if (!$kodePenyakit) {
            return null;
        }
        $penyakit = Penyakit::where('kode_penyakit', $kodePenyakit)->first();
        return $penyakit ? $penyakit->penyakit : null;
    }
}