@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Informasi Tes Diagnosa ISPA - Sistem Pakar ISPA')

@push('styles')
<style>
    .main-content-wrapper-info {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 1rem;
        background-color: #F4F7FC;
    }

    .info-container {
        background-color: #FFFFFF;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
        width: 100%;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .page-title-info {
        font-size: 2.2rem;
        font-weight: 700;
        color: #3B3A5E;
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .stepper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2.5rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
    }
    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        flex-basis: 0;
        flex-grow: 1;
        position: relative;
    }
    .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #E0E0E0;
        border: 2px solid #E0E0E0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 600;
        color: #757575;
        margin-bottom: 0.5rem;
        z-index: 2;
    }
    .step-label {
        font-size: 0.85rem;
        color: #555E6D;
        font-weight: 500;
    }
    .step.active .step-circle {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
    }
    .step.active .step-label {
        color: #6C63FF;
        font-weight: 600;
    }
    .step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 15px;
        left: calc(50% + 15px);
        width: calc(100% - 30px);
        height: 2px;
        background-color: #E0E0E0;
        z-index: 1;
    }
    .step.active:not(:last-child)::after,
    .step.completed:not(:last-child)::after { 
        background-color: #6C63FF;
    }
    .step.completed .step-circle { 
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
    }
    .step.completed .step-circle .fa-check {
        font-size: 0.9em;
    }


    .info-text p, .info-text ul li {
        color: #374151; 
        font-size: 1.05rem; 
        line-height: 1.8;
    }
    .info-text ul {
        padding-left: 25px;
        margin-top: 0.75rem;
        margin-bottom: 1.75rem;
    }
    .info-text ul li {
        margin-bottom: 0.6rem;
        list-style-type: disc; 
    }
    .info-text p strong, .info-text p b { 
        font-weight: 600;
        color: #3B3A5E;
    }

    .warning-text {
        font-size: 0.95rem;
        color: #5c2324;
        background-color: #fdecea;
        border-left: 5px solid #d9534f;
        padding: 1rem 1.25rem; 
        margin-top: 2.5rem; 
        border-radius: 8px; 
        box-shadow: 0 2px 5px rgba(217, 83, 79, 0.1); 
    }
    .warning-text strong {
        font-weight: 700; 
        color: #c9302c;
    }
    .warning-text i.fas {
        color: #d9534f;
        margin-right: 0.75rem; 
    }

    .navigation-buttons { 
        display: flex;
        justify-content: space-between; 
        align-items: center;
        margin-top: 2.5rem;
        padding-top: 1.5rem; 
        border-top: 1px solid #e9ecef; 
    }

    .btn-nav-action { 
        font-weight: 600;
        font-size: 1.05rem; 
        padding: 0.7rem 1.8rem; 
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .btn-nav-action.btn-next {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
    }
    .btn-nav-action.btn-next:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        transform: translateY(-2px);
    }
    .btn-nav-action.btn-prev { 
        background-color: transparent;
        border: 2px solid #6C63FF;
        color: #6C63FF;
    }
    .btn-nav-action.btn-prev:hover {
        background-color: #6C63FF;
        color: #FFFFFF;
        transform: translateY(-2px);
    }


    @media (max-width: 767.98px) {
        .page-title-info {
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }
        .info-container {
            padding: 25px 20px; 
        }
        .stepper {
            max-width: 100%;
            margin-bottom: 2rem;
        }
        .step-label {
            font-size: 0.75rem;
        }
        .info-text p, .info-text ul li {
            font-size: 0.95rem;
        }
        .navigation-buttons {
            flex-direction: column-reverse; 
            gap: 1rem; 
            margin-top: 2rem;
            padding-top: 1rem;
        }
        .btn-nav-action {
            width: 100%;
            text-align: center;
        }
    }
    @media (max-width: 400px) {
        .step-label {
            font-size: 0.7rem;
        }
    }
</style>
@endpush

@section('content')
{{-- Wrapper dengan class unik jika styling body/main di layout utama perlu di-override khusus untuk halaman ini --}}
{{-- <main class="main-content-wrapper-info"> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11 col-sm-12"> {{-- Kolom sedikit lebih lebar agar konten tidak terlalu sempit --}}
                <div class="info-container">
                    <h1 class="page-title-info">Diagnosa Penyakit ISPA</h1>

                    <div class="stepper">
                        <div class="step active">
                            <div class="step-circle">1</div>
                            <div class="step-label">Informasi Tes</div>
                        </div>
                        <div class="step">
                            <div class="step-circle">2</div>
                            <div class="step-label">Pertanyaan Tes</div>
                        </div>
                        <div class="step">
                            <div class="step-circle">3</div>
                            <div class="step-label">Hasil Tes</div>
                        </div>
                    </div>

                    <div class="info-text">
                        <p>Anda akan diminta mengisi form berisi beberapa pertanyaan terkait gejala yang sedang Anda rasakan.</p>
                        
                        <p style="font-weight: 600; margin-top: 1.75rem;">Tes ini membantu Anda:</p>
                        <ul>
                            <li><i ></i>Mengenali apakah gejala yang Anda alami mengarah ke ISPA</li>
                            <li><i></i>Mendapatkan hasil diagnosa awal berbasis sistem pakar</li>
                            <li><i></i>Mendapatkan rekomendasi tindakan awal</li>
                        </ul>
                    </div>

                    <div class="warning-text">
                        <i class="fas fa-exclamation-triangle fa-lg me-2"></i><strong>Penting:</strong> Tes ini bukan pengganti konsultasi medis langsung. Jika Anda mengalami gejala berat (seperti sesak napas berat, bibir membiru, kesadaran menurun), segera cari bantuan medis darurat. Hasil tes ini hanya memberikan informasi awal dan bukan keputusan final medis.
                    </div>
                    
                    <div class="navigation-buttons">
                        <a href="{{ route('diagnosa.start') }}" class="btn btn-nav-action btn-prev">
                            <i class="fas fa-arrow-left me-1"></i> Sebelumnya
                        </a>
                        <a href="{{ route('diagnosa.biodata.form') }}" class="btn btn-nav-action btn-next">
                            Selanjutnya <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{-- </main> --}}
@endsection