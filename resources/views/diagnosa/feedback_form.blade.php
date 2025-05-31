@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Berikan Masukan - Sistem Pakar ISPA')

@push('styles')
<style>
    .main-content-wrapper-feedback {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem 1rem;
        background-color: #F4F7FC;
        width: 100%;
    }

    .feedback-container {
        background-color: #FFFFFF;
        padding: 35px 45px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,.1);
        width: 100%;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .page-title-feedback {
        font-size: 2.1rem;
        font-weight: 700;
        color: #3B3A5E;
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #3B3A5E;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #DDE1E6;
        padding: 0.85rem 1.1rem;
        font-size: 1rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        background-color: #F9FAFB;
    }
    .form-control:focus, .form-select:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        background-color: #FFFFFF;
    }
    textarea.form-control {
        min-height: 130px;
        resize: vertical;
    }
    .form-control[readonly][disabled] {
        background-color: #e9ecef;
        opacity: 1;
    }

    .btn-submit-feedback {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.85rem 1.8rem;
        border-radius: 50px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: block;
        margin-left: auto;
        margin-right: auto;
        min-width: 200px;
        margin-top: 1.5rem;
    }
    .btn-submit-feedback:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        transform: translateY(-2px);
    }

    .modal-content-custom {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,.2);
    }
    .modal-header-custom {
        background: linear-gradient(135deg, #6C63FF 0%, #4f46e5 100%);
        color: #FFFFFF;
        border-bottom: none;
        padding: 1.2rem 1.5rem;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .modal-header-custom .modal-title {
        font-weight: 600;
        font-size: 1.3rem;
    }
    .modal-header-custom .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.9;
    }
    .modal-header-custom .btn-close:hover {
        opacity: 1;
    }
    .modal-body-custom {
        padding: 1.75rem 1.5rem;
        font-size: 1.05rem;
        color: #374151;
        line-height: 1.6;
        text-align: center;
    }
    .modal-body-custom i.fas.fa-check-circle {
        font-size: 3rem;
        color: #28a745;
        margin-bottom: 1rem;
        display: block;
    }
    .modal-footer-custom {
        border-top: 1px solid #e9ecef;
        padding: 1rem 1.5rem;
        background-color: #f8f9fa;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        display: flex;
        justify-content: center;
        gap: 0.75rem;
    }
    .modal-footer-custom .btn {
        font-weight: 500;
        padding: 0.6rem 1.2rem;
    }
    .modal-footer-custom .btn-outline-primary {
        color: #6C63FF;
        border-color: #6C63FF;
    }
    .modal-footer-custom .btn-outline-primary:hover {
        background-color: #6C63FF;
        color: #FFFFFF;
    }
    .modal-footer-custom .btn-primary {
        background-color: #6C63FF;
        border-color: #6C63FF;
    }
    .modal-footer-custom .btn-primary:hover {
        background-color: #5750d6;
        border-color: #5750d6;
    }

    @media (max-width: 767.98px) {
        .page-title-feedback { font-size: 1.7rem; margin-bottom: 1.5rem; }
        .feedback-container { padding: 25px 20px; }
        .main-content-wrapper-feedback { padding: 1.5rem 0.75rem; }
        .modal-body-custom i.fas.fa-check-circle { font-size: 2.5rem; }
        .modal-footer-custom { flex-direction: column; gap: 0.5rem; }
        .modal-footer-custom .btn { width: 100%; }
        .btn-submit-feedback { width: 100%; }
    }
</style>
@endpush

@section('content')
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="feedback-container">
                    <h1 class="page-title-feedback">Berikan Masukan Anda</h1>

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

                    <form action="{{ route('diagnosa.feedback.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="nama" class="form-label">Nama (Opsional)</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Anda">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email (Opsional)</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="email@contoh.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating Pengalaman (Opsional)</label>
                            <select class="form-select" id="rating" name="rating">
                                <option value="" @if(old('rating') == "") selected @endif disabled>Beri rating pengalaman Anda...</option>
                                <option value="5" @if(old('rating') == 5) selected @endif>⭐⭐⭐⭐⭐ (Sangat Baik)</option>
                                <option value="4" @if(old('rating') == 4) selected @endif>⭐⭐⭐⭐ (Baik)</option>
                                <option value="3" @if(old('rating') == 3) selected @endif>⭐⭐⭐ (Cukup)</option>
                                <option value="2" @if(old('rating') == 2) selected @endif>⭐⭐ (Kurang)</option>
                                <option value="1" @if(old('rating') == 1) selected @endif>⭐ (Sangat Kurang)</option>
                            </select>
                        </div>

                        @if(isset($diagnosaKodePenyakit) && isset($diagnosaNamaPenyakit))
                            <div class="mb-3">
                                <label for="diagnosa_penyakit_display" class="form-label">Feedback terkait hasil diagnosa untuk:</label>
                                <input type="text" class="form-control" id="diagnosa_penyakit_display" value="{{ $diagnosaNamaPenyakit }} (Kode: {{ $diagnosaKodePenyakit }})" readonly disabled>
                                <input type="hidden" name="diagnosa_penyakit_kode" value="{{ $diagnosaKodePenyakit }}">
                            </div>
                        @else
                            <input type="hidden" name="diagnosa_penyakit_kode" value="">
                        @endif

                        <div class="mb-3">
                            <label for="komentar" class="form-label">Komentar/Masukan Anda <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="5" placeholder="Tuliskan masukan, saran, atau laporan Anda di sini mengenai sistem atau hasil diagnosa..." required>{{ old('komentar') }}</textarea>
                            <div class="form-text">Masukan Anda sangat berharga untuk pengembangan sistem ini.</div>
                        </div>
                        <button type="submit" class="btn btn-submit-feedback">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Masukan
                        </button>
                    </form>
                </div>
            </div>
        </div>
<div class="modal fade" id="feedbackSuccessModal" tabindex="-1" aria-labelledby="feedbackSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-custom">
            <div class="modal-header modal-header-custom">
                <h5 class="modal-title" id="feedbackSuccessModalLabel">Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-custom">
                <i class="fas fa-check-circle"></i>
                @if(Session::has('feedback_success_message'))
                    <p>{{ Session::get('feedback_success_message') }}</p>
                @else
                    <p>Terima kasih! Masukan Anda telah berhasil dikirim.</p>
                @endif
            </div>
            <div class="modal-footer modal-footer-custom">
                <a href="{{ route('diagnosa.feedback.form') }}" class="btn btn-outline-primary"><i class="fas fa-plus-circle me-1"></i> Kirim Masukan Lain</a>
                <a href="{{ route('diagnosa.start') }}" class="btn btn-primary"><i class="fas fa-home me-1"></i> Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    @if(Session::has('showSuccessModal') && Session::get('showSuccessModal') == true)
        document.addEventListener('DOMContentLoaded', function() {
            var feedbackModalElement = document.getElementById('feedbackSuccessModal');
            if (feedbackModalElement) {
                var myModal = new bootstrap.Modal(feedbackModalElement);
                myModal.show();
            }
        });
        @php
            Session::forget('showSuccessModal');
            Session::forget('feedback_success_message');
        @endphp
    @endif
</script>
@endpush