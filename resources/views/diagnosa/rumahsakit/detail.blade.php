@extends('diagnosa.partials.diagnosa-layout')

@section('title', $rumahSakit->nama_rs . ' - Detail Fasilitas Kesehatan')

@push('styles')
<style>
    .page-header-detail {
        background-color: #E8E6FF;
        color: #3B3A5E;
        padding: 2.5rem 0;
        margin-bottom: -2rem;
        border-radius: 0 0 25px 25px;
        position: relative;
        z-index: 1;
    }
    .page-header-detail h1 {
        font-weight: 700;
        font-size: 2.5rem;
    }
    .detail-rs-container {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 2.5rem;
        position: relative;
        z-index: 2;
        margin-top: 0;
    }
    .main-title-detail {
        color: #3B3A5E;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
    }
    .info-section-title {
        color: #6C63FF;
        font-weight: 600;
        font-size: 1.3rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e8e6ff;
    }
    .info-item {
        margin-bottom: 1.3rem;
        font-size: 1.05rem;
        display: flex;
        align-items: flex-start;
    }
    .info-item .icon {
        color: #6C63FF;
        margin-right: 15px;
        width: 24px;
        text-align: center;
        font-size: 1.3rem;
        margin-top: 0.1rem;
    }
    .info-item .info-content .info-label {
        font-weight: 600;
        color: #3B3A5E;
        display: block;
        margin-bottom: 0.2rem;
    }
    .info-item .info-content .info-value,
    .info-item .info-content .info-value a {
        color: #555E6D;
        line-height: 1.6;
    }
    .info-item .info-content .info-value a {
        text-decoration: none;
        color: #6C63FF;
        font-weight: 500;
    }
    .info-item .info-content .info-value a:hover {
        text-decoration: underline;
    }
    .btn-back-container {
        margin-bottom: 2rem;
    }
    .btn-back {
        background-color: transparent;
        border: 2px solid #6C63FF;
        color: #6C63FF;
        border-radius: 50px;
        padding: 0.6rem 1.5rem;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background-color: #6C63FF;
        color: white;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<div class="w-100">
    <div class="page-header-detail text-center">
        <div class="container">

        </div>
    </div>

    <div class="container mt-n5">
        <div class="detail-rs-container">
            <div class="btn-back-container">
                <a href="{{ route('rumahsakit.index', session('rs_filter_query', [])) }}" class="btn btn-back">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                </a>
            </div>
            <h1 class="main-title-detail">{{ $rumahSakit->nama_rs }}</h1>

            <div class="info-section-title"><i class="fas fa-map-marked-alt me-2"></i>Informasi Lokasi</div>
            <div class="info-item">
                <i class="fas fa-location-arrow icon"></i>
                <div class="info-content">
                    <span class="info-label">Alamat Lengkap:</span>
                    <span class="info-value">{{ $rumahSakit->alamat }}</span>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-city icon"></i>
                <div class="info-content">
                    <span class="info-label">Kabupaten/Kota:</span>
                    <span class="info-value">{{ $rumahSakit->kabupaten->nama_kabupaten ?? 'Tidak diketahui' }}</span>
                </div>
            </div>
            <div class="info-item">
                <i class="fas fa-landmark icon"></i>
                <div class="info-content">
                    <span class="info-label">Provinsi:</span>
                    <span class="info-value">{{ $rumahSakit->kabupaten->provinsi->nama_provinsi ?? 'Tidak diketahui' }}</span>
                </div>
            </div>

            <div class="info-section-title"><i class="fas fa-phone-volume me-2"></i>Informasi Kontak</div>
            @if($rumahSakit->no_telp)
            <div class="info-item">
                <i class="fas fa-phone-alt icon"></i>
                <div class="info-content">
                    <span class="info-label">Nomor Telepon:</span>
                    <span class="info-value">{{ $rumahSakit->no_telp }}</span>
                </div>
            </div>
            @endif
            @if($rumahSakit->website_url)
            <div class="info-item">
                <i class="fas fa-globe icon"></i>
                <div class="info-content">
                    <span class="info-label">Website Resmi:</span>
                    <span class="info-value">
                        <a href="{{ (str_starts_with($rumahSakit->website_url, 'http://') || str_starts_with($rumahSakit->website_url, 'https://')) ? $rumahSakit->website_url : '//' . $rumahSakit->website_url }}" target="_blank" rel="noopener noreferrer">
                            {{ $rumahSakit->website_url }} <i class="fas fa-external-link-alt fa-xs ms-1"></i>
                        </a>
                    </span>
                </div>
            </div>
            @endif

            @if($rumahSakit->deskripsi_tambahan)
            <div class="info-section-title"><i class="fas fa-notes-medical me-2"></i>Informasi Tambahan</div>
            <div class="info-item">
                <i class="fas fa-info icon"></i>
                <div class="info-content">
                    <span class="info-value">{!! nl2br(e($rumahSakit->deskripsi_tambahan)) !!}</span>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection