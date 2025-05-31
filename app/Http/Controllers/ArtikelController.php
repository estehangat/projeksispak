<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search_judul');

        $validPerPages = [9, 15, 25, 50];
        $perPage = $request->input('per_page', $validPerPages[0]);
        if (!in_array((int)$perPage, $validPerPages)) {
            $perPage = $validPerPages[0];
        }

        $artikelsQuery = Artikel::where('status', 'published')
                                ->whereNotNull('published_at');

        if ($searchQuery) {
            $artikelsQuery->where('judul', 'LIKE', '%' . $searchQuery . '%');
        }

        $artikels = $artikelsQuery->orderBy('published_at', 'desc')
                                  ->paginate((int)$perPage)
                                  ->appends($request->query());

        return view('diagnosa.artikel.index', compact(
            'artikels',
            'searchQuery',
            'perPage'
        ));
    }

    // public function show(Artikel $artikel)
    // {
    //     // if ($artikel->status !== 'published' || is_null($artikel->published_at)) {
    //     //     // abort(404);
    //     //     // return redirect()->route('artikel.index')->with('error', 'Artikel tidak ditemukan atau belum dipublikasikan.');
    //     // }
    //
    //     // return redirect()->away($artikel->url_eksternal);
    //
    //     // return view('diagnosa.artikel.detail', compact('artikel'));
    // }
}