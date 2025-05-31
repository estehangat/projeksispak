@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Lengkapi Biodata - Diagnosa ISPA')

@push('styles')
<style>
    .biodata-page-content {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 2rem 1rem;
    }

    .form-container {
        background-color: #FFFFFF;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
        width: 100%;
        max-width: 700px;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .page-title {
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
        width: 33.33%;
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

    .form-label {
        font-weight: 600;
        color: #3B3A5E;
        margin-bottom: 0.5rem;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #CED4DA;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-control:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }

    .btn-submit-custom {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.75rem 1.8rem;
        border-radius: 50px;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-top: 1.5rem;
    }
    .btn-submit-custom:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        color: #FFFFFF;
    }

    @media (max-width: 767.98px) {
        .page-title {
            font-size: 1.6rem;
            margin-bottom: 1.5rem;
        }
        .form-container {
            padding: 20px;
            max-width: 100%;
        }
        .stepper {
            max-width: 100%;
            padding: 0 5px;
        }
        .step-label {
            font-size: 0.75rem;
        }
    }
</style>
@endpush

@section('content')
<div class="biodata-page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container">
                    <h1 class="page-title">Lengkapi Biodata Anda</h1>

                    <div class="stepper">
                        <div class="line-progress" style="width: 0%;"></div>
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

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
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
                            <input type="number" class="form-control" id="usia" name="usia" value="{{ old('usia') }}" placeholder="Masukkan usia Anda" required min="0">
                        </div>
                        <button type="submit" class="btn btn-submit-custom">
                            Lanjut ke Pertanyaan <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

    });
</script>
@endpush