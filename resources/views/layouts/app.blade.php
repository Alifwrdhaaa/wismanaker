<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Wisma Karya Jasa') }} — Admin Pro</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700,800|playfair-display:400,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Custom Scrollbar */
            ::-webkit-scrollbar { width: 8px; height: 8px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
            ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
            
            body { background-color: #f8fafc; }
            .glass-header {
                background: rgba(15, 23, 42, 0.95);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }
        </style>
    </head>
    <body class="font-sans antialiased text-slate-800 selection:bg-gold-500 selection:text-white">
        <div class="min-h-screen flex flex-col relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 left-0 w-full h-[400px] bg-kemnaker-900 -z-10" style="clip-path: polygon(0 0, 100% 0, 100% 60%, 0% 100%);"></div>

            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="glass-header shadow-xl relative z-10">
                    <div class="max-w-[90rem] mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow relative z-10 mt-8">
                <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 pb-12">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-200 text-slate-500 text-center text-xs py-6 mt-auto">
                <div class="max-w-[90rem] mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                    <span>&copy; {{ date('Y') }} Wisma Karya Jasa — Panel Administrasi Pro</span>
                    <span class="mt-2 md:mt-0 font-medium text-kemnaker-600">Sistem Informasi Penginapan Kemnaker RI</span>
                </div>
            </footer>
        </div>

        <!-- Framer Motion (Vanilla) Initialization for Admin -->
        <script type="module">
            document.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    if (window.motion) {
                        const { animate, inView, stagger } = window.motion;
                        
                        const fadeElements = document.querySelectorAll('.animate-fade-in-up');
                        fadeElements.forEach(el => { el.style.opacity = '0'; });

                        inView('.animate-fade-in-up', (element) => {
                            animate(element, { opacity: [0, 1], y: [30, 0] }, { duration: 0.6, easing: [0.16, 1, 0.3, 1] });
                        });

                        const grids = document.querySelectorAll('.grid-stagger');
                        grids.forEach(grid => {
                            const cards = Array.from(grid.children);
                            if (cards.length > 0) {
                                cards.forEach(card => { card.style.opacity = '0'; });
                                inView(grid, () => {
                                    animate(cards, { opacity: [0, 1], y: [20, 0], scale: [0.95, 1] }, { duration: 0.5, delay: stagger(0.1), easing: [0.16, 1, 0.3, 1] });
                                });
                            }
                        });
                    }
                }, 100);
            });
        </script>
    </body>
</html>
