<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index(Request $request)
    {
        $provinsis = Provinsi::orderBy('nama_provinsi')->get();
        $kabupatens = collect();

        $selectedProvinsiId = $request->input('provinsi_id');
        $selectedKabupatenId = $request->input('kabupaten_id');

        $query = RumahSakit::with(['kabupaten.provinsi'])->orderBy('nama_rs');

        if ($selectedProvinsiId) {
            $kabupatens = Kabupaten::where('provinsi_id', $selectedProvinsiId)
                                      ->orderBy('nama_kabupaten')
                                      ->get();
            
            $query->whereHas('kabupaten', function ($q) use ($selectedProvinsiId) {
                $q->where('provinsi_id', $selectedProvinsiId);
            });
        }

        if ($selectedKabupatenId) {
            $query->where('kabupaten_id', $selectedKabupatenId);
        }
        
        $rumahSakits = $query->paginate(9)->appends($request->query());

        return view('diagnosa.rumahsakit.index', compact(
            'rumahSakits', 
            'provinsis', 
            'kabupatens', 
            'selectedProvinsiId', 
            'selectedKabupatenId'
        ));
    }

    public function show(RumahSakit $rumahSakit)
    {
        $rumahSakit->load(['kabupaten.provinsi']); 
        return view('diagnosa.rumahsakit.detail', compact('rumahSakit'));
    }
}