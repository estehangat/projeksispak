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

    // Admin method for faskes managment
    public function adminIndex()
    {
        $rumahSakits = RumahSakit::with(['kabupaten.provinsi'])->get();
        $kabupatens = Kabupaten::all();
        $provinsis = Provinsi::orderBy('nama_provinsi')->get();

        return view('admin.faskes.index', compact('rumahSakits', 'kabupatens', 'provinsis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rs' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'website_url' => 'nullable|url',
            'deskripsi_tambahan' => 'nullable|string',
        ]);

        RumahSakit::create($request->all());

        return redirect()->route('admin.faskes')->with('success', 'Fasilitas kesehatan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rs' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'kabupaten_id' => 'required|exists:kabupatens,id',
            'website_url' => 'nullable|url',
            'deskripsi_tambahan' => 'nullable|string',
        ]);

        $rumahSakit = RumahSakit::findOrFail($id);
        $rumahSakit->update($request->all());

        return redirect()->route('admin.faskes')->with('success', 'Fasilitas kesehatan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rumahSakit = RumahSakit::findOrFail($id);
        $rumahSakit->delete();

        return redirect()->route('admin.faskes')->with('success', 'Fasilitas kesehatan berhasil dihapus');
    }

    // API method untuk cascade select provinsi-kabupaten
    public function getKabupatensByProvinsi($provinsiId)
    {
        $kabupatens = Kabupaten::where('provinsi_id', $provinsiId)
            ->orderBy('nama_kabupaten')
            ->get(['id', 'nama_kabupaten']);

        return response()->json($kabupatens);
    }
}
