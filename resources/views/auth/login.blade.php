<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman masuk pengelola SIPINTAR.">
    <title>Masuk Pengelola | SIPINTAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #071a33;
            --blue: #0055FF;
            --aqua: #5ee8d6;
            --paper: #f8fafc;
        }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: var(--paper); font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        .mono { font-family: 'DM Mono', monospace; }

        /* Accessibility */
        .skip-link { position: fixed; z-index: 100; left: 1rem; top: -5rem; border-radius: .75rem; background: var(--blue); color: white; padding: 1rem 1.25rem; font-weight: 800; font-size: 1.125rem; box-shadow: 0 10px 30px rgba(0,85,255,0.4); transition: top 0.3s ease; }
        .skip-link:focus { top: 1rem; }

        /* Backgrounds (Light & Lansia Friendly) */
        .hero { background: linear-gradient(118deg, #f5fbff 0%, #e4f4ff 50%, #eefcf8 100%); isolation: isolate; }
        .hero::before { content: ''; position: absolute; inset: 0; z-index: -2; opacity: .48; background-image: linear-gradient(#1479ff14 1px, transparent 1px), linear-gradient(90deg, #1479ff14 1px, transparent 1px); background-size: 54px 54px; mask-image: linear-gradient(to bottom, black, transparent 88%); }
        .hero::after { content: ''; position: absolute; z-index: -1; right: -14vw; top: -38vh; height: 88vw; width: 88vw; max-width: 1200px; max-height: 1200px; border-radius: 999px; background: radial-gradient(circle at 42% 45%, #c8ebff 0 14%, #9fd8ff 33%, #d6f7ee 56%, transparent 71%); filter: blur(3px); opacity: .95; }

        .halo-blue-bottom { position: absolute; border-radius: 50%; background: radial-gradient(circle, rgba(0,85,255,0.12) 0%, transparent 70%); filter: blur(40px); }

        /* === AREA MASKOT DI SISI KIRI & DEKAT DENGAN BUBBLE === */
        .mascot-group-wrapper { display: flex; flex-direction: column; align-items: flex-start; margin-top: 1.5rem; position: relative; z-index: 20; pointer-events: none; }
        
        /* Bubble text disesuaikan jaraknya agar dekat dengan karakter */
        .mascot-bubble {
            position: relative;
            margin-bottom: 0.5rem;
            margin-left: 1rem;
            max-width: 18rem;
            border: 2px solid #bfdbfe;
            border-radius: 1.1rem 1.1rem 1.1rem .25rem;
            background: rgba(255,255,255,.95);
            padding: .6rem .85rem;
            color: #071a33;
            font-size: .85rem;
            font-weight: 800;
            line-height: 1.35;
            box-shadow: 0 8px 18px rgba(0,85,255,.1);
            transition: all 0.3s ease;
        }

        .mascots-container { display: flex; align-items: flex-end; gap: 0.6rem; }

        .char { position: relative; transition: transform 0.3s ease; }
        .char-shadow { position: absolute; bottom: -0.4rem; left: 50%; transform: translateX(-50%); height: 0.7rem; border-radius: 50%; background: rgba(0, 85, 255, .15); filter: blur(3px); }

        /* Karakter 1: Lingkaran Biru */
        .char-ball { width: 5.5rem; height: 5.5rem; animation: mascot-float 5s ease-in-out infinite; }
        .char-ball .body { width: 100%; height: 100%; border-radius: 50%; background: #3b82f6; border: 3px solid #1d4ed8; position: relative; box-shadow: inset -3px -3px 0px rgba(0,0,0,0.1); }
        .char-ball .antenna { position: absolute; top: -0.5rem; left: 50%; transform: translateX(-50%); width: 0.6rem; height: 0.6rem; border-radius: 50%; background: #93c5fd; }
        .char-ball .highlight { position: absolute; top: 0.8rem; left: 1rem; width: 1rem; height: 0.5rem; border-radius: 50%; background: rgba(255,255,255,0.4); transform: rotate(-30deg); }
        .char-ball .cheek { position: absolute; bottom: 1.2rem; width: 0.85rem; height: 0.85rem; border-radius: 50%; background: #f472b6; opacity: 0.6; }
        .char-ball .cheek.left { left: 0.6rem; }
        .char-ball .cheek.right { right: 0.6rem; }
        .char-ball .char-shadow { width: 4.8rem; }

        /* Karakter 2: Kotak Ungu */
        .char-square { width: 5.5rem; height: 5.5rem; animation: mascot-float 5.4s ease-in-out infinite 0.4s; }
        .char-square .body { width: 100%; height: 100%; border-radius: 1.5rem; background: #8b5cf6; border: 3px solid #5b21b6; position: relative; box-shadow: inset -3px -3px 0px rgba(0,0,0,0.1); }
        .char-square .highlight { position: absolute; top: 0.8rem; left: 1rem; width: 1rem; height: 0.5rem; border-radius: 50%; background: rgba(255,255,255,0.4); transform: rotate(-30deg); }
        .char-square .cheek { position: absolute; bottom: 1.2rem; width: 0.85rem; height: 0.85rem; border-radius: 50%; background: #f472b6; opacity: 0.6; }
        .char-square .cheek.left { left: 0.6rem; }
        .char-square .cheek.right { right: 0.6rem; }
        .char-square .char-shadow { width: 4.8rem; }

        /* Karakter 3: Hantu Cyan */
        .char-ghost { width: 5.5rem; height: 5.8rem; animation: mascot-float 4.6s ease-in-out infinite 0.8s; }
        .char-ghost .body { width: 100%; height: 100%; border-radius: 2.5rem 2.5rem 0 0; background: #06b6d4; border: 3px solid #0e7490; border-bottom: none; position: relative; box-shadow: inset -3px -3px 0px rgba(0,0,0,0.1); }
        .char-ghost .skirt { display: flex; position: absolute; bottom: -0.5rem; left: -3px; right: -3px; height: 0.7rem; }
        .char-ghost .wave { flex: 1; background: #06b6d4; border-bottom: 3px solid #0e7490; border-radius: 0 0 50% 50%; }
        .char-ghost .highlight { position: absolute; top: 0.8rem; left: 1rem; width: 1rem; height: 0.5rem; border-radius: 50%; background: rgba(255,255,255,0.4); transform: rotate(-30deg); }
        .char-ghost .cheek { position: absolute; bottom: 1.5rem; width: 0.85rem; height: 0.85rem; border-radius: 50%; background: #a5f3fc; opacity: 0.8; }
        .char-ghost .cheek.left { left: 0.6rem; }
        .char-ghost .cheek.right { right: 0.6rem; }
        .char-ghost .char-shadow { width: 4.5rem; }

        /* Mata Universal untuk 3 Karakter */
        .eyes-container { position: absolute; top: 1.8rem; left: 50%; transform: translateX(-50%); display: flex; gap: 0.8rem; z-index: 2; }
        .eye { width: 1.3rem; height: 1.5rem; background: white; border-radius: 50%; border: 2px solid #071a33; position: relative; overflow: hidden; transition: all 0.2s ease; }
        .pupil { width: 0.55rem; height: 0.55rem; background: #071a33; border-radius: 50%; position: absolute; top: 0.3rem; left: 0.25rem; transition: transform 0.08s linear; }
        .pupil::after { content: ''; position: absolute; top: 0.08rem; right: 0.08rem; width: 0.18rem; height: 0.18rem; background: white; border-radius: 50%; }
        .mouth { position: absolute; bottom: 1rem; left: 50%; transform: translateX(-50%); width: 1rem; height: 0.4rem; border-bottom: 2.5px solid #071a33; border-radius: 0 0 0.8rem 0.8rem; transition: all 0.2s ease; }

        @keyframes mascot-float { 50% { transform: translateY(-6px); } }

        /* State Interaktif Maskot */
        .cover-eyes .eye { height: 0.25rem; top: 0.6rem; border-radius: 4px; background: #071a33; }
        .cover-eyes .pupil { opacity: 0; }
        .cover-eyes .mouth { width: 0.7rem; height: 0.25rem; border-radius: 0 0 0.3rem 0.3rem; }

        .excited { transform: scale(1.08) translateY(-4px) !important; }
        .excited .mouth { width: 1.2rem; height: 0.6rem; background: #071a33; border-radius: 0 0 0.8rem 0.8rem; }

        @media (prefers-reduced-motion: reduce) { .char { animation: none; } .pupil { transition: none; } }
    </style>
</head>
<body class="hero min-h-screen overflow-x-hidden text-[#071a33] relative">
    <a href="#login-form" class="skip-link">Lewati ke formulir masuk</a>

    <div class="halo-blue-bottom -bottom-40 -left-32 h-[32rem] w-[32rem]"></div>
    <div class="halo-blue-bottom -top-40 -right-24 h-[34rem] w-[34rem]"></div>

    <main class="mx-auto flex min-h-screen max-w-[1600px] items-center px-4 py-6 sm:px-8 lg:px-12">
        <section class="grid w-full overflow-hidden rounded-[2.5rem] border border-white/80 bg-white/85 shadow-[0_30px_100px_rgba(0,85,255,.12)] backdrop-blur-2xl lg:min-h-[740px] lg:grid-cols-[1.05fr_0.95fr]" aria-labelledby="login-title">

            <!-- Panel Sisi Kiri (Informasi / Branding) -->
            <aside class="relative hidden overflow-hidden bg-gradient-to-br from-blue-50/80 via-white to-teal-50/50 p-10 lg:flex lg:flex-col xl:p-16 justify-between border-r border-slate-100">
                <div class="absolute inset-0 opacity-[.07]" style="background-image: radial-gradient(#0055FF 1.5px, transparent 1.5px); background-size: 26px 26px;"></div>
                
                <div class="absolute -right-4 top-20 h-80 w-80 rounded-full border border-blue-200 shadow-[0_0_0_36px_rgba(0,85,255,.04),0_0_0_82px_rgba(0,85,255,.025)] z-0 pointer-events-none"></div>

                <a href="{{ route('public.home') }}" class="relative z-25 inline-flex w-fit items-center gap-3 rounded-2xl border-2 border-slate-200 bg-white px-5 py-3 text-lg font-bold text-[#071a33] transition hover:border-[#0055FF] hover:text-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200 shadow-sm">
                    <span aria-hidden="true">←</span> Kembali ke beranda
                </a>

                <!-- KONTEN UTAMA & MASKOT DI SEBELAH KIRI -->
                <div class="relative z-25 my-auto max-w-[30rem] pt-6 pb-4">
                    <div class="inline-flex items-center gap-3 rounded-full border-2 border-blue-200 bg-blue-50 px-5 py-2.5 text-base font-extrabold text-[#0055FF]">
                        <span class="h-3 w-3 rounded-full bg-[#0055FF]"></span> Portal Pengelola Resmi
                    </div>
                    <h1 class="mt-6 text-5xl font-extrabold leading-[1.15] tracking-tight text-[#071a33]">Pendidikan yang <span class="text-[#0055FF]">lebih dekat</span> untuk setiap mimpi.</h1>
                    <p class="mt-4 text-lg font-medium leading-relaxed text-slate-700">Akses layanan SIPINTAR untuk mendukung pengelolaan Program Indonesia Pintar yang transparan, akurat, dan terpadu.</p>

                    <!-- MASKOT DENGAN BUBBLE DEKAT DI SEBELAH KIRI -->
                    <div class="mascot-group-wrapper" aria-hidden="true">
                        <div id="mascot-bubble" class="mascot-bubble">Halo! Silakan masukkan NPSN atau NIP pengelola.</div>
                        
                        <div class="mascots-container">
                            <!-- Karakter 1: Lingkaran Biru -->
                            <div class="char char-ball">
                                <div class="char-shadow"></div>
                                <div class="body">
                                    <div class="antenna"></div>
                                    <div class="highlight"></div>
                                    <div class="eyes-container">
                                        <div class="eye"><span class="pupil"></span></div>
                                        <div class="eye"><span class="pupil"></span></div>
                                    </div>
                                    <div class="cheek left"></div><div class="cheek right"></div>
                                    <div class="mouth"></div>
                                </div>
                            </div>

                            <!-- Karakter 2: Kotak Ungu -->
                            <div class="char char-square">
                                <div class="char-shadow"></div>
                                <div class="body">
                                    <div class="highlight"></div>
                                    <div class="eyes-container">
                                        <div class="eye"><span class="pupil"></span></div>
                                        <div class="eye"><span class="pupil"></span></div>
                                    </div>
                                    <div class="cheek left"></div><div class="cheek right"></div>
                                    <div class="mouth"></div>
                                </div>
                            </div>

                            <!-- Karakter 3: Hantu Cyan -->
                            <div class="char char-ghost">
                                <div class="char-shadow"></div>
                                <div class="body">
                                    <div class="highlight"></div>
                                    <div class="eyes-container">
                                        <div class="eye"><span class="pupil"></span></div>
                                        <div class="eye"><span class="pupil"></span></div>
                                    </div>
                                    <div class="cheek left"></div><div class="cheek right"></div>
                                    <div class="mouth"></div>
                                    <div class="skirt">
                                        <div class="wave"></div>
                                        <div class="wave"></div>
                                        <div class="wave"></div>
                                        <div class="wave"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- AREA BAWAH: Garis Pembatas & Logo -->
                <div class="relative z-25 pt-4">
                    <div class="flex items-center gap-4 border-t-2 border-slate-200 pt-6">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTf5Lnv2E_oo89ZPXgYmtlMEk8q_gIvjwmgY4Jxe_e7YA&s=10" alt="Logo SIPINTAR" class="h-14 w-14 object-cover rounded-2xl shadow-md">
                        <div>
                            <p class="text-2xl font-extrabold tracking-tight text-[#071a33]">SIPINTAR</p>
                            <p class="text-base font-bold text-[#0055FF]">KEMENDIKDASMEN RI</p>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Panel Sisi Kanan (Formulir Masuk) -->
            <div class="relative flex min-h-[680px] items-center bg-white p-8 sm:p-12 lg:p-16 xl:p-20">
                <a href="{{ route('public.home') }}" class="absolute left-8 top-8 inline-flex items-center gap-2 rounded-xl border-2 border-slate-200 bg-white px-4 py-2.5 text-base font-bold text-[#071a33] transition hover:border-[#0055FF] hover:text-[#0055FF] focus:outline-none focus:ring-4 focus:ring-blue-200 lg:hidden">
                    <span aria-hidden="true">←</span> Beranda
                </a>

                <div class="mx-auto w-full max-w-md pt-8 lg:pt-0">
                    <div class="mb-8">
                        <span class="text-sm font-extrabold uppercase tracking-wider text-[#0055FF]">Autentikasi Akun</span>
                        <h2 id="login-title" class="mt-2 text-4xl font-extrabold tracking-tight text-[#071a33]">Selamat Datang</h2>
                        <p class="mt-2 text-lg font-medium text-slate-600">Masukkan ID pengguna dan kata sandi untuk masuk.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border-2 border-red-200 bg-red-50 p-4 text-base font-bold text-red-600">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form id="login-form" action="{{ route('login.post') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="username" class="mb-2 block text-lg font-bold text-[#071a33]">ID Pengguna <span class="text-red-600">*</span></label>
                            <p id="username-help" class="mb-2 text-base font-medium text-slate-600">Gunakan NPSN atau NIP Anda.</p>
                            <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" required autofocus aria-describedby="username-help" placeholder="Masukkan NPSN atau NIP" class="h-16 w-full rounded-2xl border-2 border-slate-300 bg-slate-50 px-5 text-lg font-bold text-[#071a33] placeholder:font-medium placeholder:text-slate-400 transition focus:border-[#0055FF] focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-200">
                        </div>

                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label for="password" class="block text-lg font-bold text-[#071a33]">Kata Sandi <span class="text-red-600">*</span></label>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Masukkan kata sandi" class="h-16 w-full rounded-2xl border-2 border-slate-300 bg-slate-50 px-5 text-lg font-bold text-[#071a33] placeholder:font-medium placeholder:text-slate-400 transition focus:border-[#0055FF] focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-200">
                        </div>

                        <div class="flex items-center justify-between py-2">
                            <label for="remember" class="flex cursor-pointer items-center gap-3 text-lg font-bold text-slate-800">
                                <input id="remember" name="remember" type="checkbox" value="1" class="h-6 w-6 rounded border-slate-300 text-[#0055FF] focus:ring-2 focus:ring-blue-300">
                                Ingat Saya
                            </label>
                            <a href="#" class="text-lg font-bold text-[#0055FF] transition hover:underline">Lupa Kata Sandi?</a>
                        </div>

                        <button type="submit" class="inline-flex h-16 w-full items-center justify-center gap-2 rounded-2xl bg-[#0055FF] px-6 text-xl font-extrabold text-white shadow-lg shadow-blue-500/25 transition-all hover:bg-[#0044cc] hover:shadow-xl hover:shadow-blue-500/35 focus:outline-none focus:ring-4 focus:ring-blue-200">
                            Masuk ke Portal <span aria-hidden="true">→</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Script Lengkap Interaksi 3 Maskot -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const characters = document.querySelectorAll('.char');
        const bubble = document.getElementById('mascot-bubble');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        if (!characters.length) return;

        // 1. Gerak Bola Mata Semua Karakter Mengikuti Kursor
        if (window.matchMedia('(pointer: fine)').matches && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            const pupils = document.querySelectorAll('.pupil');
            let cursorX = window.innerWidth / 2, cursorY = window.innerHeight / 2, pending = false;
            
            const followCursor = () => {
                if (passwordInput && passwordInput === document.activeElement) return;

                pupils.forEach((pupil) => {
                    const eye = pupil.parentElement.getBoundingClientRect();
                    const angle = Math.atan2(cursorY - (eye.top + eye.height / 2), cursorX - (eye.left + eye.width / 2));
                    pupil.style.transform = `translate(${Math.cos(angle) * 4}px, ${Math.sin(angle) * 4}px)`;
                });
                pending = false;
            };

            window.addEventListener('pointermove', (event) => {
                cursorX = event.clientX; cursorY = event.clientY;
                if (!pending) { pending = true; requestAnimationFrame(followCursor); }
            }, { passive: true });
        }

        // 2. Interaksi Input Username
        if (usernameInput) {
            usernameInput.addEventListener('input', () => {
                if (usernameInput.value.length > 3) {
                    characters.forEach(char => char.classList.add('excited'));
                    if (bubble) bubble.textContent = "ID Pengguna valid! Lanjutkan mengisi kata sandi.";
                } else {
                    characters.forEach(char => char.classList.remove('excited'));
                    if (bubble) bubble.textContent = "Silakan masukkan NPSN atau NIP pengelola.";
                }
            });

            usernameInput.addEventListener('focus', () => {
                if (bubble) bubble.textContent = "Kami siap membantu proses masuk Anda!";
                characters.forEach(char => char.classList.remove('cover-eyes'));
            });
        }

        // 3. Interaksi Input Password (Semua Tutup Mata / Malu)
        if (passwordInput) {
            passwordInput.addEventListener('focus', () => {
                characters.forEach(char => {
                    char.classList.add('cover-eyes');
                    char.classList.remove('excited');
                });
                if (bubble) bubble.textContent = "Ssst! Kami tidak mengintip kata sandi Anda.";
            });

            passwordInput.addEventListener('blur', () => {
                characters.forEach(char => char.classList.remove('cover-eyes'));
                if (bubble) bubble.textContent = "Portal Pengelola Resmi SIPINTAR.";
            });
        }
    });
    </script>
</body>
</html>