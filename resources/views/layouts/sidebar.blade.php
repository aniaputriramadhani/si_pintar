<div class="sidebar">

    <!-- Logo -->
    <div class="sidebar-logo">

        <img src="{{ asset('images/logo.png') }}" alt="Logo">

        <div>
            <h3>SIPINTAR</h3>
            <p>Program Indonesia Pintar</p>
        </div>

    </div>

    <!-- Menu -->

    <div class="menu-title">
        MAIN MENU
    </div>

    <a href="{{ route('dashboard') }}"
       class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

        <i class="bi bi-grid-1x2-fill"></i>

        <span>Dashboard</span>

    </a>

    <a href="{{ route('program.index') }}"
       class="menu-item {{ request()->routeIs('program.*') ? 'active' : '' }}">

        <i class="bi bi-journal-bookmark-fill"></i>

        <span>Data Program</span>

    </a>

    <a href="{{ route('pip.dinas') }}"
   class="menu-item {{ request()->routeIs('pip.dinas') ? 'active' : '' }}">
    <i class="bi bi-table"></i>
    <span>Data PIP</span>
    </a>


    <a href="{{ route('verifikasi.dinas') }}"
   class="menu-item {{ request()->routeIs('verifikasi.dinas') ? 'active' : '' }}">
    <i class="bi bi-check2-square"></i>
    <span>Verifikasi</span>
    </a>


    <a href="{{ route('pemantauan.dinas') }}"
   class="menu-item {{ request()->routeIs('pemantauan.dinas') ? 'active' : '' }}">
    <i class="bi bi-eye-fill"></i>
    <span>Pemantauan</span>
</a>


    <div class="menu-title mt-4">
        SYSTEM
    </div>

    <a href="#" class="menu-item">

        <i class="bi bi-gear-fill"></i>

        <span>Pengaturan</span>

    </a>

    <a href="{{ route('profile.edit') }}"
   class="menu-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">

    <i class="bi bi-person-circle"></i>

    <span>Profile</span>

</a>

    <!-- Footer -->

    <div class="mt-auto pt-5">

        <div class="glass-card p-3 text-center">

            <div class="mb-2">
                <i class="bi bi-shield-check text-info fs-2"></i>
            </div>

            <h6 class="mb-1 text-white fw-bold">
                SIPINTAR
            </h6>

            <small style="color:rgba(255,255,255,.7)">
                Dashboard Modern 2026
            </small>

        </div>

    </div>

</div>