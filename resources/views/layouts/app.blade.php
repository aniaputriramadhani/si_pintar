<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kemendikdasmen</title>

    <!-- Memuat CSS & JS via Vite (Pastikan npm run dev menyala) -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

    @auth
        <!-- Jika sudah login, tampilkan Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <div class="login-logo">K</div>
                <div>
                    <h3>Kemendikdas</h3>
                    <p>Admin Dashboard</p>
                </div>
            </div>
            
            <div class="menu-title">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <!-- Tambahkan menu sidebar lainnya di sini jika ada -->
        </div>
    @endauth

    <!-- Area Konten Utama -->
    <div class="@auth content @else container py-5 @endauth">
        
        @auth
            <!-- Topbar khusus untuk halaman Admin yang sudah login -->
            <div class="topbar">
                <div>
                    <h4 class="fw-bold mb-0">Dashboard</h4>
                    <small class="text-white-50">Selamat datang kembali!</small>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-glass btn-sm">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- Navbar atas standar jika belum login -->
            <nav class="topbar mb-4">
                <a class="navbar-brand fw-bold text-white text-decoration-none fs-4" href="/">
                    Kemendikdasmen
                </a>
                <div>
                    <a href="{{ route('login') }}" class="btn-glass text-decoration-none">
                        Login
                    </a>
                </div>
            </nav>
        @endauth

        <!-- Konten Halaman Dinamis -->
        @yield('content')

    </div>

</body>

</html>