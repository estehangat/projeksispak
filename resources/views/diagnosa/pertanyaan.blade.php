@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Pertanyaan Diagnosa - Sistem Pakar ISPA')

@push('styles')
<style>
    .main-content-wrapper-pertanyaan {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 1rem;
        background-color: #F4F7FC;
    }

    .question-outer-container {
        background-color: #FFFFFF;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
        width: 100%;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .page-title-pertanyaan {
        font-size: 2.2rem;
        font-weight: 700;
        color: #3B3A5E;
        text-align: center;
        margin-bottom: 1.5rem;
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

    .question-area {
        background-color: #E8E6FF;
        padding: 40px 30px;
        border-radius: 10px;
        text-align: center;
        margin-top: 2rem;
    }

    .question-text {
        font-size: 1.5rem;
        color: #3B3A5E;
        font-weight: 600;
        margin-bottom: 2.5rem;
        line-height: 1.4;
    }

    .answer-options {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
    }
    .form-check-input[type="radio"] {
        border-radius: 50%;
        width: 1.5em;
        height: 1.5em;
        margin-top: 0.1em;
        border-color: #8987b8;
        cursor: pointer;
    }
    .form-check-input[type="radio"]:checked {
        background-color: #6C63FF;
        border-color: #6C63FF;
    }
    .form-check-input[type="radio"]:focus {
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }
    .form-check-label {
        font-size: 1.2rem;
        color: #3B3A5E;
        font-weight: 500;
        margin-left: 0.5rem;
        cursor: pointer;
    }

    .btn-next-question {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 1rem;
        padding: 0.7rem 2.5rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }
    .btn-next-question:hover {
        background-color: #5750d6;
        border-color: #5750d6;
    }

    .riwayat-container {
        margin-top: 2rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
    }
    .riwayat-container h6 {
        color: #495057;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }
    .riwayat-container ul li {
        color: #212529;
        padding: 0.25rem 0;
        border-bottom: 1px dashed #ced4da;
    }
    .riwayat-container ul li:last-child {
        border-bottom: none;
    }

    @media (max-width: 767.98px) {
        .page-title-pertanyaan {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        .question-outer-container {
            padding: 20px 25px;
        }
        .question-area {
            padding: 25px 20px;
        }
        .question-text {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        .stepper { max-width: 100%; padding: 0 5px; margin-bottom: 1.5rem; }
        .step-label { font-size: 0.75rem; }
        .answer-options { gap: 20px; margin-bottom: 1.5rem; }
        .form-check-label { font-size: 1.1rem; }
        .btn-next-question { width: 100%; padding: 0.7rem 1.5rem; }
        .riwayat-container { padding: 1rem; margin-top: 1.5rem; }
    }
</style>
@endpush

@section('content')
<main class="main-content-wrapper-pertanyaan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                <div class="question-outer-container">
                    <h1 class="page-title-pertanyaan">Diagnosa Penyakit ISPA</h1>

                    <div class="stepper">
                        <div class="line-progress" style="width: 50%;"></div>
                        <div class="step completed">
                            <div class="step-circle"><i class="fas fa-check"></i></div>
                            <div class="step-label">Informasi Tes</div>
                        </div>
                        <div class="step active">
                            <div class="step-circle">2</div>
                            <div class="step-label">Pertanyaan Tes</div>
                        </div>
                        <div class="step">
                            <div class="step-circle">3</div>
                            <div class="step-label">Hasil Tes</div>
                        </div>
                    </div>

                    <div class="question-area">
                        @if(isset($gejala) && $gejala)
                            <h2 class="question-text">Apakah Anda mengalami {{ strtolower($gejala->gejala) }}?</h2>

                            <form action="{{ route('diagnosa.proses') }}" method="POST" id="questionForm">
                                @csrf
                                <input type="hidden" name="kode_gejala_sekarang" value="{{ $gejala->kode_gejala }}">
                                
                                <div class="answer-options">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" id="jawabanYa" value="YA" required>
                                        <label class="form-check-label" for="jawabanYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" id="jawabanTidak" value="TIDAK" required>
                                        <label class="form-check-label" for="jawabanTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-next-question">
                                    Next <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </form>
                        @else
                            <div class="alert alert-info p-4">
                                <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Informasi</h5>
                                <p class="mb-2">Tidak ada gejala lebih lanjut yang perlu ditanyakan atau proses diagnosa telah selesai.</p>
                                <hr>
                                <p class="mb-0">
                                    <a href="{{ route('diagnosa.hasil') }}" class="btn btn-success mt-2"><i class="fas fa-poll me-1"></i> Lihat Hasil Diagnosa</a>
                                    <a href="{{ route('diagnosa.start') }}" class="btn btn-outline-secondary mt-2"><i class="fas fa-redo me-1"></i> Mulai Diagnosa Baru</a>
                                </p>
                            </div>
                        @endif
                    </div>

                    @if(session('riwayat_jawaban') && count(session('riwayat_jawaban')) > 0)
                        <div class="riwayat-container">
                            <h6>Riwayat Jawaban Anda:</h6>
                            <ul class="list-unstyled mb-0 small">
                                @foreach(session('riwayat_jawaban') as $item)
                                    <li>{{ $loop->iteration }}. {{ $item['pertanyaan'] ?? 'Pertanyaan tidak tersedia' }}: <strong>{{ $item['jawaban'] ?? '-' }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>

</script>
@endpush