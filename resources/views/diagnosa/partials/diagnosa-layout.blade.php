<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Pakar ISPA')</title>
    <link rel="icon" href="{{ asset('logo-ispa.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('logo-ispa.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body, html {
            min-height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F4F7FC;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background-color: #FFFFFF;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            flex-shrink: 0;
            padding: 0.8rem 1rem;
        }
        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.25rem;
            color: #3B3A5E !important;
        }
        .navbar-brand-custom .fa-stethoscope {
            color: #6C63FF;
        }

        .btn-nav-outline {
            border: 2px solid #6C63FF;
            color: #6C63FF;
            font-weight: 500;
            padding: 0.45rem 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        .btn-nav-outline:hover,
        .btn-nav-outline.active {
            background-color: #6C63FF;
            color: #FFFFFF;
            box-shadow: 0 2px 8px rgba(108, 99, 255, 0.3);
        }

        .btn-login-custom {
            background-color: #6C63FF;
            border: 2px solid #6C63FF;
            color: #FFFFFF;
            font-weight: 600;
            padding: 0.45rem 1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        .btn-login-custom:hover {
            background-color: #5750d6;
            border-color: #5750d6;
            box-shadow: 0 2px 8px rgba(87, 80, 214, 0.4);
        }
        
        .main-content-wrapper {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 2rem 1rem;
            width: 100%;
        }

        .footer-custom {
            background-color: #FFFFFF;
            color: #4A5568;
            padding: 2rem 0;
            text-align: center;
            font-size: 0.875rem;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.06);
            flex-shrink: 0;
            line-height: 1.6;
        }
        .footer-custom .footer-title {
            font-weight: 600;
            color: #3B3A5E;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
        .footer-custom p {
            margin-bottom: 0.25rem;
        }
        .footer-custom .contact-info a {
            color: #6C63FF;
            text-decoration: none;
            font-weight: 500;
        }
        .footer-custom .contact-info a:hover {
            text-decoration: underline;
        }
        .footer-custom .copyright {
            margin-top: 1rem;
            font-size: 0.8rem;
            color: #718096;
        }

        @stack('styles')
    </style>
</head>
<body>

    @include('diagnosa.partials.navbar')

    <main class="main-content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="footer-title">Sistem Pakar Diagnosa ISPA</p>
                    <p>Proyek Mata Kuliah Sistem Pakar</p>
                    <p>[Universitas Jenderal Soedirman / Fakultas Teknik / Informatika]</p>
                    <p class="copyright">&copy; {{ date('Y') }} - Untuk Keperluan Akademis.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>