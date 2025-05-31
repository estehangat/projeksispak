@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Hasil Diagnosa ISPA - Sistem Pakar ISPA')

@push('styles')
<style>
    .main-content-wrapper-hasil {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 2rem 1rem;
        background-color: #F4F7FC;
    }

    .result-outer-container {
        background-color: #FFFFFF;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
        width: 100%;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .page-title-hasil {
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
        background-color: #6C63FF;
        border: 2px solid #6C63FF;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 600;
        color: #FFFFFF;
        margin-bottom: 0.5rem;
        z-index: 2;
    }
    .step-label {
        font-size: 0.85rem;
        color: #555E6D;
        font-weight: 500;
    }
    .step.completed .step-label,
    .step.active .step-label {
        color: #6C63FF;
        font-weight: 600;
    }
    .stepper::before {
        content: '';
        position: absolute;
        top: 15px;
        left: 16.66%;
        right: 16.66%;
        height: 2px;
        background-color: #6C63FF;
        z-index: 1;
    }
    .step.completed .step-circle .fa-check,
    .step.active .step-circle .fa-check {
        font-size: 0.9em;
    }

    .result-summary-box {
        background-color: #E8E6FF;
        padding: 20px 25px;
        border-radius: 8px;
        margin-bottom: 2rem;
        border-left: 5px solid #6C63FF;
    }
    .result-summary-box .summary-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #3B3A5E;
        margin-bottom: 0.5rem;
    }
    .result-summary-box .disease-name-summary {
        font-size: 1.7rem;
        font-weight: 700;
        color: #6C63FF;
        margin-bottom: 0.75rem;
    }
    .result-summary-box .summary-text {
        font-size: 1rem;
        color: #4F4C77;
        line-height: 1.6;
    }

    .disease-details-box {
        border: 1px solid #e0e7ff;
        border-radius: 8px;
        padding: 25px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .disease-details-box .disease-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #3B3A5E;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #eee;
    }

    .disease-details-box .disease-description p,
    .disease-details-box .disease-solution p {
        font-size: 1rem;
        line-height: 1.7;
        color: #374151;
        margin-bottom: 1rem;
    }
    .disease-details-box .disease-description h6,
    .disease-details-box .disease-solution h6 {
        font-weight: 600;
        color: #4f46e5;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        font-size: 1.15rem;
    }

    .btn-diagnosa-ulang {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 1rem;
        padding: 0.7rem 2rem;
        border-radius: 50px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: block;
        width: fit-content;
        margin: 2.5rem auto 0 auto;
    }
    .btn-diagnosa-ulang:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        transform: translateY(-2px);
    }

    .additional-info-box {
        margin-top: 2.5rem;
        padding: 1.5rem;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.9rem;
    }
    .additional-info-box h6 {
        font-weight: 600;
        color: #3B3A5E;
        font-size: 1.05rem;
        margin-bottom: 0.75rem;
    }
    .additional-info-box ul li small {
        line-height: 1.6;
    }

    @media (max-width: 767.98px) {
        .page-title-hasil { font-size: 1.8rem; margin-bottom: 1rem; }
        .result-outer-container { padding: 20px 25px; }
        .disease-details-box { padding: 20px; }
        .result-summary-box { padding: 15px 20px; }
        .result-summary-box .disease-name-summary { font-size: 1.4rem; }
        .disease-details-box .disease-title { font-size: 1.5rem; }
        .stepper { max-width: 100%; padding: 0 5px; margin-bottom: 2rem;}
        .step-label {font-size: 0.75rem;}
        .btn-diagnosa-ulang { width: 100%; text-align: center; }
    }
</style>
@endpush

