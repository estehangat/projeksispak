@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Cek Gejala ISPA Kamu Sekarang! - Sistem Pakar ISPA')

@push('styles')
<style>
    .hero-section-wrapper {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 2rem 1rem;
        background-color: #FFFFFF;
    }

    .hero-content h1 {
        font-size: 3.2rem;
        font-weight: 700;
        color: #3B3A5E;
        line-height: 1.3;
        margin-bottom: 1.5rem;
    }

    .hero-content p.lead-text {
        font-size: 1rem;
        color: #555E6D;
        margin-bottom: 2rem;
        line-height: 1.6;
        max-width: 600px;
    }

    .btn-mulai-custom {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        transition: background-color 0.3s ease;
    }

    .btn-mulai-custom:hover {
        background-color: #5750d6;
        border-color: #5750d6;
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
        max-height: 450px;
    }

    @media (min-width: 992px) {
        .hero-content {
            padding-right: 2rem;
        }
        .hero-content p.lead-text {
            margin-left: 0;
            margin-right: 0;
        }
    }

    @media (max-width: 991.98px) {
        .hero-content {
            text-align: center;
            margin-bottom: 2rem;
        }
        .hero-content p.lead-text {
            margin-left: auto;
            margin-right: auto;
        }
        .hero-image-container {
            margin-top: 1rem;
        }
        .hero-content h1 {
            font-size: 2.5rem;
        }
    }
    @media (max-width: 767.98px) {
        .hero-section-wrapper {
            padding: 1.5rem 1rem;
        }
        .hero-content h1 {
            font-size: 2rem;
        }
        .hero-image {
            max-height: 300px;
        }
        .hero-content p.lead-text {
            font-size: 0.95rem;
        }
    }
</style>
@endpush

@section('content')
<main class="hero-section-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 hero-content">
                <h1>Cek Gejala ISPA<br>Kamu Sekarang!</h1>
                <p class="lead-text">
                    Sistem pakar ini dirancang untuk membantu Anda melakukan diagnosa awal terhadap kemungkinan penyakit Inspeksi Saluran Pernapasan Akut (ISPA) berdasarkan gejala-gejala yang Anda rasakan.
                </p>
                <a href="{{ route('diagnosa.informasi') }}" class="btn btn-mulai-custom">
                    <i class="fas fa-play-circle me-2"></i> Mulai
                </a>
            </div>
            <div class="col-lg-5 col-md-12 hero-image-container text-center text-lg-end">
                <img src="{{ asset('images/home.png') }}" alt="Ilustrasi Halaman Utama ISPA" class="hero-image">
            </div>
        </div>

        @if(session('error'))
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="alert alert-danger">{{ session('error') }}</div>
                </div>
            </div>
        @endif
    </div>
</main>
@endsection