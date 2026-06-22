<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Wisma Karya Jasa Kemnaker') }} - @yield('title', 'Beranda')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <!-- Navigation -->
        <nav x-data="{ open: false }" class="bg-blue-900 text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-3">
                            <span class="font-bold text-2xl tracking-wider">Wisma Karya Jasa</span>
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-8">
                        <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">Beranda</a>
                        <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">Tentang Kami</a>
                        <a href="{{ route('fasilitas') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">Fasilitas</a>
                        <a href="{{ route('gallery') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">Galeri</a>
                        <a href="{{ route('kamar.public') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800 transition">Kamar & Ruangan</a>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-800 focus:outline-none focus:bg-blue-800 focus:text-white transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden bg-blue-800">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700 transition">Beranda</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700 transition">Tentang Kami</a>
                    <a href="{{ route('fasilitas') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700 transition">Fasilitas</a>
                    <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700 transition">Galeri</a>
                    <a href="{{ route('kamar.public') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700 transition">Kamar & Ruangan</a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="min-h-screen">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Wisma Karya Jasa</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Penginapan nyaman dan fasilitas lengkap di bawah naungan Kementerian Ketenagakerjaan Republik Indonesia.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                            <li><a href="{{ route('kamar.public') }}" class="hover:text-white transition">Kamar & Ruangan</a></li>
                            <li><a href="{{ route('fasilitas') }}" class="hover:text-white transition">Fasilitas</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
                        <p class="text-gray-400 text-sm mb-2">Jl. Raya Puncak Ciloto KM. BD 88, Cianjur 43253</p>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} Wisma Karya Jasa Kemnaker. All rights reserved.
                </div>
            </div>
        </footer>
    </body>
</html>
