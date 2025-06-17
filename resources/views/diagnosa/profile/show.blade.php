@extends('diagnosa.partials.diagnosa-layout')

@section('title', 'Profil Akun Saya - Sistem Pakar ISPA')

@push('styles')
<style>
    .page-header-profile {
        background: linear-gradient(135deg, #6C63FF 0%, #4f46e5 100%);
        color: white;
        padding: 2.5rem 0;
        margin-bottom: -3rem;
        border-radius: 0 0 25px 25px;
        position: relative;
        z-index: 1;
    }
    .page-header-profile h1 {
        font-weight: 700;
        font-size: 2.3rem;
    }
    .profile-container {
        background-color: #FFFFFF;
        padding: 2.5rem 3rem;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,.1);
        width: 100%;
        margin-top: 0; 
        position: relative;
        z-index: 2;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: #e8e6ff;
        color: #6C63FF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        margin: -80px auto 1.5rem auto;
        border: 5px solid #FFFFFF;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .profile-name {
        font-size: 1.8rem;
        font-weight: 600;
        color: #3B3A5E;
        margin-bottom: 0.25rem;
    }
    .profile-email {
        font-size: 1rem;
        color: #555E6D;
        margin-bottom: 2rem;
    }
    .profile-section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #6C63FF;
        margin-top: 2rem;
        margin-bottom: 1.2rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e8e6ff;
    }
    .info-item {
        margin-bottom: 1.1rem;
        font-size: 1rem;
        display: flex;
        align-items: flex-start;
    }
    .info-item .icon {
        color: #6C63FF;
        margin-right: 12px;
        width: 22px;
        text-align: center;
        font-size: 1.1rem;
        margin-top: 0.2rem; 
    }
    .info-item .info-content .info-label {
        font-weight: 600;
        color: #3B3A5E;
        display: block;
        margin-bottom: 0.1rem;
    }
    .info-item .info-content .info-value, 
    .info-item .info-content .info-value a {
        color: #555E6D;
        line-height: 1.6;
    }
    .info-item .info-content .info-value a {
        text-decoration: none;
        color: #6C63FF;
        font-weight: 500;
    }
    .info-item .info-content .info-value a:hover {
        text-decoration: underline;
    }
    .btn-edit-profile, .btn-change-password {
        background-color: #6C63FF;
        border-color: #6C63FF;
        color: #FFFFFF;
        font-weight: 500;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 0.5rem;
    }
    .btn-edit-profile:hover, .btn-change-password:hover {
        background-color: #5750d6;
        border-color: #5750d6;
        transform: translateY(-2px);
    }
    .placeholder-text {
        color: #718096;
        font-style: italic;
    }
    .history-item {
        padding: 0.75rem 0;
        border-bottom: 1px dashed #eee;
    }
    .history-item:last-child {
        border-bottom: none;
    }
    .history-item .date {
        font-weight: 500;
        color: #3B3A5E;
    }
    .history-item .result {
        color: #6C63FF;
        font-weight: 600;
    }

    @media (max-width: 767.98px) {
        .profile-container { padding: 2rem 1.5rem; }
        .profile-avatar { width: 100px; height: 100px; font-size: 2.5rem; margin-top: -70px;}
        .page-header-profile h1 { font-size: 1.8rem; }
        .profile-name { font-size: 1.5rem; }
        .info-item { flex-direction: column; align-items: flex-start;}
        .info-item .icon { margin-bottom: 0.3rem; }
    }
</style>
@endpush

@section('content')
<div class="w-100">
    <div class="page-header-profile text-center">
        <div class="container">
            <h1>Profil Akun Saya</h1>
        </div>
    </div>
    <br><br>
    <div class="container mt-n5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="profile-container" data-aos="fade-up">
                    <div class="text-center">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        
                        <h2 class="profile-name">{{ $namaProfil ?? 'Pengguna Tamu' }}</h2>
                        @if(isset($emailProfil) && $emailProfil)
                            <p class="profile-email"><i class="fas fa-envelope me-1 opacity-75"></i> {{ $emailProfil }}</p>
                        @else
                            <p class="profile-email placeholder-text"><em>Email tidak tersedia</em></p>
                        @endif
                    </div>

                    <div class="mt-4">
                        <div class="profile-section-title">Informasi Akun</div>
                        <div class="info-item">
                            <i class="fas fa-user-tag icon"></i>
                            <div class="info-content">
                                <span class="info-label">Nama Lengkap:</span>
                                <span class="info-value">{{ $namaProfil ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope icon"></i>
                            <div class="info-content">
                                <span class="info-label">Email Terdaftar:</span>
                                <span class="info-value">{{ $emailProfil ?? 'Tidak ada data email akun.' }}</span>
                            </div>
                        </div>
                        @if(isset($usiaProfil) && $usiaProfil)
                        <div class="info-item">
                            <i class="fas fa-birthday-cake icon"></i>
                            <div class="info-content">
                                <span class="info-label">Usia (dari sesi diagnosa terakhir):</span>
                                <span class="info-value">{{ $usiaProfil }} tahun</span>
                            </div>
                        </div>
                        @endif
                        
                        <div class="profile-section-title">Keamanan</div>
                        <div class="info-item">
                            <i class="fas fa-key icon"></i>
                            <div class="info-content">
                                <span class="info-label">Password:</span>
                                <span class="info-value">Dilindungi (********) 
                                </span>
                            </div>
                        </div>

<div class="profile-section-title">Riwayat Diagnosa</div>
                        <div class="info-item">
                            <i class="fas fa-history icon"></i>
                            <div class="info-content w-100">
                                @if(isset($riwayatDiagnosaUser) && $riwayatDiagnosaUser->count() > 0)
                                    <ul class="history-list">
                                        @foreach($riwayatDiagnosaUser as $riwayat)
                                            <li class="history-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <span class="date"><i class="fas fa-calendar-alt me-1"></i> {{ $riwayat->created_at->format('d F Y, H:i') }}</span>
                                                        <div class="result">Hasil: <span class="penyakit-name">{{ $riwayat->penyakit->penyakit ?? 'Penyakit tidak diketahui' }}</span></div>
                                                    </div>
                                                    <a href="{{ route('user.riwayat.detail', $riwayat->id) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye me-1"></i> Detail
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="mt-3 d-flex justify-content-center">
                                        {{ $riwayatDiagnosaUser->links('pagination::bootstrap-4') }}
                                    </div>
                                @else
                                    <span class="info-value placeholder-text"><em>Belum ada riwayat diagnosa yang tersimpan.</em></span>
                                @endif
                            </div>
                        </div>
                        
                    <div class="mt-4 pt-3 text-center border-top">
                        <form method="POST" action="{{ route('admin.logout') }}" id="logout-form-profile" class="d-inline">
                            @csrf
                            <a class="btn btn-danger" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form-profile').submit();">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout dari Akun
                            </a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection