<nav class="navbar navbar-expand-lg navbar-custom navbar-light sticky-top">    <div class="container">
        <a class="navbar-brand navbar-brand-custom d-flex align-items-center" href="{{ route('diagnosa.start') }}">
            <img src="{{ asset('logo-ispa.png') }}" alt="Logo Sistem Pakar ISPA" style="height: 30px; margin-right: 10px;">
            <span>Sistem Pakar <strong style="color: #6C63FF;">ISPA</strong></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-2">
                    <a class="btn btn-nav-outline @if(Route::currentRouteName() == 'diagnosa.start' || Request::is('/')) active @endif" href="{{ route('diagnosa.start') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item me-2">
                    <a class="btn btn-nav-outline @if(Str::startsWith(Route::currentRouteName(), 'artikel.')) active @endif" href="{{ route('artikel.index') }}">
                        <i class="fas fa-book-medical me-1"></i> Artikel ISPA
                    </a>
                </li>
                <li class="nav-item me-2">
                    <a class="btn btn-nav-outline @if(Str::startsWith(Route::currentRouteName(), 'rumahsakit.')) active @endif" href="{{ route('rumahsakit.index') }}">
                        <i class="fas fa-hospital-user me-1"></i> Daftar Faskes
                    </a>
                </li>
                <li class="nav-item me-2">
                    <a class="btn btn-nav-outline @if(Route::currentRouteName() == 'diagnosa.feedback.form') active @endif" href="{{ route('diagnosa.feedback.form') }}">
                        <i class="fas fa-comment-dots me-1"></i> Feedback
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>