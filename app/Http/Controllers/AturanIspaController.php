<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\AturanIspa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AturanIspaController extends Controller
{
    public function index()
    {
        $aturans = AturanIspa::with(['gejalaSekarangRel', 'gejalaSelanjutnyaRel', 'penyakitHasilRel'])
            ->orderBy('id_gejala_sekarang')
            ->orderBy('jawaban')
            ->get();

        $gejalaDasar = Gejala::whereNotLike('kode_gejala', '%\\_%')
            ->orderBy('kode_gejala')
            ->get();
        
        $kodeGejalaIndukPotensial = AturanIspa::select('id_gejala_sekarang')
            ->whereNull('id_penyakit_hasil')
            ->distinct()
            ->pluck('id_gejala_sekarang');

        $gejalaIndukPotensial = Gejala::whereIn('kode_gejala', $kodeGejalaIndukPotensial)
            ->orderBy('kode_gejala')
            ->get();
        
        $calonIndukTambahan = Gejala::whereNotLike('kode_gejala', '%\\_%')
            ->whereNotIn('kode_gejala', $gejalaIndukPotensial->pluck('kode_gejala'))
            ->orderBy('kode_gejala')
            ->get();
            
        $gejalaIndukPotensial = $gejalaIndukPotensial->merge($calonIndukTambahan)->sortBy('kode_gejala')->unique('kode_gejala');

        $penyakits = Penyakit::orderBy('kode_penyakit')->get();

        return view('admin.aturan.index', compact(
            'aturans',
            'gejalaDasar',
            'gejalaIndukPotensial',
            'penyakits'
        ));
    }

    private function getOrCreateKontekstualGejala(string $kodeGejalaDasar, ?string $kodeIndukKontekstual, ?string $jawabanInduk): string
    {
        if (empty($kodeIndukKontekstual) || empty($jawabanInduk)) {
            $gejalaDasarInfo = Gejala::where('kode_gejala', $kodeGejalaDasar)->first();
            if (!$gejalaDasarInfo) {
                throw new \Exception("Gejala dasar '{$kodeGejalaDasar}' tidak ditemukan untuk membuat node akar/kontekstual.");
            }
            return $kodeGejalaDasar;
        }

        $jawabanIndukSuffix = (strtoupper($jawabanInduk) == 'YA') ? 'Y' : 'T';
        $kodeKontekstual = $kodeGejalaDasar . "_fr_" . $kodeIndukKontekstual . "_" . $jawabanIndukSuffix;

        $gejala = Gejala::where('kode_gejala', $kodeKontekstual)->first();

        if (!$gejala) {
            $gejalaDasarInfo = Gejala::where('kode_gejala', $kodeGejalaDasar)->first();
            if (!$gejalaDasarInfo) {
                throw new \Exception("Gejala dasar '{$kodeGejalaDasar}' tidak ditemukan saat membuat kode kontekstual '{$kodeKontekstual}'.");
            }

            Gejala::create([
                'kode_gejala' => $kodeKontekstual,
                'gejala' => $gejalaDasarInfo->gejala,
            ]);
        }
        return $kodeKontekstual;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'is_pertanyaan_awal_checkbox' => 'nullable|boolean',
            'id_gejala_induk_kontekstual' => 'required_if:is_pertanyaan_awal_checkbox,null|nullable|string|exists:gejala,kode_gejala',
            'jawaban_induk' => 'required_if:is_pertanyaan_awal_checkbox,null|nullable|in:YA,TIDAK',
            'id_gejala_dasar_sekarang' => 'required|string|exists:gejala,kode_gejala',
            'jawaban_sekarang' => 'required|in:YA,TIDAK',
            'tindakan_selanjutnya' => 'required|in:gejala,penyakit,akhir',
            'id_gejala_dasar_selanjutnya' => 'required_if:tindakan_selanjutnya,gejala|nullable|string|exists:gejala,kode_gejala',
            'id_penyakit_hasil_form' => 'required_if:tindakan_selanjutnya,penyakit|nullable|string|exists:penyakit,kode_penyakit',
        ]);

        $isAkarPohon = $request->has('is_pertanyaan_awal_checkbox');
        $kodeGejalaSekarangKontekstual = '';

        if ($isAkarPohon) {
            $kodeGejalaDasarAkar = $validated['id_gejala_dasar_sekarang'];
            $kodeGejalaSekarangKontekstual = $this->getOrCreateKontekstualGejala(
                $kodeGejalaDasarAkar,
                null,
                null
            );
            
            $existingAwal = AturanIspa::where('is_pertanyaan_awal', true)
                ->where('id_gejala_sekarang', $kodeGejalaSekarangKontekstual)
                ->where('jawaban', $validated['jawaban_sekarang'])
                ->first();
                
            if($existingAwal){
                 return redirect()->route('admin.aturan.index')->with('error', "Aturan awal untuk gejala '{$kodeGejalaSekarangKontekstual}' dengan jawaban '{$validated['jawaban_sekarang']}' sudah ada.");
            }
            
            $otherAkar = AturanIspa::where('is_pertanyaan_awal', true)
                ->where('id_gejala_sekarang', '!=', $kodeGejalaSekarangKontekstual)
                ->first();
                
            if ($otherAkar) {
                 return redirect()->route('admin.aturan.index')->with('error', "Sudah ada pertanyaan awal lain ({$otherAkar->id_gejala_sekarang}) yang terdaftar. Hanya boleh ada satu gejala akar.");
            }

        } else {
            $kodeGejalaSekarangKontekstual = $this->getOrCreateKontekstualGejala(
                $validated['id_gejala_dasar_sekarang'],
                $validated['id_gejala_induk_kontekstual'],
                $validated['jawaban_induk']
            );
        }

        $existingRule = AturanIspa::where('id_gejala_sekarang', $kodeGejalaSekarangKontekstual)
            ->where('jawaban', $validated['jawaban_sekarang'])
            ->first();
            
        if ($existingRule) {
            return redirect()->route('admin.aturan.index')->with('error', "Aturan untuk gejala '{$kodeGejalaSekarangKontekstual}' dengan jawaban '{$validated['jawaban_sekarang']}' sudah ada.");
        }

        $idGejalaSelanjutnyaFinalKontekstual = null;
        $idPenyakitHasilFinal = null;

        if ($validated['tindakan_selanjutnya'] === 'gejala') {
            $idGejalaSelanjutnyaFinalKontekstual = $this->getOrCreateKontekstualGejala(
                $validated['id_gejala_dasar_selanjutnya'],
                $kodeGejalaSekarangKontekstual,
                $validated['jawaban_sekarang']
            );
        } elseif ($validated['tindakan_selanjutnya'] === 'penyakit') {
            $idPenyakitHasilFinal = $validated['id_penyakit_hasil_form'];
        }

        AturanIspa::create([
            'id_gejala_sekarang' => $kodeGejalaSekarangKontekstual,
            'jawaban' => $validated['jawaban_sekarang'],
            'id_gejala_selanjutnya' => $idGejalaSelanjutnyaFinalKontekstual,
            'id_penyakit_hasil' => $idPenyakitHasilFinal,
            'is_pertanyaan_awal' => $isAkarPohon,
        ]);

        return redirect()->route('admin.aturan.index')->with('success', 'Aturan berhasil ditambahkan.');
    }

    public function edit(AturanIspa $aturan)
    {
        $gejalaDasar = Gejala::whereNotLike('kode_gejala', '%\\_%')
            ->orderBy('kode_gejala')
            ->get();
        $penyakits = Penyakit::orderBy('kode_penyakit')->get();

        return view('admin.aturan.edit', compact('aturan', 'gejalaDasar', 'penyakits'));
    }

    public function update(Request $request, AturanIspa $aturan)
    {
        $validated = $request->validate([
            'tindakan_selanjutnya_edit' => 'required|in:gejala,penyakit,akhir',
            'id_gejala_dasar_selanjutnya_edit' => 'required_if:tindakan_selanjutnya_edit,gejala|nullable|string|exists:gejala,kode_gejala',
            'id_penyakit_hasil_form_edit' => 'required_if:tindakan_selanjutnya_edit,penyakit|nullable|string|exists:penyakit,kode_penyakit',
        ]);

        $idGejalaSelanjutnyaFinalKontekstual = null;
        $idPenyakitHasilFinal = null;

        if ($validated['tindakan_selanjutnya_edit'] === 'gejala') {
            $idGejalaSelanjutnyaFinalKontekstual = $this->getOrCreateKontekstualGejala(
                $validated['id_gejala_dasar_selanjutnya_edit'],
                $aturan->id_gejala_sekarang,
                $aturan->jawaban
            );
        } elseif ($validated['tindakan_selanjutnya_edit'] === 'penyakit') {
            $idPenyakitHasilFinal = $validated['id_penyakit_hasil_form_edit'];
        }

        $aturan->update([
            'id_gejala_selanjutnya' => $idGejalaSelanjutnyaFinalKontekstual,
            'id_penyakit_hasil' => $idPenyakitHasilFinal,
        ]);

        return redirect()->route('admin.aturan.index')->with('success', 'Aturan berhasil diperbarui.');
    }

    public function destroy(AturanIspa $aturan)
    {
        $aturan->delete();

        return redirect()->route('admin.aturan.index')->with('success', 'Aturan berhasil dihapus.');
    }
}