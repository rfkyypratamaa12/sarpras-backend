<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header-title', 'Dashboard Aplikasi')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Tambahkan Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    @livewireStyles

    <style>
        /* Gaya kustom untuk latar belakang biru yang lembut */
        body {
            background: linear-gradient(to bottom right, #e0f2f7, #bbdefb); /* Gradien biru muda ke biru langit */
            min-height: 100vh; /* Memastikan gradien menutupi seluruh tinggi viewport */
        }
    </style>
</head>
<body class="font-sans antialiased">
    @yield('content')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // Durasi animasi dalam milidetik
            easing: 'ease-out-cubic', // Fungsi easing default untuk animasi AOS
            once: true, // Apakah animasi hanya terjadi sekali saat scrolling
        });
    </script>

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
