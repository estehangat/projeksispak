@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Sistem Pakar ISPA - Diagnosa & Informasi Kesehatan')

@push('styles')
<style>
    .hero-section-wrapper {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 3rem 1rem 4rem 1rem;
        background-color: #FFFFFF;
        overflow-x: hidden;
    }
    .hero-content h1 {
        font-size: 3.2rem; 
        font-weight: 700; 
        color: #3B3A5E; 
        line-height: 1.3; 
        margin-bottom: 1.5rem;
    }
    .hero-content p.lead-text {
        font-size: 1.1rem; 
        color: #555E6D; 
        margin-bottom: 2.5rem; 
        line-height: 1.7; 
        max-width: 600px;
    }
    .btn-mulai-custom {
        background-color: #6C63FF; 
        border-color: #6C63FF; 
        color: #FFFFFF; 
        font-weight: 600;
        font-size: 1.2rem; 
        padding: 0.85rem 2.5rem; 
        border-radius: 50px; 
        transition: all 0.3s ease;
    }
    .btn-mulai-custom:hover {
        background-color: #5750d6; 
        border-color: #5750d6; 
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
        color: #FFFFFF;
    }
    .hero-image-container { 
        display: flex; 
        align-items: center; 
        justify-content: center; 
    }
    .hero-image { 
        max-width: 100%; 
        height: auto; 
        max-height: 480px; 
    }

    .section-preview {
        padding: 4rem 1rem;
        background-color: #F4F7FC;
        overflow-x: hidden;
    }
    .section-title {
        font-size: 2.4rem;
        font-weight: 700;
        color: #3B3A5E;
        margin-bottom: 1rem;
        text-align: center;
    }
    .section-subtitle {
        font-size: 1.1rem;
        color: #555E6D;
        margin-bottom: 3.5rem;
        text-align: center;
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
    }
    .btn-lihat-semua {
        background-color: transparent; 
        border: 2px solid #6C63FF; 
        color: #6C63FF;
        font-weight: 600; 
        padding: 0.7rem 1.8rem; 
        border-radius: 50px;
        transition: all 0.3s ease; 
        display: inline-block; 
        margin-top: 2.5rem;
    }
    .btn-lihat-semua:hover {
        background-color: #6C63FF; 
        color: #FFFFFF; 
        transform: translateY(-2px);
    }

    .preview-card {
        background-color: #fff;
        border: 1px solid #e8e6ff;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(108, 99, 255, 0.08);
        margin-bottom: 1.5rem;
        transition: transform 0.25s ease-in-out, box-shadow 0.25s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }
    .preview-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(108, 99, 255, 0.15);
    }
    .preview-card .card-body {
        padding: 1.75rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .preview-card .card-title a, .preview-card .card-title {
        color: #3B3A5E;
        font-weight: 600;
        margin-bottom: 0.6rem;
        font-size: 1.2rem;
        line-height: 1.45;
        text-decoration: none;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: calc(1.2rem * 1.45 * 2);
    }
    .preview-card .card-title a:hover { color: #6C63FF; }

    .preview-card .card-meta, .preview-card .card-text.meta-location {
        font-size: 0.85rem;
        color: #718096;
        margin-bottom: 0.75rem;
        line-height: 1.5;
    }
    .preview-card .card-meta .sumber-publikasi,
    .preview-card .card-text.meta-location .location-info {
        font-weight: 500;
        color: #6C63FF;
    }
    .preview-card .card-text.summary, .preview-card .card-text.alamat-preview {
        color: #555E6D;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1.2rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: calc(0.9rem * 1.6 * 3);
    }
    .preview-card .btn-action-card {
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
        transition: all 0.3s ease;
    }
    .preview-card .btn-action-card:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(87, 80, 214, 0.3);
    }

    .feedback-cta-section {
        padding: 5rem 1rem;
        background-color: #6C63FF;
        color: #FFFFFF;
        overflow-x: hidden;
    }
    .feedback-cta-section .section-title,
    .feedback-cta-section .section-subtitle {
        color: #FFFFFF;
    }
    .feedback-cta-section .section-subtitle {
        opacity: 0.9;
    }
    .feedback-cta-section .btn-feedback-cta {
        background-color: #FFFFFF;
        color: #6C63FF;
        border: 2px solid #FFFFFF;
        font-weight: 700;
        font-size: 1.1rem;
        padding: 0.85rem 2.5rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .feedback-cta-section .btn-feedback-cta:hover {
        background-color: #f0f2f5;
        color: #5750d6;
        border-color: #f0f2f5;
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    @media (min-width: 992px) {
        .hero-content { padding-right: 3rem; }
        .hero-content p.lead-text { margin-left: 0; margin-right: 0; }
    }
    @media (max-width: 991.98px) {
        .hero-content { text-align: center; margin-bottom: 2.5rem; }
        .hero-content p.lead-text { margin-left: auto; margin-right: auto; }
        .hero-image-container { margin-top: 1.5rem; }
        .hero-content h1 { font-size: 2.8rem; }
        .section-title { font-size: 2rem; }
        .section-subtitle { font-size: 1.05rem; margin-bottom: 2.5rem;}
        .section-preview, .feedback-cta-section { padding: 3.5rem 1rem; }
    }
    @media (max-width: 767.98px) {
        .hero-section-wrapper { padding: 2rem 1rem 3rem 1rem; }
        .hero-content h1 { font-size: 2.2rem; }
        .hero-image { max-height: 300px; }
        .hero-content p.lead-text { font-size: 1rem; }
        .section-preview, .feedback-cta-section { padding: 3rem 1rem; }
        .section-title { font-size: 1.8rem; }
        .section-subtitle { font-size: 1rem; margin-bottom: 2rem;}
    }
</style>
@endpush

@section('content')
<main class="hero-section-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 hero-content text-center text-lg-start" data-aos="fade-right" data-aos-delay="100">
                <h1>Cek Gejala ISPA<br>Kamu Sekarang!</h1>
                <p class="lead-text">
                    Sistem pakar ini dirancang untuk membantu Anda melakukan diagnosa awal terhadap kemungkinan penyakit Inspeksi Saluran Pernapasan Akut (ISPA) berdasarkan gejala-gejala yang Anda rasakan.
                </p>
                <a href="{{ route('diagnosa.informasi') }}" class="btn btn-mulai-custom" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-play-circle me-2"></i> Mulai Diagnosa
                </a>
            </div>
            <div class="col-lg-5 col-md-12 hero-image-container text-center text-lg-end mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                <img src="{{ asset('images/home.png') }}" alt="Ilustrasi Halaman Utama ISPA" class="hero-image">
            </div>
        </div>

        @if(session('error'))
            <div class="row mt-4" data-aos="fade-up" data-aos-delay="400">
                <div class="col-md-12">
                    <div class="alert alert-danger">{{ session('error') }}</div>
                </div>
            </div>
        @endif
    </div>
</main>

@if($artikelTerbaru && $artikelTerbaru->count() > 0)
<section class="section-preview" data-aos="fade-up">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Artikel Kesehatan Terbaru</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Baca informasi dan tips seputar ISPA untuk menjaga kesehatan Anda.</p>
        <div class="row">
            @foreach($artikelTerbaru as $index => $artikel)
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ 200 + ($index * 100) }}">
                <div class="preview-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $artikel->url_eksternal }}" target="_blank" rel="noopener noreferrer">
                                {{ $artikel->judul }}
                            </a>
                        </h5>
                        <p class="card-meta">
                            @if($artikel->penulis)<i class="fas fa-user-edit me-1 opacity-75"></i> {{ $artikel->penulis }} <span class="mx-1">|</span>@endif
                            @if($artikel->sumber_publikasi)<i class="fas fa-newspaper me-1 opacity-75"></i> <span class="sumber-publikasi">{{ $artikel->sumber_publikasi }}</span> <span class="mx-1">|</span>@endif
                            <i class="fas fa-calendar-alt me-1 opacity-75"></i> {{ $artikel->published_at ? $artikel->published_at->format('d M Y') : \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                        </p>
                        <p class="card-text summary">{{ Str::limit(strip_tags($artikel->ringkasan ?? 'Klik untuk membaca lebih lanjut...'), 120) }}</p>
                        <a href="{{ $artikel->url_eksternal }}" class="btn btn-action-card mt-auto" target="_blank" rel="noopener noreferrer">
                            Baca Selengkapnya <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center" data-aos="fade-up">
            <a href="{{ route('artikel.index') }}" class="btn btn-lihat-semua">
                Lihat Semua Artikel <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

@if($contohRumahSakit && $contohRumahSakit->count() > 0)
<section class="section-preview" data-aos="fade-up">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Beberapa Fasilitas Kesehatan</h2>
        <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Temukan fasilitas kesehatan yang mungkin dapat membantu Anda.</p>
        <div class="row">
            @foreach($contohRumahSakit as $index => $rs)
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ 200 + ($index * 100) }}">
                <div class="preview-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rs->nama_rs }}</h5>
                        <p class="card-text meta-location">
                            <span class="location-info"><i class="fas fa-map-pin me-1 opacity-75"></i> {{ $rs->kabupaten->provinsi->nama_provinsi ?? 'N/A Provinsi' }}</span><br>
                            <i class="fas fa-map-marker-alt me-1 opacity-75"></i> {{ $rs->kabupaten->nama_kabupaten ?? 'N/A Kabupaten' }}
                        </p>
                        <p class="card-text alamat-preview"><i class="fas fa-location-arrow me-2 text-muted" style="width:1em;"></i> {{ Str::limit($rs->alamat, 60) }}</p>
                        @if($rs->no_telp)
                        <p class="card-text"><i class="fas fa-phone me-2 text-muted" style="width:1em;"></i> {{ $rs->no_telp }}</p>
                        @endif
                        <a href="{{ route('rumahsakit.show', $rs->id) }}" class="btn btn-action-card mt-auto">
                            Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center" data-aos="fade-up">
            <a href="{{ route('rumahsakit.index') }}" class="btn btn-lihat-semua">
                Lihat Semua Faskes <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

<section class="feedback-cta-section text-center" data-aos="zoom-in-up">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-comments me-2"></i>Bantu Kami Menjadi Lebih Baik!</h2>
        <p class="section-subtitle col-md-8 mx-auto" data-aos="zoom-in-up" data-aos-delay="100">Masukan Anda sangat berharga untuk pengembangan sistem pakar ini. Sampaikan kritik, saran, atau apresiasi Anda agar kami dapat terus meningkatkan kualitas layanan.</p>
        <a href="{{ route('diagnosa.feedback.form') }}" class="btn btn-feedback-cta" data-aos="zoom-in-up" data-aos-delay="200">
            <i class="fas fa-pen-alt me-2"></i> Berikan Feedback Anda
        </a>
    </div>
</section>

@endsection