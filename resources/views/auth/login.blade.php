<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola - SIPINTAR Kemendikdasmen</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #faf5ff;
        }

        /* Vibrant Glassmorphism Base */
        .glass-panel {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(245, 243, 255, 0.85) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 2px solid rgba(233, 213, 255, 0.8);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .glass-panel:hover {
            transform: translateY(-4px) scale(1.005);
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 20px 40px -15px rgba(168, 85, 247, 0.2);
        }

        .badge-genz {
            box-shadow: 3px 3px 0px #7c3aed;
            transition: all 0.2s ease;
        }
        .badge-genz:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0px #7c3aed;
        }

        /* Glow Button */
        .glow-button {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 50%, #f43f5e 100%);
            box-shadow: 0 10px 25px -5px rgba(236, 72, 153, 0.4), 4px 4px 0px #4c1d95;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .glow-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(236, 72, 153, 0.6), 6px 6px 0px #4c1d95;
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }
        .animate-float {
            animation: float-slow 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-slate-900 min-h-screen flex items-center justify-center p-4 relative overflow-hidden selection:bg-pink-500 selection:text-white antialiased">

    <!-- Ambient Floating Blobs -->
    <div class="fixed -top-32 -right-32 w-[550px] h-[550px] bg-pink-300/40 rounded-full blur-[120px] pointer-events-none -z-10 animate-float"></div>
    <div class="fixed top-[25%] -left-32 w-[600px] h-[600px] bg-purple-300/40 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="fixed -bottom-32 right-[10%] w-[500px] h-[500px] bg-cyan-300/40 rounded-full blur-[130px] pointer-events-none -z-10 animate-float" style="animation-delay: 3s;"></div>

    <!-- MAIN LOGIN CARD (GLASS PANEL) -->
    <div class="w-full max-w-md glass-panel p-8 sm:p-10 rounded-[36px] shadow-xl relative z-10 my-8">
        
        <!-- Badge Tahun Data 2026 -->
        <div class="absolute -top-3 -right-3 bg-amber-300 text-slate-900 font-black text-[10px] px-3 py-1.5 rounded-full border border-amber-400 shadow-sm uppercase tracking-wider transform rotate-6 badge-genz z-20">
            ⚡ 2026
        </div>

        <!-- Header Brand & Title -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-[22px] bg-purple-100 text-purple-600 border-2 border-purple-200 flex items-center justify-center mx-auto mb-4 text-2xl shadow-sm transform -rotate-3 hover:rotate-0 transition-transform">
                🛡️
            </div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Login Pengelola</h1>
            <p class="text-xs sm:text-sm text-slate-500 font-semibold mt-1">Admin, Dinas & Pihak Sekolah &mdash; SIPINTAR</p>
        </div>

        <!-- Alert Jika Error -->
        @if ($errors->any())
            <div class="mb-6 bg-rose-50 border-2 border-rose-200 text-rose-600 px-4 py-3 rounded-2xl text-xs font-black flex items-center gap-2.5 shadow-sm">
                <span class="text-base">⚠️</span>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Input Username / NPSN / NIP -->
            <div>
                <label class="block text-xs font-black text-purple-700 uppercase tracking-wider mb-2">
                    Username / NPSN / NIP
                </label>
                <div class="relative">
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan ID Pengelola..." required
                        class="w-full px-5 py-4 bg-white/90 border-2 border-purple-200 rounded-2xl focus:ring-4 focus:ring-pink-300 focus:border-pink-500 focus:outline-none text-slate-900 text-sm font-bold placeholder-slate-400 transition-all shadow-inner">
                </div>
            </div>

            <!-- Input Password -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-xs font-black text-purple-700 uppercase tracking-wider">
                        Kata Sandi
                    </label>
                </div>
                <div class="relative">
                    <input type="password" name="password" placeholder="••••••••" required
                        class="w-full px-5 py-4 bg-white/90 border-2 border-purple-200 rounded-2xl focus:ring-4 focus:ring-pink-300 focus:border-pink-500 focus:outline-none text-slate-900 text-sm font-bold placeholder-slate-400 transition-all shadow-inner">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full glow-button text-white font-black py-4 rounded-2xl transition duration-300 flex items-center justify-center gap-2 text-sm mt-4 group">
                <span>Masuk Sistem</span>
                <span class="group-hover:translate-x-1 transition-transform text-lg">&rarr;</span>
            </button>
        </form>

        <!-- Link Kembali -->
        <div class="text-center mt-8 pt-6 border-t-2 border-purple-100">
            <a href="{{ route('public.home') }}" class="text-xs text-slate-500 hover:text-pink-600 font-black transition-colors inline-flex items-center gap-1.5 group">
                <span class="group-hover:-translate-x-1 transition-transform">&larr;</span>
                <span>Kembali ke Halaman Utama</span>
            </a>
        </div>

    </div>

</body>
</html>