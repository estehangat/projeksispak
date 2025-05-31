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
    .step.active:not(:last-child)::after {
        background-color: #6C63FF;
    }
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
        color: #333;
        font-size: 1rem;
        line-height: 1.7;
    }
    .info-text ul {
        padding-left: 20px;
        margin-top: 0.5rem;
        margin-bottom: 1.5rem;
    }
    .info-text ul li {
        margin-bottom: 0.5rem;
    }

    .warning-text {
        font-size: 0.95rem;
        color: #5c2324;
        background-color: #fdecea;
        border-left: 5px solid #d9534f;
        padding: 15px;
        margin-top: 2rem;
        border-radius: 4px;
    }
    .warning-text strong {
        font-weight: 600;
        color: #c9302c;
    }
    .warning-text i.fas {
        color: #d9534f;
    }

    .btn-next-custom {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.6rem 1.8rem;
        border-radius: 50px;
        transition: background-color 0.3s ease;
        margin-top: 1.5rem;
        display: inline-block;
    }
    .btn-next-custom:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        color: #FFFFFF;
    }
    .button-container {
        text-align: right;
        margin-top: 1rem;
    }

    @media (max-width: 767.98px) {
        .page-title-info {
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }
        .info-container {
            padding: 20px 25px;
        }
        .stepper {
            max-width: 100%;
        }
        .step-label {
            font-size: 0.75rem;
        }
        .button-container {
            text-align: center;
        }
        .btn-next-custom {
            width: 100%;
        }
        .info-text p, .info-text ul li {
            font-size: 0.95rem;
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
<main class="main-content-wrapper-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
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
                        
                        <p style="font-weight: 600; margin-top: 1.5rem;">Tes ini membantu Anda:</p>
                        <ul>
                            <li>Mengenali apakah gejala yang Anda alami mengarah ke ISPA</li>
                            <li>Mendapatkan hasil diagnosa awal berbasis sistem pakar</li>
                            <li>Mendapatkan rekomendasi tindakan awal</li>
                        </ul>
                    </div>

                    <div class="warning-text">
                        <i class="fas fa-exclamation-triangle me-2"></i><strong>Penting:</strong> Tes ini bukan pengganti konsultasi medis langsung. Jika Anda mengalami gejala berat (seperti sesak napas berat, bibir membiru, kesadaran menurun), segera cari bantuan medis darurat. Hasil tes ini hanya memberikan informasi awal dan bukan keputusan final medis.
                    </div>
                    
                    <div class="button-container">
                        <a href="{{ route('diagnosa.biodata.form') }}" class="btn btn-next-custom">
                            Next <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection