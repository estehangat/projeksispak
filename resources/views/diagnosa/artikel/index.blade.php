@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Artikel Kesehatan ISPA - Sistem Pakar ISPA')

@push('styles')
<style>
    .page-header-artikel {
        background: linear-gradient(135deg, #6C63FF 0%, #4f46e5 100%);
        color: white;
        padding: 3rem 0;
        margin-bottom: 2.5rem;
        border-radius: 0 0 30px 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .page-header-artikel h1 { font-weight: 700; font-size: 2.8rem; }
    .page-header-artikel p.lead { font-weight: 300; opacity: 0.9; }

    .filter-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: flex-end;
        margin-bottom: 2.5rem;
    }

    .search-form-artikel {
        flex-grow: 1;
        min-width: 300px;
    }
    .search-form-artikel .form-control {
        border-radius: 8px 0 0 8px;
        padding: 0.75rem 1.2rem;
        border: 1px solid #ced4da;
        font-size: 1rem;
    }
    .search-form-artikel .btn-search {
        border-radius: 0 8px 8px 0;
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: white;
        padding: 0.75rem 1.5rem;
    }
    .search-form-artikel .btn-search:hover {
        background-color: #5750d6;
        border-color: #5750d6;
    }

    .per-page-form {
        min-width: 180px;
    }
    .per-page-form .form-select {
        border-radius: 8px;
        padding: 0.75rem 1.2rem;
        border: 1px solid #ced4da;
        font-size: 1rem;
        font-weight: 500;
        color: #495057;
    }
    .per-page-form .form-select:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }

    .article-card-no-image {
        background-color: #fff;
        border: 1px solid #e0e7ff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(108, 99, 255, 0.08);
        margin-bottom: 1.5rem;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }
    .article-card-no-image:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(108, 99, 255, 0.15);
    }
    .article-card-no-image .card-body {
        padding: 1.75rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .article-card-no-image .card-title a {
        color: #3B3A5E;
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
        line-height: 1.4;
        text-decoration: none;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: calc(1.25rem * 1.4 * 2);
    }
    .article-card-no-image .card-title a:hover {
        color: #6C63FF;
    }
    .article-card-no-image .card-text.summary {
        color: #555E6D;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: calc(0.95rem * 1.6 * 3);
    }
    .article-card-no-image .article-meta {
        font-size: 0.85rem;
        color: #777;
        margin-bottom: 1rem;
    }
    .article-card-no-image .article-meta .sumber-publikasi {
        font-weight: 500;
        color: #6C63FF;
    }
    .article-card-no-image .btn-read-external {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: white;
        border-radius: 50px;
        padding: 0.6rem 1.5rem;
        font-size: 0.9rem;
        font-weight: 500;
        margin-top: auto;
        text-decoration: none;
        display: inline-block;
    }
    .article-card-no-image .btn-read-external:hover {
        background-color: #5750d6;
        border-color: #5750d6;
    }
    .pagination .page-link { color: #6C63FF; }
    .pagination .page-item.active .page-link {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: white;
    }
    .alert-custom-info {
        background-color: #e8e6ff;
        color: #4f4c77;
        border-color: #d1cfff;
        padding: 1.5rem;
        border-radius: 8px;
    }
    .pagination svg.h-5.w-5 { 
    width: 1.25rem;  
    height: 1.25rem; 
}
</style>
@endpush

@section('content')
<div class="w-100">
    <div class="page-header-artikel text-center">
        <div class="container">
            <h1><i class="fas fa-book-reader me-3"></i>Artikel Kesehatan ISPA</h1>
            <p class="lead mb-0">Temukan informasi, tips, dan panduan seputar Inspeksi Saluran Pernapasan Akut dari berbagai sumber terpercaya.</p>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="filter-controls">
            <form action="{{ route('artikel.index') }}" method="GET" class="search-form-artikel">
                <div class="input-group">
                    <input type="text" name="search_judul" class="form-control form-control-lg" placeholder="Cari artikel berdasarkan judul..." value="{{ $searchQuery ?? '' }}">
                    @if(request('per_page'))
                        <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                    @endif
                    <button class="btn btn-search" type="submit"><i class="fas fa-search me-1"></i> Cari</button>
                </div>
            </form>
            <form action="{{ route('artikel.index') }}" method="GET" class="per-page-form">
                @if(request('search_judul'))
                    <input type="hidden" name="search_judul" value="{{ request('search_judul') }}">
                @endif
                <select name="per_page" class="form-select" onchange="this.form.submit()">
                    <option value="9" {{ ($perPage ?? 9) == 9 ? 'selected' : '' }}>9 per halaman</option>
                    <option value="15" {{ ($perPage ?? 9) == 15 ? 'selected' : '' }}>15 per halaman</option>
                    <option value="25" {{ ($perPage ?? 9) == 25 ? 'selected' : '' }}>25 per halaman</option>
                    <option value="50" {{ ($perPage ?? 9) == 50 ? 'selected' : '' }}>50 per halaman</option>
                </select>
            </form>
        </div>
        @if($artikels->isEmpty())
            <div class="alert alert-custom-info text-center py-4" role="alert">
                <h4><i class="fas fa-info-circle me-2"></i> Informasi</h4>
                @if(isset($searchQuery) && !empty($searchQuery))
                    <p class="mb-0">Tidak ada artikel yang ditemukan dengan judul yang mengandung "<strong>{{ $searchQuery }}</strong>".</p>
                @else
                    <p class="mb-0">Belum ada artikel yang dipublikasikan saat ini. Silakan cek kembali nanti.</p>
                @endif
            </div>
        @else
            @if(isset($searchQuery) && !empty($searchQuery))
                <div class="alert alert-light mb-4">
                    Menampilkan {{ $artikels->total() }} hasil pencarian untuk: "<strong>{{ $searchQuery }}</strong>"
                </div>
            @endif
            <div class="row">
                @foreach($artikels as $artikel)
                <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="article-card-no-image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ $artikel->url_eksternal }}" target="_blank" rel="noopener noreferrer">
                                    {{ $artikel->judul }}
                                </a>
                            </h5>
                            <p class="article-meta">
                                @if($artikel->penulis)<i class="fas fa-user-edit me-1"></i> {{ $artikel->penulis }} <span class="mx-1">|</span>@endif
                                @if($artikel->sumber_publikasi)<i class="fas fa-newspaper me-1"></i> <span class="sumber-publikasi">{{ $artikel->sumber_publikasi }}</span> <span class="mx-1">|</span>@endif
                                <i class="fas fa-calendar-alt me-1"></i> {{ $artikel->published_at ? $artikel->published_at->format('d M Y') : \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                            </p>
                            <p class="card-text summary">{{ Str::limit(strip_tags($artikel->ringkasan ?? 'Klik untuk membaca lebih lanjut...'), 150) }}</p>
                            <a href="{{ $artikel->url_eksternal }}" class="btn btn-read-external mt-auto" target="_blank" rel="noopener noreferrer">
                                Baca Selengkapnya <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4 d-flex justify-content-center">
                {{ $artikels->links() }}
            </div>
        @endif
    </div>
</div>
@endsection