<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
    <title>Dashboard Admin - @yield('title', 'Sistem Pakar Diagnosa Penyakit ISPA')</title>
</head>
<body>
    <x-sidebar></x-sidebar>
    <main>
        @yield('content')
    </main>
</body>
</html>