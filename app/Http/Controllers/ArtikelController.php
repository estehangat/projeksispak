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

    /**
     * Display a listing of all articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
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
    public function store(Request $request)
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
            return redirect()->route('admin.artikel')
                ->withErrors($validator)
                ->withInput();
        }

        // If published but no date provided, use current date
        if ($request->status == 'published' && empty($request->published_at)) {
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
    public function update(Request $request, $id)
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
            return redirect()->route('admin.artikel')
                ->withErrors($validator)
                ->withInput();
        }

        $artikel = Artikel::findOrFail($id);

        // If published but no date provided, use current date
        if ($request->status == 'published' && empty($request->published_at)) {
            $request->merge(['published_at' => now()]);
        }

        $artikel->update($request->all());

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel berhasil dihapus.');
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
