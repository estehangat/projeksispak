<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display all diseases
        $penyakits = Penyakit::all();
        $penyakitCount = $penyakits->count();
        return view('admin.penyakit.index', compact('penyakits', 'penyakitCount'));
    }

    public function create()
    {
        // Logic to show the form for creating a new disease
        return view('penyakit.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new disease in the database
        $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:penyakit',
            'penyakit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'solusi' => 'nullable|string',
        ]);

        // Assuming Penyakit is a model that handles the diseases table
        Penyakit::create($request->all());

        return redirect()->route('admin.penyakit')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Logic to show the form for editing an existing disease
        $penyakit = Penyakit::findOrFail($id);
        return view('penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing disease in the database
        $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:penyakit,kode_penyakit,' . $id,
            'penyakit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'solusi' => 'nullable|string',
        ]);

        $penyakit = Penyakit::findOrFail($id);
        $penyakit->update($request->all());

        return redirect()->route('admin.penyakit')->with('success', 'Penyakit berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        // Logic to delete an existing disease from the database
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        return redirect()->route('admin.penyakit')->with('success', 'Penyakit berhasil dihapus.');
    }
}