@section('content')
<main class="main-content-wrapper-hasil">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                <div class="result-outer-container">
                    <h1 class="page-title-hasil">Hasil Diagnosa ISPA</h1>

                    <div class="stepper">
                        <div class="step completed">
                            <div class="step-circle"><i class="fas fa-check"></i></div>
                            <div class="step-label">Informasi Tes</div>
                        </div>
                        <div class="step completed">
                            <div class="step-circle"><i class="fas fa-check"></i></div>
                            <div class="step-label">Pertanyaan Tes</div>
                        </div>
                        <div class="step active completed">
                            <div class="step-circle">3</div>
                            <div class="step-label">Hasil Tes</div>
                        </div>
                    </div>

                    @if(isset($hasilDiagnosa))
                        @if(isset($hasilDiagnosa['error']))
                            <div class="alert alert-danger text-center p-4">
                                <h4><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan</h4>
                                <p class="mb-0 mt-2">{{ $hasilDiagnosa['error'] }}</p>
                                <p class="mt-2"><small>Silakan coba lagi atau konsultasikan dengan pakar jika masalah berlanjut.</small></p>
                            </div>
                        @else
                            <div class="result-summary-box">
                                <h2 class="summary-title">Hasil Diagnosa Awal Anda:</h2>
                                <h3 class="disease-name-summary">{{ $hasilDiagnosa['nama_penyakit'] ?? 'Tidak Dapat Diidentifikasi' }}</h3>
                                <p class="summary-text">Berdasarkan gejala-gejala yang telah Anda masukkan, sistem pakar kami menyimpulkan bahwa Anda kemungkinan besar mengalami <strong>{{ strtolower($hasilDiagnosa['nama_penyakit'] ?? 'kondisi yang belum teridentifikasi') }}</strong>.</p>
                            </div>

                            <div class="disease-details-box mt-4">
                                <h4 class="disease-title">{{ $hasilDiagnosa['nama_penyakit'] ?? 'Informasi Detail Penyakit' }}</h4>
                                
                                <div class="disease-description">
                                    <h6><i class="fas fa-notes-medical me-2"></i>Deskripsi Penyakit:</h6>
                                    <p>{!! nl2br(e($hasilDiagnosa['deskripsi'] ?? 'Informasi deskripsi untuk penyakit ini belum tersedia.')) !!}</p>
                                </div>

                                @if(!empty($hasilDiagnosa['solusi']))
                                <div class="disease-solution mt-3">
                                    <h6><i class="fas fa-medkit me-2"></i>Saran Perawatan dan Solusi:</h6>
                                    <p>{!! nl2br(e($hasilDiagnosa['solusi'])) !!}</p>
                                </div>
                                @else
                                <div class="disease-solution mt-3">
                                    <h6><i class="fas fa-medkit me-2"></i>Saran Perawatan dan Solusi:</h6>
                                    <p>Informasi solusi untuk penyakit ini belum tersedia. Disarankan untuk berkonsultasi dengan tenaga medis profesional.</p>
                                </div>
                                @endif
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info text-center p-4">
                            <h4><i class="fas fa-info-circle me-2"></i>Informasi</h4>
                            <p class="mb-0">Proses diagnosa belum selesai atau tidak ada hasil yang dapat ditampilkan saat ini.</p>
                        </div>
                    @endif
                    
                    @if(isset($biodata) && isset($riwayatJawaban) && isset($hasilDiagnosa) && !isset($hasilDiagnosa['error']) && isset($hasilDiagnosa['nama_penyakit']))
                    <div class="additional-info-box">
                        <h6 class="mb-3">Ringkasan Proses Diagnosa untuk Pasien:</h6>
                        <p class="mb-1"><strong>Nama:</strong> {{ $biodata['nama'] ?? '-' }}</p>
                        <p class="mb-2"><strong>Usia:</strong> {{ $biodata['usia'] ?? '-' }} tahun</p>
                        <strong>Riwayat Jawaban yang Diberikan:</strong>
                        <ul class="list-unstyled mt-1 mb-0 small">
                            @forelse($riwayatJawaban as $item)
                                <li>{{ $loop->iteration }}. {{ $item['pertanyaan'] ?? 'Pertanyaan tidak direkam' }}: <strong>{{ $item['jawaban'] ?? '-' }}</strong></li>
                            @empty
                                <li><small>Tidak ada riwayat jawaban yang tercatat.</small></li>
                            @endforelse
                        </ul>
                    </div>
                    @endif

                    <a href="{{ route('diagnosa.start') }}" class="btn btn-diagnosa-ulang">
                        <i class="fas fa-redo me-2"></i> Lakukan Diagnosa Ulang
                    </a>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection