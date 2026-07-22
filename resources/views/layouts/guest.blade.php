<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Wisma Karya Jasa') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700|playfair-display:400,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased bg-kemnaker-900 selection:bg-gold-500 selection:text-white">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1542314831-c6a4d27ce66b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
                     alt="Background" 
                     class="w-full h-full object-cover opacity-20 scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900 via-kemnaker-900/80 to-transparent"></div>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-10 py-12 bg-white/95 backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] overflow-hidden sm:rounded-[2rem] border border-white">
                
                <div class="flex flex-col items-center justify-center mb-8">
                    <div class="w-16 h-16 bg-kemnaker-900 rounded-2xl flex items-center justify-center shadow-lg mb-4">
                        <span class="font-serif font-extrabold text-white text-xl leading-none">WK<span class="text-gold-500">.</span></span>
                    </div>
                    <h2 class="text-2xl font-serif font-bold text-kemnaker-900 text-center">Admin Panel</h2>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-600 mt-1">Wisma Karya Jasa</p>
                </div>

                {{ $slot }}
                
                <div class="mt-8 pt-6 border-t border-slate-200 text-center">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">&copy; {{ date('Y') }} Kementerian Ketenagakerjaan RI</p>
                </div>
            </div>
        </div>
    </body>
</html>
