<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilDiagnosa;

class HasilDiagnosaController extends Controller
{
    public function index()
    {
        $hasilDiagnosa = HasilDiagnosa::with(['user', 'penyakit'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.hasil.index', compact('hasilDiagnosa'));
    }

    public function destroy($id)
    {
        $hasil = HasilDiagnosa::findOrFail($id);
        $hasil->delete();

        return redirect()->route('admin.hasil')
            ->with('success', 'Hasil diagnosa berhasil dihapus');
    }
}
