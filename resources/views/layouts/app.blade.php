<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIPINTAR - Kemendikdasmen</title>

    <!-- Font Awesome CDN (Untuk memuat seluruh icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Memuat CSS & JS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-sans text-slate-800 antialiased">

    @auth
        <!-- LAYOUT SETELAH LOGIN (Sidebar + Content) -->
        <div class="flex min-h-screen">
            
            <!-- Memanggil Component Sidebar -->
            @include('layouts.sidebar')

            <!-- Area Konten Utama -->
            <main class="flex-1 p-6 lg:p-8">
                @yield('content')
            </main>

        </div>
    @else
        <!-- LAYOUT SEBELUM LOGIN -->
        <div class="min-h-screen bg-slate-900 text-white">
            @yield('content')
        </div>
    @endauth

</body>

</html>