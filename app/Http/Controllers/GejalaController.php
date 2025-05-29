<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        $gejalaCount = $gejalas->count();
        return view('admin.gejala.index', compact('gejalas', 'gejalaCount'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:10|unique:gejala',
            'gejala' => 'required|string|max:255',
        ]);

        Gejala::create($request->all());

        return redirect()->route('admin.gejala')->with('success', 'Gejala created successfully.');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:10|unique:gejala,kode_gejala,' . $id,
            'gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->all());

        return redirect()->route('admin.gejala')->with('success', 'Gejala updated successfully.');
    }
    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return redirect()->route('admin.gejala')->with('success', 'Gejala deleted successfully.');
    }
}
