<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\AturanIspa;
use Illuminate\Http\Request;

class AturanIspaController extends Controller
{
    public function index()
    {
        $aturans = AturanIspa::all();
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('admin.aturan.index', compact('aturans', 'gejalas', 'penyakits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branches' => 'required|array',
            'branches.*.id_gejala_sekarang' => 'required',
            'branches.*.jawaban' => 'required',
        ]);

        $isPertanyaanAwal = $request->has('is_pertanyaan_awal') ? 1 : 0;

        // For single branch case
        if (count($request->branches) == 1 && empty($request->branches[0]['id_penyakit_hasil'])) {
            $idPenyakitHasil = $request->id_penyakit_hasil;
        } else {
            $idPenyakitHasil = null;
        }

        foreach ($request->branches as $index => $branch) {
            // For multiple branches, only use penyakit from the last branch
            if ($index == count($request->branches) - 1 && !empty($branch['id_penyakit_hasil'])) {
                $branchPenyakitHasil = $branch['id_penyakit_hasil'];
            } else {
                $branchPenyakitHasil = null;
            }

            AturanIspa::create([
                'id_gejala_sekarang' => $branch['id_gejala_sekarang'],
                'jawaban' => $branch['jawaban'],
                'id_gejala_selanjutnya' => $branch['id_gejala_selanjutnya'] ?? null,
                'id_penyakit_hasil' => $branchPenyakitHasil ?? $idPenyakitHasil,
                'is_pertanyaan_awal' => $isPertanyaanAwal,
            ]);
        }

        return redirect()->route('admin.aturan')->with('success', 'Aturan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_gejala_sekarang' => 'required',
            'jawaban' => 'required',
        ]);

        $aturan = AturanIspa::findOrFail($id);
        $aturan->update([
            'id_gejala_sekarang' => $request->id_gejala_sekarang,
            'jawaban' => $request->jawaban,
            'id_gejala_selanjutnya' => $request->id_gejala_selanjutnya,
            'id_penyakit_hasil' => $request->id_penyakit_hasil,
            'is_pertanyaan_awal' => $request->has('is_pertanyaan_awal') ? 1 : 0,
        ]);

        return redirect()->route('admin.aturan')->with('success', 'Aturan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $aturan = AturanIspa::findOrFail($id);
        $aturan->delete();

        return redirect()->route('admin.aturan')->with('success', 'Aturan berhasil dihapus');
    }
}
