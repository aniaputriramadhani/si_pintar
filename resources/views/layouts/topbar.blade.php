<nav class="topbar glass-card">

<!-- KIRI -->
<div class="d-flex align-items-center gap-3">

    <div>
        <h3 class="mb-0 fw-bold text-white">
            Dashboard
        </h3>

        <small style="color:rgba(255,255,255,.65)">
            Selamat Datang, {{ auth()->user()->name ?? 'Guest' }}
        </small>
    </div>

</div>

<!-- KANAN -->
<div class="d-flex align-items-center justify-content-end gap-3 flex-grow-1">
    <!-- Search -->
    <div class="position-relative">

        <i class="bi bi-search position-absolute"
           style="
           left:18px;
           top:50%;
           transform:translateY(-50%);
           color:rgba(255,255,255,.55);
           ">
        </i>

        <input
            type="text"
            class="search-box ps-5"
            placeholder="Cari Program...">

    </div>

    <!-- Notification -->
    <button class="btn glass-card border-0 rounded-circle d-flex align-items-center justify-content-center"
            style="width:54px;height:54px;">

        <i class="bi bi-bell-fill text-white"></i>

    </button>

    @auth
        <!-- PROFILE -->
        <div class="glass-card profile-card">

        @if(auth()->user()->photo)
            <img src="{{ asset('storage/'.auth()->user()->photo) }}" class="profile-img">
        @else
            <div class="profile-fallback">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>
        @endif

        <div class="profile-info">
            <div class="name">
                {{ auth()->user()->name }}
            </div>

            <small>Administrator</small>
        </div>

    </div>

        <!-- Logout -->
        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit" class="btn-glass d-flex align-items-center gap-2">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </button>

        </form>
    @else
        <a href="{{ route('login') }}" class="btn-glass d-flex align-items-center gap-2">
            <i class="bi bi-box-arrow-in-right"></i>
            Login
        </a>
    @endauth

</div>

</nav>