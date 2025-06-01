<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search_judul');

        $validPerPages = [9, 15, 25, 50];
        $perPageInput = $request->input('per_page', $validPerPages[0]);
        
        $perPage = in_array((int)$perPageInput, $validPerPages, true) ? (int)$perPageInput : $validPerPages[0];

        $artikelsQuery = Artikel::where('status', 'published')
                            ->whereNotNull('published_at');

        if ($searchQuery) {
            $artikelsQuery->where('judul', 'LIKE', '%' . $searchQuery . '%');
        }

        $artikels = $artikelsQuery->orderBy('updated_at', 'desc')
                                ->orderBy('created_at', 'desc')  
                                ->paginate($perPage) 
                                ->appends($request->query()); 

        return view('diagnosa.artikel.index', compact(
            'artikels',
            'searchQuery',
            'perPage' 
        ));
    }

    /**
     * Display a listing of all articles for admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex() // Diambil dari kode teman Anda
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->get();
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Store a newly created article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Diambil dari kode teman Anda
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'url_eksternal' => 'required|url',
            'penulis' => 'required|string|max:100',
            'sumber_publikasi' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.artikel') // Pastikan route 'admin.artikel' ada
                        ->withErrors($validator)
                        ->withInput();
        }

        // If published but no date provided, use current date
        // Menggunakan $request->input('status') untuk konsistensi, meskipun $request->status juga bisa
        if ($request->input('status') == 'published' && empty($request->input('published_at'))) {
            $request->merge(['published_at' => now()]);
        }

        Artikel::create($request->all());

        return redirect()->route('admin.artikel') 
                        ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Update the specified article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // Diambil dari kode teman Anda
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'url_eksternal' => 'required|url',
            'penulis' => 'required|string|max:100',
            'sumber_publikasi' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.artikel') // Pastikan route 'admin.artikel' ada
                        ->withErrors($validator)
                        ->withInput();
        }

        $artikel = Artikel::findOrFail($id);

        // If published but no date provided, use current date
        // Menggunakan $request->input('status') untuk konsistensi
        if ($request->input('status') == 'published' && empty($request->input('published_at'))) {
            $request->merge(['published_at' => now()]);
        }

        $artikel->update($request->all());

        return redirect()->route('admin.artikel') // Pastikan route 'admin.artikel' ada
                        ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // Diambil dari kode teman Anda
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel') // Pastikan route 'admin.artikel' ada
                        ->with('success', 'Artikel berhasil dihapus.');
    }

    // Komentar method show dari kode teman Anda juga dipertahankan jika memang belum akan digunakan
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