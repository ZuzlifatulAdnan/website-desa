<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', $desa->footer_deskripsi ?? 'Website resmi ' . ($desa->nama_desa ?? 'Desa'))">
    <title>@yield('title') - {{ $desa->nama_web ?? 'Portal Desa' }}</title>

    <link rel="icon" href="{{ $desa?->favicon_url ?? asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary-green: {{ $desa->warna_primary ?? '#22c55e' }};
            --dark-green: {{ $desa->warna_secondary ?? '#15803d' }};
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('components.topbar')
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('assets/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
