<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\AturanIspa;
use App\Models\Feedback;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RumahSakit;
use App\Models\HasilDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DiagnosaIspaController extends Controller
{
    public function showStartPage()
    {
        Session::forget(['biodata', 'riwayat_jawaban', 'kode_gejala_sekarang', 'hasil_diagnosa', 'diagnosa_path_detail']);

        $artikelTerbaru = Artikel::where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('updated_at', 'desc') 
            ->orderBy('created_at', 'desc')
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
        $namaTerisiOtomatis = null;
        $usiaDariSesi = null;

        $biodataSesi = Session::get('biodata');
        if ($biodataSesi && isset($biodataSesi['nama'])) {
            $namaTerisiOtomatis = $biodataSesi['nama'];
        }
        if ($biodataSesi && isset($biodataSesi['usia'])) {
            $usiaDariSesi = $biodataSesi['usia'];
        }

        if (is_null($namaTerisiOtomatis) && Auth::check()) {
            $namaTerisiOtomatis = Auth::user()->name;
        }

        return view('diagnosa.biodata', compact('namaTerisiOtomatis', 'usiaDariSesi'));
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
        Session::forget('diagnosa_path_detail');

        $aturanAwal = AturanIspa::where('is_pertanyaan_awal', true)->first();

        if (!$aturanAwal || !$aturanAwal->id_gejala_sekarang) {
            return redirect()->route('diagnosa.start')
                ->with('error', 'Sistem pakar belum siap atau aturan awal tidak valid.');
        }

        Session::put('kode_gejala_sekarang', $aturanAwal->id_gejala_sekarang);
        Session::put('diagnosa_path_detail', [['kode' => $aturanAwal->id_gejala_sekarang, 'jawaban' => null]]);
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
                ->with('error', 'Sesi diagnosa tidak ditemukan atau telah selesai. Silakan mulai dari awal.');
        }

        $gejala = Gejala::where('kode_gejala', $kodeGejalaSekarang)->first();

        if (!$gejala) {
            Session::put('hasil_diagnosa', ['error' => 'Data gejala dengan kode ' . $kodeGejalaSekarang . ' tidak ditemukan dalam sistem.']);
            Session::forget('kode_gejala_sekarang');
            Session::forget('diagnosa_path_detail');
            return redirect()->route('diagnosa.hasil');
        }

        return view('diagnosa.pertanyaan', compact('gejala'));
    }
    
    private function checkPath(array $currentPath, array $targetPathSegment) {
        $pathSoFar = [];
        $pathToCheck = array_slice($currentPath, 0, count($targetPathSegment));

        if(count($pathToCheck) < count($targetPathSegment)) {
            return false;
        }

        for ($i = 0; $i < count($targetPathSegment); $i++) {
            $segmentKey = key($targetPathSegment);
            $segmentValue = current($targetPathSegment);
            
            if (!isset($pathToCheck[$i]) || $pathToCheck[$i]['kode'] !== $segmentKey || $pathToCheck[$i]['jawaban'] !== $segmentValue) {
                return false;
            }
            next($targetPathSegment);
        }
        return true;
    }


    public function processAnswer(Request $request)
    {
        $request->validate([
            'kode_gejala_sekarang' => 'required|string|exists:gejala,kode_gejala',
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

        $pathTree = Session::get('diagnosa_path_detail', []);
        if (count($pathTree) > 0 && end($pathTree)['kode'] == $kodeGejalaSaatIni && end($pathTree)['jawaban'] === null) {
            $pathTree[count($pathTree)-1]['jawaban'] = $jawabanUser;
        } else {
            $pathTree[] = ['kode' => $kodeGejalaSaatIni, 'jawaban' => $jawabanUser];
        }
        Session::put('diagnosa_path_detail', $pathTree);

        $nextGejala = null;
        $penyakitHasilKode = null;
        $kesimpulan = null;
        
        $aturan = AturanIspa::where('id_gejala_sekarang', $kodeGejalaSaatIni)
                            ->where('jawaban', $jawabanUser)
                            ->first();
        
        if ($aturan) {
            if ($aturan->id_penyakit_hasil) {
                $penyakitHasilKode = $aturan->id_penyakit_hasil;
            } elseif ($aturan->id_gejala_selanjutnya) {
                $nextGejala = $aturan->id_gejala_selanjutnya;
            } else {
                $kesimpulan = 'Berdasarkan jawaban Anda, sistem tidak dapat menyimpulkan diagnosa penyakit ISPA tertentu dari jalur ini (aturan berakhir tanpa hasil).';
            }
        } else {
            $kesimpulan = 'Berdasarkan jawaban Anda, sistem tidak dapat menyimpulkan diagnosa penyakit ISPA tertentu dari jalur ini (tidak ada aturan spesifik).';
        }


        if ($penyakitHasilKode) {
            $penyakit = Penyakit::where('kode_penyakit', $penyakitHasilKode)->first();
            if ($penyakit) {
                Session::put('hasil_diagnosa', [
                    'nama_penyakit' => $penyakit->penyakit,
                    'deskripsi'     => $penyakit->deskripsi,
                    'solusi'        => $penyakit->solusi,
                    'kode_penyakit' => $penyakit->kode_penyakit,
                    'penyakit_id_internal' => $penyakit->id
                ]);
                if (Auth::check()) {
                    HasilDiagnosa::create([
                        'user_id' => Auth::id(),
                        'penyakit_id' => $penyakit->id,
                        'biodata_sesi' => Session::get('biodata'),
                        'riwayat_jawaban_sesi' => Session::get('riwayat_jawaban')
                    ]);
                }
            } else {
                Session::put('hasil_diagnosa', ['error' => 'Data penyakit dengan kode ' . $penyakitHasilKode . ' tidak ditemukan.']);
            }
            Session::forget('kode_gejala_sekarang');
            Session::forget('diagnosa_path_detail');
            return redirect()->route('diagnosa.hasil');
        } elseif ($nextGejala) {
            Session::put('kode_gejala_sekarang', $nextGejala);
            $newPathTree = Session::get('diagnosa_path_detail', []);
            $newPathTree[] = ['kode' => $nextGejala, 'jawaban' => null];
            Session::put('diagnosa_path_detail', $newPathTree);
            return redirect()->route('diagnosa.pertanyaan');
        } else {
            Session::put('hasil_diagnosa', [
                'kesimpulan' => $kesimpulan ?? 'Alur diagnosa tidak lengkap atau tidak ada kesimpulan yang dapat diambil.'
            ]);
            Session::forget('kode_gejala_sekarang');
            Session::forget('diagnosa_path_detail');
            return redirect()->route('diagnosa.hasil');
        }
    }

    public function showResultPage()
    {
        $biodata       = Session::get('biodata');
        $riwayatJawaban = Session::get('riwayat_jawaban');
        $hasilDiagnosa = Session::get('hasil_diagnosa');

        if (!$biodata || !$hasilDiagnosa) {
            return redirect()->route('diagnosa.start')
                ->with('error', 'Sesi diagnosa tidak lengkap atau tidak valid. Silakan mulai dari awal.');
        }
        return view('diagnosa.hasil', compact('biodata', 'riwayatJawaban', 'hasilDiagnosa'));
    }

    public function showFeedbackForm(Request $request)
    {
        $diagnosaKodePenyakit = $request->query('kode_penyakit');
        $diagnosaNamaPenyakit = $request->query('nama_penyakit');

        if (!$diagnosaNamaPenyakit && $diagnosaKodePenyakit) {
            $penyakit = Penyakit::where('kode_penyakit', $diagnosaKodePenyakit)->first();
            if ($penyakit) {
                $diagnosaNamaPenyakit = $penyakit->penyakit;
            }
        }
        
        $successMessage = Session::get('feedback_success_message');

        return view('diagnosa.feedback_form', compact('diagnosaKodePenyakit', 'diagnosaNamaPenyakit', 'successMessage'));
    }

    public function storeFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'                   => 'nullable|string|max:255',
            'email'                  => 'nullable|email|max:255',
            'rating'                 => 'nullable|integer|min:1|max:5',
            'komentar'               => 'required|string|min:10|max:5000',
            'diagnosa_penyakit_kode' => 'nullable|string|max:255|exists:penyakit,kode_penyakit',
        ]);

        $diagnosaKodePenyakit = $request->input('diagnosa_penyakit_kode');
        $diagnosaNamaPenyakit = $this->getNamaPenyakitFromKode($diagnosaKodePenyakit);

        if ($validator->fails()) {
            return redirect()->route('diagnosa.feedback.form', ['kode_penyakit' => $diagnosaKodePenyakit, 'nama_penyakit' => $diagnosaNamaPenyakit])
                ->withErrors($validator)
                ->withInput();
        }

        Feedback::create([
            'nama'              => $request->input('nama'),
            'email'             => $request->input('email'),
            'rating'            => $request->input('rating'),
            'komentar'          => $request->input('komentar'),
            'diagnosa_penyakit' => $diagnosaKodePenyakit,
            'sesi_diagnosa'     => session()->has('riwayat_jawaban') ? Session::get('riwayat_jawaban') : null,
        ]);

        return redirect()->route('diagnosa.feedback.form', ['kode_penyakit' => $diagnosaKodePenyakit, 'nama_penyakit' => $diagnosaNamaPenyakit])
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