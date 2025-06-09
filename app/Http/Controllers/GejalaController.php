<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::whereNotLike('kode_gejala', '%\\_%')
                            ->orderBy('kode_gejala', 'asc')
                            ->get();
        
        $gejalaCount = $gejalas->count();
        
        return view('admin.gejala.index', compact('gejalas', 'gejalaCount'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:10|unique:gejala,kode_gejala', 
            'gejala' => 'required|string|max:255',
        ]);

        Gejala::create($request->all());

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala dasar berhasil ditambahkan.');
    }

    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:10|unique:gejala,kode_gejala,' . $gejala->id, 
            'gejala' => 'required|string|max:255',
        ]);

        $gejala->update($request->all());

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }
}