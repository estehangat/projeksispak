@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Lengkapi Biodata - Diagnosa ISPA')

@push('styles')
<style>
    .main-content-wrapper-biodata { 
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 1rem;
        background-color: #F4F7FC;
    }

    .form-container {
        background-color: #FFFFFF;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
        width: 100%;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .page-title-biodata { 
        font-size: 2rem;
        font-weight: 700;
        color: #3B3A5E;
        text-align: center;
        margin-bottom: 2rem;
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

    .stepper::before { 
        content: '';
        position: absolute;
        top: 15px;
        left: 16.66%; 
        right: 16.66%;
        height: 2px;
        background-color: #E0E0E0;
        z-index: 1;
    }
    .line-progress {
        position: absolute;
        top: 15px;
        left: 16.66%;
        height: 2px;
        background-color: #6C63FF;
        z-index: 1;
        width: 0%; 
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
    .step.completed .step-circle {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
    }
    .step.completed .step-circle .fa-check {
        font-size: 0.9em;
    }
    .step.completed .step-label {
        color: #555E6D; 
    }
    .step.completed + .step.active::before, 
    .step.completed:not(:last-child)::after { 
    }


    .form-label {
        font-weight: 600;
        color: #3B3A5E;
        margin-bottom: 0.5rem;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #CED4DA;
        padding: 0.85rem 1.1rem; 
        font-size: 1rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        background-color: #f9fafb; 
    }
    .form-control:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        background-color: #fff;
    }

    .navigation-buttons-form {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2.5rem; 
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }
    .btn-nav-form { 
        font-weight: 600;
        font-size: 1.05rem;
        padding: 0.7rem 1.8rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .btn-nav-form.btn-next-form { 
        background-color: #6C63FF;
        border: 2px solid #6C63FF;
        color: #FFFFFF;
    }
    .btn-nav-form.btn-next-form:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        transform: translateY(-2px);
    }
    .btn-nav-form.btn-prev-form { 
        background-color: transparent;
        border: 2px solid #6C63FF;
        color: #6C63FF;
    }
    .btn-nav-form.btn-prev-form:hover {
        background-color: #6C63FF;
        color: #FFFFFF;
        transform: translateY(-2px);
    }


    @media (max-width: 767.98px) {
        .page-title-biodata {
            font-size: 1.7rem; 
            margin-bottom: 1.5rem;
        }
        .form-container {
            padding: 25px 20px; 
        }
        .stepper {
            max-width: 100%;
            margin-bottom: 2rem; 
        }
        .step-label {
            font-size: 0.75rem;
        }
        .navigation-buttons-form {
            flex-direction: column-reverse; 
            gap: 1rem;
        }
        .btn-nav-form {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
{{-- <main class="main-content-wrapper-biodata"> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container" data-aos="fade-up">
                    <h1 class="page-title-biodata">Lengkapi Biodata Anda</h1>

                    <div class="stepper">
                        <div class="line-progress" style="width: 33.33%;"></div> {{-- Progres 1/3 (menuju tengah step 2) --}}
                        <div class="step completed"> {{-- Step 1 Selesai --}}
                            <div class="step-circle"><i class="fas fa-check"></i></div>
                            <div class="step-label">Informasi Tes</div>
                        </div>
                        <div class="step active"> {{-- Step 2 Aktif (Biodata adalah bagian dari Pertanyaan Tes) --}}
                            <div class="step-circle">2</div>
                            <div class="step-label">Pertanyaan Tes</div>
                        </div>
                        <div class="step">
                            <div class="step-circle">3</div>
                            <div class="step-label">Hasil Tes</div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <h6 class="alert-heading fw-bold"><i class="fas fa-exclamation-circle me-2"></i>Oops! Ada beberapa kesalahan:</h6>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('diagnosa.biodata.submit') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        <div class="mb-4">
                            <label for="usia" class="form-label">Usia (Tahun)</label>
                            <input type="number" class="form-control" id="usia" name="usia" value="{{ old('usia') }}" placeholder="Masukkan usia Anda" required min="0" max="150">
                        </div>
                        
                        <div class="navigation-buttons-form">
                            <a href="{{ route('diagnosa.informasi') }}" class="btn btn-nav-form btn-prev-form">
                                <i class="fas fa-arrow-left me-1"></i> Sebelumnya
                            </a>
                            <button type="submit" class="btn btn-nav-form btn-next-form">
                                Selanjutnya <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- </main> --}}
@endsection