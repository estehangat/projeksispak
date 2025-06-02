<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\AturanIspa;
use Illuminate\Http\Request;

class PakarDashboardController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        $gejalaCount = $gejalas->count();
        $penyakits = Penyakit::all();
        $penyakitCount = $penyakits->count();

        return view('pakar.index', compact('gejalas', 'gejalaCount', 'penyakits', 'penyakitCount'));
    }

    public function gejalaIndex()
    {
        $gejalas = Gejala::all();
        $gejalaCount = $gejalas->count();
        return view('pakar.gejala.index', compact('gejalas', 'gejalaCount'));
    }

    public function gejalaCreate()
    {
        return view('gejala.create');
    }

    public function gejalaStore(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:10|unique:gejala',
            'gejala' => 'required|string|max:255',
        ]);

        Gejala::create($request->all());

        return redirect()->route('pakar.gejala')->with('success', 'Gejala created successfully.');
    }

    public function gejalaEdit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('gejala.edit', compact('gejala'));
    }

    public function gejalaUpdate(Request $request, $id)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:10|unique:gejala,kode_gejala,' . $id,
            'gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->all());

        return redirect()->route('pakar.gejala')->with('success', 'Gejala updated successfully.');
    }
    public function gejalaDestroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return redirect()->route('pakar.gejala')->with('success', 'Gejala deleted successfully.');
    }

    public function penyakitIndex()
    {
        // Logic to retrieve and display all diseases
        $penyakits = Penyakit::all();
        $penyakitCount = $penyakits->count();
        return view('pakar.penyakit.index', compact('penyakits', 'penyakitCount'));
    }

    public function penyakitCreate()
    {
        // Logic to show the form for creating a new disease
        return view('penyakit.create');
    }

    public function penyakitStore(Request $request)
    {
        // Logic to store a new disease in the database
        $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:penyakit',
            'penyakit' => 'required|string|max:255',
        ]);

        // Assuming Penyakit is a model that handles the diseases table
        Penyakit::create($request->all());

        return redirect()->route('pakar.penyakit')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function penyakitEdit($id)
    {
        // Logic to show the form for editing an existing disease
        $penyakit = Penyakit::findOrFail($id);
        return view('penyakit.edit', compact('penyakit'));
    }

    public function penyakitUpdate(Request $request, $id)
    {
        // Logic to update an existing disease in the database
        $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:penyakit,kode_penyakit,' . $id,
            'penyakit' => 'required|string|max:255',
        ]);

        $penyakit = Penyakit::findOrFail($id);
        $penyakit->update($request->all());

        return redirect()->route('pakar.penyakit')->with('success', 'Penyakit berhasil diperbarui.');
    }

    public function penyakitDestroy($id)
    {
        // Logic to delete an existing disease from the database
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        return redirect()->route('pakar.penyakit')->with('success', 'Penyakit berhasil dihapus.');
    }

    public function aturanIndex()
    {
        $aturans = AturanIspa::all();
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('pakar.aturan.index', compact('aturans', 'gejalas', 'penyakits'));
    }

    public function aturanStore(Request $request)
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

        return redirect()->route('pakar.aturan')->with('success', 'Aturan berhasil ditambahkan');
    }

    public function aturanUpdate(Request $request, $id)
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

        return redirect()->route('pakar.aturan')->with('success', 'Aturan berhasil diperbarui');
    }

    public function aturanDestroy($id)
    {
        $aturan = AturanIspa::findOrFail($id);
        $aturan->delete();

        return redirect()->route('pakar.aturan')->with('success', 'Aturan berhasil dihapus');
    }
}
