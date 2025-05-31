@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Daftar Fasilitas Kesehatan - Sistem Pakar ISPA')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #6C63FF 0%, #4f46e5 100%);
        color: white;
        padding: 3rem 0;
        margin-bottom: 2.5rem;
        border-radius: 0 0 30px 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .page-header h1 {
        font-weight: 700;
        font-size: 2.8rem;
    }
    .page-header p.lead {
        font-weight: 300;
        opacity: 0.9;
    }
    .filter-form .form-label {
        font-weight: 600;
        color: #3B3A5E;
        margin-bottom: .3rem;
        font-size: 0.95rem;
    }
    .filter-form .form-select, .filter-form .btn {
        border-radius: 8px;
        padding: 0.75rem 1.2rem;
        font-weight: 500;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        font-size: 0.95rem;
    }
    .filter-form .form-select {
        border: 1px solid #ced4da;
        color: #495057;
    }
    .filter-form .form-select:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }
    .filter-form .btn-primary {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color:white;
    }
    .filter-form .btn-primary:hover {
        background-color: #5750d6;
        border-color: #5750d6;
    }
    .rs-card {
        background-color: #fff;
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        margin-bottom: 1.5rem;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .rs-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .rs-card .card-body {
        padding: 1.75rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .rs-card .card-title {
        color: #3B3A5E;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }
    .rs-card .card-subtitle {
        color: #6C63FF;
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
    }
    .rs-card .card-text {
        color: #555E6D;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
    .rs-card .alamat-text {
        min-height: 45px;
    }
    .rs-card .btn-detail {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: white;
        border-radius: 50px;
        padding: 0.5rem 1.2rem;
        font-size: 0.9rem;
        font-weight: 500;
        margin-top: auto;
    }
    .rs-card .btn-detail:hover {
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
    .pagination {
        font-size: 0;
        display: flex;
        align-items: center;
        margin-top: 2rem;
    }

    .pagination .page-item .page-link {
        color: #6C63FF;
        border-radius: 0.3rem;
        margin: 0 3px;
        font-size: 0.85rem;
        padding: 0.45rem 0.9rem;
        border: 1px solid #dee2e6;
        line-height: 1.4;
        min-width: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 36px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        transition: all 0.2s ease-in-out;
    }

    .pagination .page-link:hover {
        background-color: #e8e6ff;
        border-color: #c7c3ff;
        color: #5750d6;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .pagination .page-item.active .page-link {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: white;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(108, 99, 255, 0.3);
    }

    .pagination .page-item.disabled .page-link {
        color: #adb5bd;
        background-color: #f0f2f5;
        border-color: #e9ecef;
        pointer-events: none;
        box-shadow: none;
    }

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        padding: 0.45rem 0.8rem;
    }

    .pagination .page-item .page-link svg {
        width: 0.7em;
        height: 0.7em;
        vertical-align: middle;
    }
</style>
@endpush

@section('content')
<div class="w-100">
    <div class="page-header text-center">
        <div class="container">
            <h1><i class="fas fa-hospital-alt me-3"></i>Daftar Fasilitas Kesehatan</h1>
            <p class="lead mb-0">Temukan informasi rumah sakit dan fasilitas kesehatan di berbagai daerah.</p>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <form action="{{ route('rumahsakit.index') }}" method="GET" class="row g-3 align-items-end mb-5 filter-form">
            <div class="col-md-5">
                <label for="provinsi_id" class="form-label">Filter Provinsi:</label>
                <select name="provinsi_id" id="provinsi_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Provinsi</option>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ (string)$selectedProvinsiId == (string)$provinsi->id ? 'selected' : '' }}>
                            {{ $provinsi->nama_provinsi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <label for="kabupaten_id" class="form-label">Filter Kabupaten/Kota:</label>
                <select name="kabupaten_id" id="kabupaten_id" class="form-select" {{ $kabupatens->isEmpty() && !$selectedProvinsiId ? 'disabled' : '' }}>
                    <option value="">Semua Kabupaten/Kota @if($selectedProvinsiId) (di provinsi terpilih) @endif</option>
                    @if($kabupatens->isNotEmpty())
                        @foreach($kabupatens as $kabupaten)
                            <option value="{{ $kabupaten->id }}" {{ (string)$selectedKabupatenId == (string)$kabupaten->id ? 'selected' : '' }}>
                                {{ $kabupaten->nama_kabupaten }}
                            </option>
                        @endforeach
                    @elseif($selectedProvinsiId)
                        <option value="" disabled>Tidak ada data kabupaten untuk provinsi ini</option>
                    @endif
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i>Filter</button>
            </div>
        </form>

        @if($rumahSakits->isEmpty())
            <div class="alert alert-custom-info text-center py-4" role="alert">
                <h4><i class="fas fa-info-circle me-2"></i> Informasi</h4>
                <p class="mb-0">Belum ada data fasilitas kesehatan untuk filter yang Anda pilih, atau data masih kosong.</p>
            </div>
        @else
            <div class="row">
                @foreach($rumahSakits as $rs)
                <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="card rs-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $rs->nama_rs }}</h5>
                            <h6 class="card-subtitle">
                                <i class="fas fa-map-pin me-1 opacity-75"></i> {{ $rs->kabupaten->provinsi->nama_provinsi ?? 'N/A Provinsi' }}
                            </h6>
                            <h6 class="card-subtitle mb-3">
                                <i class="fas fa-map-marker-alt me-1 opacity-75"></i> {{ $rs->kabupaten->nama_kabupaten ?? 'N/A Kabupaten' }}
                            </h6>
                            <p class="card-text alamat-text"><i class="fas fa-location-arrow me-2 text-muted" style="width:1em;"></i> {{ Str::limit($rs->alamat, 75) }}</p>
                            @if($rs->no_telp)
                            <p class="card-text"><i class="fas fa-phone me-2 text-muted" style="width:1em;"></i> {{ $rs->no_telp }}</p>
                            @endif
                            <a href="{{ route('rumahsakit.show', $rs->id) }}" class="btn btn-detail mt-auto">
                                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection