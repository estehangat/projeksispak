<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\AturanIspa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PakarDashboardController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::whereNotLike('kode_gejala', '%\\_%')
            ->orderBy('kode_gejala', 'asc')
            ->get();
        
        $gejalaCount = $gejalas->count();

        $penyakits = Penyakit::orderBy('kode_penyakit')->get();
        $penyakitCount = $penyakits->count();
        
        $aturanCount = AturanIspa::count();

        return view('pakar.index', compact(
            'gejalas',
            'gejalaCount',
            'penyakits',
            'penyakitCount',
            'aturanCount'
        ));
    }

    public function gejalaIndex()
    {
        $gejalas = Gejala::whereNotLike('kode_gejala', '%\\_%')
            ->orderBy('kode_gejala', 'asc')
            ->paginate(10);
        
        $gejalaCountTotal = Gejala::whereNotLike('kode_gejala', '%\\_%')->count();

        return view('pakar.gejala.index', compact('gejalas', 'gejalaCountTotal'));
    }

    public function gejalaStore(Request $request)
    {
        $request->validate([
            'kode_gejala' => [
                'required', 'string', 'max:10',
                Rule::unique('gejala', 'kode_gejala'),
                function ($attribute, $value, $fail) {
                    if (Str::contains($value, '_')) {
                        $fail('Kode Gejala Dasar tidak boleh mengandung karakter underscore (_).');
                    }
                },
            ],
            'gejala' => 'required|string|max:255',
        ]);

        Gejala::create($request->all());
        return redirect()->route('pakar.gejala.index')->with('success', 'Gejala dasar berhasil ditambahkan.');
    }

    public function gejalaEdit(Gejala $gejala)
    {
        return view('pakar.gejala.edit', compact('gejala'));
    }

    public function gejalaUpdate(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kode_gejala' => [
                'required', 'string', 'max:10',
                Rule::unique('gejala', 'kode_gejala')->ignore($gejala->id),
                function ($attribute, $value, $fail) {
                    if (Str::contains($value, '_')) {
                        $fail('Kode Gejala Dasar tidak boleh mengandung karakter underscore (_).');
                    }
                },
            ],
            'gejala' => 'required|string|max:255',
        ]);
        
        $gejala->update($request->all());
        return redirect()->route('pakar.gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function gejalaDestroy(Gejala $gejala)
    {
        if (Str::contains($gejala->kode_gejala, '_fr_')) {
        }

        if (AturanIspa::where('id_gejala_sekarang', $gejala->kode_gejala)
                        ->orWhere('id_gejala_selanjutnya', $gejala->kode_gejala)
                        ->exists()) {
            return redirect()->route('pakar.gejala.index')->with('error', 'Gejala tidak bisa dihapus karena masih digunakan dalam aturan diagnosa. Hapus aturan terkait terlebih dahulu.');
        }
        $gejala->delete();
        return redirect()->route('pakar.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }

    public function penyakitIndex()
    {
        $penyakits = Penyakit::all();
        $penyakitCount = $penyakits->count();
        return view('pakar.penyakit.index', compact('penyakits', 'penyakitCount'));
    }

    public function penyakitStore(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:penyakit',
            'penyakit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'solusi' => 'nullable|string',
        ]);

        // Assuming Penyakit is a model that handles the diseases table
        Penyakit::create($request->all());
        return redirect()->route('pakar.penyakit')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function penyakitEdit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        return view('pakar.penyakit.edit', compact('penyakit'));
    }

    public function penyakitUpdate(Request $request, $id)
    {
        $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:penyakit,kode_penyakit,' . $id,
            'penyakit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'solusi' => 'nullable|string',
        ]);

        $penyakit = Penyakit::findOrFail($id);
        $penyakit->update($request->all());
        return redirect()->route('pakar.penyakit')->with('success', 'Penyakit berhasil diperbarui.');
    }

    public function penyakitDestroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        
        if (AturanIspa::where('id_penyakit_hasil', $penyakit->kode_penyakit)->exists()) {
            return redirect()->route('pakar.penyakit')->with('error', 'Penyakit tidak bisa dihapus karena masih digunakan sebagai hasil diagnosa dalam aturan.');
        }
        
        $penyakit->delete();
        return redirect()->route('pakar.penyakit')->with('success', 'Penyakit berhasil dihapus.');
    }

    public function aturanIndex()
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

        return view('pakar.aturan.index', compact(
            'aturans',
            'gejalaDasar',
            'gejalaIndukPotensial',
            'penyakits'
        ));
    }

    private function getOrCreateKontekstualGejala(string $kodeGejalaDasar, ?string $kodeIndukKontekstual, ?string $jawabanIndukUntukAnak): string
    {
        if (empty($kodeIndukKontekstual) || empty($jawabanIndukUntukAnak)) {
            $gejalaDasarInfo = Gejala::where('kode_gejala', $kodeGejalaDasar)->first();
            if (!$gejalaDasarInfo) {
                throw new \Exception("Gejala dasar '{$kodeGejalaDasar}' tidak ditemukan.");
            }
            return $kodeGejalaDasar;
        }

        $jawabanSuffix = (strtoupper($jawabanIndukUntukAnak) == 'YA') ? 'Y' : 'T';
        $kodeKontekstual = $kodeGejalaDasar . "_fr_" . $kodeIndukKontekstual . "_" . $jawabanSuffix;

        $gejala = Gejala::where('kode_gejala', $kodeKontekstual)->first();
        if (!$gejala) {
            $gejalaDasarInfo = Gejala::where('kode_gejala', $kodeGejalaDasar)->first();
            if (!$gejalaDasarInfo) {
                throw new \Exception("Gejala dasar '{$kodeGejalaDasar}' tidak ditemukan saat membuat '{$kodeKontekstual}'.");
            }
            Gejala::create([
                'kode_gejala' => $kodeKontekstual,
                'gejala' => $gejalaDasarInfo->gejala,
            ]);
        }
        return $kodeKontekstual;
    }

    public function aturanStore(Request $request)
    {
        $validated = $request->validate([
            'is_pertanyaan_awal_checkbox' => 'nullable|boolean',
            'id_gejala_induk_kontekstual' => Rule::requiredIf(!$request->has('is_pertanyaan_awal_checkbox')),
            'jawaban_induk' => Rule::requiredIf(!$request->has('is_pertanyaan_awal_checkbox')),
            'id_gejala_dasar_sekarang' => 'required|string|exists:gejala,kode_gejala',
            'jawaban_sekarang' => 'required|in:YA,TIDAK',
            'tindakan_selanjutnya' => 'required|in:gejala,penyakit,akhir',
            'id_gejala_dasar_selanjutnya' => 'required_if:tindakan_selanjutnya,gejala|nullable|string|exists:gejala,kode_gejala',
            'id_penyakit_hasil_form' => 'required_if:tindakan_selanjutnya,penyakit|nullable|string|exists:penyakit,kode_penyakit',
        ]);

        $isAkarPohon = $request->has('is_pertanyaan_awal_checkbox');
        $kodeGejalaSekarangKontekstual = '';

        DB::beginTransaction();
        try {
            if ($isAkarPohon) {
                $kodeGejalaSekarangKontekstual = $validated['id_gejala_dasar_sekarang'];
                $gejalaAkarInfo = Gejala::firstWhere('kode_gejala', $kodeGejalaSekarangKontekstual);
                if(!$gejalaAkarInfo || Str::contains($gejalaAkarInfo->kode_gejala, '_fr_')) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Pertanyaan awal harus merupakan gejala dasar (tanpa _fr_).')->withInput();
                }
                
                $otherAkar = AturanIspa::where('is_pertanyaan_awal', true)
                                          ->where('id_gejala_sekarang', '!=', $kodeGejalaSekarangKontekstual)
                                          ->first();
                if ($otherAkar) {
                     DB::rollBack();
                     return redirect()->route('pakar.aturan.index')->with('error', "Sudah ada pertanyaan awal lain ({$otherAkar->id_gejala_sekarang}) yang terdaftar. Hanya boleh ada satu gejala akar untuk keseluruhan pohon.");
                }

                $existingAwalSpecific = AturanIspa::where('is_pertanyaan_awal', true)
                                                    ->where('id_gejala_sekarang', $kodeGejalaSekarangKontekstual)
                                                    ->where('jawaban', $validated['jawaban_sekarang'])
                                                    ->first();
                if($existingAwalSpecific){
                    DB::rollBack();
                    return redirect()->route('pakar.aturan.index')->with('error', "Aturan awal untuk gejala '{$kodeGejalaSekarangKontekstual}' dengan jawaban '{$validated['jawaban_sekarang']}' sudah ada.");
                }

            } else {
                if (empty($validated['id_gejala_induk_kontekstual']) || empty($validated['jawaban_induk'])) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Gejala Induk dan Jawaban Induk harus dipilih jika bukan pertanyaan awal.')->withInput();
                }
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
                DB::rollBack();
                return redirect()->route('pakar.aturan.index')->with('error', "Aturan untuk gejala '{$kodeGejalaSekarangKontekstual}' dengan jawaban '{$validated['jawaban_sekarang']}' sudah ada.");
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

            DB::commit();
            return redirect()->route('pakar.aturan.index')->with('success', 'Aturan berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pakar.aturan.index')->with('error', 'Gagal menambahkan aturan: Terjadi kesalahan sistem.');
        }
    }
    
    public function aturanUpdate(Request $request, AturanIspa $aturan)
    {
        $validated = $request->validate([
            'tindakan_selanjutnya_edit' => 'required|in:gejala,penyakit,akhir',
            'id_gejala_dasar_selanjutnya_edit' => 'required_if:tindakan_selanjutnya_edit,gejala|nullable|string|exists:gejala,kode_gejala',
            'id_penyakit_hasil_form_edit' => 'required_if:tindakan_selanjutnya_edit,penyakit|nullable|string|exists:penyakit,kode_penyakit',
        ]);
    
        DB::beginTransaction();
        try {
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
    
            DB::commit();
            return redirect()->route('pakar.aturan.index')->with('success', 'Aturan berhasil diperbarui.');
    
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pakar.aturan.index')->with('error', 'Gagal memperbarui aturan: ' . $e->getMessage());
        }
    }

    public function aturanDestroy(AturanIspa $aturan)
    {
        if ($aturan->id_gejala_selanjutnya) {
            $adaAnak = AturanIspa::where('id_gejala_sekarang', $aturan->id_gejala_selanjutnya)->exists();
            if ($adaAnak) {
                return redirect()->route('pakar.aturan.index')->with('error', 'Tidak bisa menghapus aturan ini karena gejala selanjutnya dari aturan ini masih menjadi pertanyaan di aturan lain. Hapus aturan anaknya terlebih dahulu.');
            }
        }
        $aturan->delete();
        return redirect()->route('pakar.aturan.index')->with('success', 'Aturan berhasil dihapus.');
    }
}