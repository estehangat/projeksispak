@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Detail Riwayat Diagnosa - Sistem Pakar ISPA')

@push('styles')
<style>
    .page-header-detail-riwayat {
        background: linear-gradient(135deg, #6C63FF 0%, #4f46e5 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        border-radius: 0 0 20px 20px;
    }
    .page-header-detail-riwayat h1 {
        font-weight: 600;
        font-size: 2rem;
    }
    .detail-riwayat-container {
        background-color: #FFFFFF;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
    }
    .detail-riwayat-container h2 {
        color: #3B3A5E;
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #e8e6ff;
        padding-bottom: 0.5rem;
    }
    .info-group { margin-bottom: 1.5rem; }
    .info-group .label {
        font-weight: 600;
        color: #3B3A5E;
        display: block;
        margin-bottom: 0.3rem;
    }
    .info-group .value {
        color: #555E6D;
        font-size: 1.05rem;
    }
    .info-group .value.penyakit {
        color: #6C63FF;
        font-weight: bold;
        font-size: 1.2rem;
    }
    .riwayat-jawaban-list {
        list-style: none;
        padding-left: 0;
        font-size: 0.95rem;
    }
    .riwayat-jawaban-list li {
        padding: 0.5rem 0;
        border-bottom: 1px dashed #eee;
    }
    .riwayat-jawaban-list li:last-child {
        border-bottom: none;
    }
    .btn-kembali-profil {
        background-color: #6c757d; /* Abu-abu untuk kembali */
        border-color: #6c757d;
        color: white;
        font-weight: 500;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .btn-kembali-profil:hover {
        background-color: #545b62;
        border-color: #545b62;
    }
</style>
@endpush

@section('content')
<div class="w-100">
    <div class="page-header-detail-riwayat text-center">
        <div class="container">
            <h1>Detail Riwayat Diagnosa</h1>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                <div class="detail-riwayat-container" data-aos="fade-up">
                    <div class="text-end mb-3">
                        <a href="{{ route('user.profile') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Profil
                        </a>
                    </div>

                    <h2><i class="fas fa-calendar-alt me-2 text-primary"></i>Diagnosa pada: {{ $hasilDiagnosa->created_at->format('d F Y, H:i') }}</h2>

                    <div class="info-group">
                        <span class="label">Nama Pasien (saat diagnosa):</span>
                        <span class="value">{{ $biodataSesi['nama'] ?? 'Tidak tercatat' }}</span>
                    </div>
                    <div class="info-group">
                        <span class="label">Usia Pasien (saat diagnosa):</span>
                        <span class="value">{{ $biodataSesi['usia'] ?? 'Tidak tercatat' }} tahun</span>
                    </div>
                    <div class="info-group">
                        <span class="label">Hasil Diagnosa Penyakit:</span>
                        <span class="value penyakit">{{ $hasilDiagnosa->penyakit->penyakit ?? 'Penyakit tidak diketahui' }}</span>
                    </div>

                    @if(!empty($riwayatJawabanSesi))
                        <h3 class="mt-4 mb-3 h5 text-primary fw-bold">Detail Jawaban Gejala:</h3>
                        <ul class="riwayat-jawaban-list">
                            @foreach($riwayatJawabanSesi as $item)
                                <li>
                                    <strong>Pertanyaan:</strong> {{ $item['pertanyaan'] ?? 'N/A' }}<br>
                                    <strong>Jawaban Anda:</strong> <span class="fw-bold {{ ($item['jawaban'] ?? '') == 'YA' ? 'text-success' : (($item['jawaban'] ?? '') == 'TIDAK' ? 'text-danger' : '') }}">{{ $item['jawaban'] ?? '-' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-3"><em>Detail jawaban gejala tidak tersimpan untuk diagnosa ini.</em></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection