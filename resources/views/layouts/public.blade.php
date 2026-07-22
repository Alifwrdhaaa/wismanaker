<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Wisma Karya Jasa — Penginapan resmi Kementerian Ketenagakerjaan RI dengan standar premium.">

        <title>{{ config('app.name', 'Wisma Karya Jasa') }} - @yield('title', 'Beranda')</title>

        <!-- Fonts: Outfit (Sans) & Playfair Display (Serif) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700|playfair-display:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Custom Scrollbar for Pro Max Feel */
            ::-webkit-scrollbar { width: 10px; }
            ::-webkit-scrollbar-track { background: #f1f5f9; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }
            ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
            
            /* Glassmorphism Utilities */
            .glass-nav {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }
            .glass-dark {
                background: rgba(15, 23, 42, 0.7);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-[#F8FAFC] text-slate-800 selection:bg-gold-500 selection:text-white">

        <!-- Navigation (Pro Max Glassmorphism) -->
        <nav x-data="{ open: false, scrolled: false }" 
             @scroll.window="scrolled = (window.pageYOffset > 50)"
             :class="scrolled ? 'glass-nav shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] py-2' : 'bg-transparent py-4'"
             class="fixed w-full top-0 z-[100] transition-all duration-500 ease-in-out">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Brand -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                            <!-- Logo Mark -->
                            <div class="w-14 h-14 md:w-16 md:h-16 flex items-center justify-center transition-all duration-500 group-hover:-translate-y-1">
                                <img src="{{ asset('images/logo-kemnaker.png') }}" alt="Logo Kemnaker" class="w-full h-full object-contain drop-shadow-[0_2px_10px_rgba(255,255,255,0.3)]">
                            </div>
                            <!-- Brand Text -->
                            <div class="hidden sm:block">
                                <span :class="scrolled ? 'text-kemnaker-900' : 'text-gold-400'" class="font-serif font-bold text-xl tracking-wide transition-colors duration-500 block leading-tight">Wisma Karya Jasa</span>
                                <span :class="scrolled ? 'text-slate-500' : 'text-white'" class="text-[10px] font-semibold uppercase tracking-[0.2em] transition-colors duration-500">Kementerian Ketenagakerjaan RI</span>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex md:items-center md:space-x-2">
                        <a href="{{ route('home') }}" :class="scrolled ? 'text-slate-600 hover:text-kemnaker-800' : 'text-slate-200 hover:text-white'" class="px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-300 relative group">
                            Beranda
                            <span class="absolute bottom-1 left-4 w-0 h-0.5 bg-gold-400 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"></span>
                        </a>
                        <a href="{{ route('about') }}" :class="scrolled ? 'text-slate-600 hover:text-kemnaker-800' : 'text-slate-200 hover:text-white'" class="px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-300 relative group">
                            Tentang
                            <span class="absolute bottom-1 left-4 w-0 h-0.5 bg-gold-400 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"></span>
                        </a>
                        <a href="{{ route('fasilitas') }}" :class="scrolled ? 'text-slate-600 hover:text-kemnaker-800' : 'text-slate-200 hover:text-white'" class="px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-300 relative group">
                            Fasilitas
                            <span class="absolute bottom-1 left-4 w-0 h-0.5 bg-gold-400 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"></span>
                        </a>
                        <a href="{{ route('gallery') }}" :class="scrolled ? 'text-slate-600 hover:text-kemnaker-800' : 'text-slate-200 hover:text-white'" class="px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-300 relative group">
                            Galeri
                            <span class="absolute bottom-1 left-4 w-0 h-0.5 bg-gold-400 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"></span>
                        </a>
                        <div class="pl-4">
                            <a href="{{ route('kamar.public') }}" class="relative inline-flex items-center justify-center overflow-hidden px-7 py-3 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[11px] tracking-[0.2em] uppercase rounded-xl shadow-[0_10px_20px_rgba(212,175,55,0.3)] hover:shadow-[0_15px_30px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group">
                                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                                <span class="relative z-10 flex items-center gap-2">
                                    Pesan Kamar
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Mobile Hamburger -->
                    <div class="flex items-center md:hidden">
                        <button @click="open = !open" :class="scrolled ? 'text-slate-800' : 'text-white'" class="p-2 rounded-md transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="md:hidden glass-nav absolute w-full border-b border-slate-200/50 shadow-2xl">
                <div class="px-4 pt-2 pb-6 space-y-1">
                    <a href="{{ route('home') }}" class="block px-4 py-3 text-base font-medium text-slate-800 hover:bg-slate-50/50 hover:text-kemnaker-600 rounded-lg">Beranda</a>
                    <a href="{{ route('about') }}" class="block px-4 py-3 text-base font-medium text-slate-800 hover:bg-slate-50/50 hover:text-kemnaker-600 rounded-lg">Tentang Kami</a>
                    <a href="{{ route('fasilitas') }}" class="block px-4 py-3 text-base font-medium text-slate-800 hover:bg-slate-50/50 hover:text-kemnaker-600 rounded-lg">Fasilitas</a>
                    <a href="{{ route('gallery') }}" class="block px-4 py-3 text-base font-medium text-slate-800 hover:bg-slate-50/50 hover:text-kemnaker-600 rounded-lg">Galeri</a>
                    <a href="{{ route('kamar.public') }}" class="relative flex items-center justify-center overflow-hidden w-full mt-4 px-4 py-3.5 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 rounded-xl shadow-[0_10px_20px_rgba(212,175,55,0.3)] font-extrabold uppercase tracking-[0.2em] text-xs transition-transform active:scale-95 group">
                        <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] active:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            Pesan Kamar
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="min-h-screen">
            @yield('content')
        </main>

        <!-- Footer (Pro Max Design) -->
        <footer class="relative bg-kemnaker-900 text-slate-300 overflow-hidden border-t-2 border-gold-500/50 pt-24 pb-12">
            <!-- Background Decoration (Gradient Orbs) -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                <div class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full bg-gold-900/10 blur-[100px] transform translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 left-0 w-[600px] h-[600px] rounded-full bg-kemnaker-900/40 blur-[120px] transform -translate-x-1/2 translate-y-1/3"></div>
                <!-- Subtle grid overlay -->
                <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:40px_40px] opacity-20"></div>
            </div>

            <div class="relative max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-16 lg:gap-12 mb-20">
                    
                    <!-- Brand Section -->
                    <div class="lg:col-span-5 pr-0 lg:pr-12">
                        <div class="flex items-center gap-5 mb-8">
                            <div class="w-20 h-20 md:w-24 md:h-24 flex items-center justify-center group hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/logo-kemnaker.png') }}" alt="Logo Kemnaker" class="w-full h-full object-contain filter brightness-0 invert opacity-90 drop-shadow-[0_0_15px_rgba(255,255,255,0.2)]">
                            </div>
                            <div>
                                <h2 class="font-serif font-bold text-3xl text-white tracking-wide">Wisma Karya Jasa</h2>
                                <div class="inline-flex items-center mt-1">
                                    <span class="w-6 h-[1px] bg-gold-400 mr-2"></span>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.25em] text-gold-400">Kemnaker RI</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm font-light leading-loose text-slate-400 mb-10 max-w-md">
                            Harmoni sempurna antara arsitektur elegan dan keasrian alam pegunungan. Menghadirkan pengalaman menginap paripurna berstandar nasional.
                        </p>
                        <!-- Social Links -->
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white hover:bg-gold-500 hover:border-gold-500 hover:shadow-[0_10px_20px_rgba(212,175,55,0.2)] hover:-translate-y-1 transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white hover:bg-gold-500 hover:border-gold-500 hover:shadow-[0_10px_20px_rgba(212,175,55,0.2)] hover:-translate-y-1 transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 2.78-1.15 5.54-3.33 7.37-1.92 1.62-4.55 2.28-7.03 1.83-2.66-.48-5.06-2.18-6.19-4.63-1.2-2.58-1.02-5.71.49-8.15 1.52-2.47 4.16-4.08 7.02-4.38v4.11c-1.31.25-2.58 1-3.35 2.06-1.1 1.52-1.07 3.65.07 5.14 1.05 1.37 2.93 1.96 4.58 1.42 1.47-.48 2.45-1.93 2.53-3.48.15-5.91.07-11.83.13-17.74h-4.01c-.01 3.32-.01 6.64-.02 9.96h-4V4.99c2.61-.04 5.22-.04 7.83-.02l.06-.01z"/></svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="lg:col-span-3">
                        <h3 class="text-[11px] font-bold text-white uppercase tracking-[0.2em] mb-8 pb-4 border-b border-white/10">Navigasi Utama</h3>
                        <ul class="space-y-4">
                            <li>
                                <a href="{{ route('home') }}" class="group flex items-center text-slate-400 hover:text-white transition-colors duration-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold-500 mr-3 transform scale-0 group-hover:scale-100 transition-transform duration-300"></span>
                                    <span class="text-sm font-light transform group-hover:translate-x-1 transition-transform duration-300">Beranda Utama</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" class="group flex items-center text-slate-400 hover:text-white transition-colors duration-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold-500 mr-3 transform scale-0 group-hover:scale-100 transition-transform duration-300"></span>
                                    <span class="text-sm font-light transform group-hover:translate-x-1 transition-transform duration-300">Kisah & Filosofi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('fasilitas') }}" class="group flex items-center text-slate-400 hover:text-white transition-colors duration-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold-500 mr-3 transform scale-0 group-hover:scale-100 transition-transform duration-300"></span>
                                    <span class="text-sm font-light transform group-hover:translate-x-1 transition-transform duration-300">Fasilitas Eksklusif</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gallery') }}" class="group flex items-center text-slate-400 hover:text-white transition-colors duration-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold-500 mr-3 transform scale-0 group-hover:scale-100 transition-transform duration-300"></span>
                                    <span class="text-sm font-light transform group-hover:translate-x-1 transition-transform duration-300">Galeri Visual</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kamar.public') }}" class="group flex items-center text-slate-400 hover:text-white transition-colors duration-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gold-500 mr-3 transform scale-0 group-hover:scale-100 transition-transform duration-300"></span>
                                    <span class="text-sm font-light transform group-hover:translate-x-1 transition-transform duration-300">Pilihan Kamar</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Location / Contact -->
                    <div class="lg:col-span-4 lg:pl-8 border-t lg:border-t-0 lg:border-l border-white/10 pt-12 lg:pt-0">
                        <h3 class="text-[11px] font-bold text-white uppercase tracking-[0.2em] mb-8 pb-4 border-b border-transparent">Pusat Layanan</h3>
                        <ul class="space-y-6">
                            <li class="flex items-start group">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center mr-4 text-gold-400 flex-shrink-0 group-hover:bg-gold-500 group-hover:text-white transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div class="pt-1">
                                    <span class="block text-[10px] uppercase tracking-[0.1em] text-slate-500 font-bold mb-1">Alamat</span>
                                    <span class="text-slate-300 text-sm font-light leading-relaxed group-hover:text-white transition-colors">
                                        Jl. Raya Puncak Ciloto KM. BD 88<br>Cianjur, Jawa Barat 43253
                                    </span>
                                </div>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center mr-4 text-gold-400 flex-shrink-0 group-hover:bg-gold-500 group-hover:text-white transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div class="pt-1">
                                    <span class="block text-[10px] uppercase tracking-[0.1em] text-slate-500 font-bold mb-1">Telepon</span>
                                    <span class="text-slate-300 text-sm font-light group-hover:text-white transition-colors">(0263) 512345</span>
                                </div>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center mr-4 text-gold-400 flex-shrink-0 group-hover:bg-gold-500 group-hover:text-white transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div class="pt-1">
                                    <span class="block text-[10px] uppercase tracking-[0.1em] text-slate-500 font-bold mb-1">Email</span>
                                    <span class="text-slate-300 text-sm font-light group-hover:text-white transition-colors">info@wismakaryajasa.id</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-[11px] font-medium text-slate-500 mb-4 md:mb-0">
                        &copy; {{ date('Y') }} Wisma Karya Jasa. Dikelola oleh Kementerian Ketenagakerjaan RI.
                    </p>
                    <div class="flex space-x-8 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <a href="#" class="hover:text-gold-400 transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-gold-400 transition-colors">Syarat & Ketentuan</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Framer Motion (Vanilla) Pro Max Engine -->
        <script type="module">
            document.addEventListener('DOMContentLoaded', () => {
                // Smooth Scroll Fallback & Engine Init
                setTimeout(() => {
                    if (window.motion) {
                        const { animate, inView, stagger, scroll } = window.motion;
                        
                        // 1. Fade-in-up Setup
                        const fadeElements = document.querySelectorAll('.animate-fade-in-up');
                        fadeElements.forEach(el => { el.style.opacity = '0'; });

                        inView('.animate-fade-in-up', (element) => {
                            animate(element, { opacity: [0, 1], y: [50, 0] }, { 
                                duration: 0.9, 
                                easing: [0.16, 1, 0.3, 1] // Custom bezier for premium feel
                            });
                        });

                        // 2. Stagger Grids (Rooms, Galleries, Cards)
                        const grids = document.querySelectorAll('.grid');
                        grids.forEach(grid => {
                            const cards = Array.from(grid.children);
                            if (cards.length > 0 && grid.closest('.max-w-7xl')) {
                                cards.forEach(card => { 
                                    card.style.opacity = '0'; 
                                });
                                inView(grid, () => {
                                    animate(cards, 
                                        { opacity: [0, 1], y: [40, 0] }, 
                                        { duration: 0.8, delay: stagger(0.15), easing: [0.16, 1, 0.3, 1] }
                                    );
                                });
                            }
                        });

                        // 3. Optional Scroll Progress or Parallax bindings can be added here
                    }
                }, 100);
            });
        </script>
    </body>
</html>
