<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="scrolled ? 'bg-kemnaker-900/95 shadow-xl backdrop-blur-md border-b border-white/5' : 'bg-transparent border-b border-transparent'"
     class="sticky top-0 z-[100] transition-all duration-300">
    
    <!-- Top Gold Accent Line -->
    <div class="h-1 w-full bg-gradient-to-r from-gold-400 via-gold-500 to-gold-400"></div>
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-lg group-hover:shadow-gold-500/20 group-hover:-translate-y-0.5 transition-all duration-300">
                            <span class="font-serif font-extrabold text-kemnaker-900 text-sm leading-none">WK<span class="text-gold-500">.</span></span>
                        </div>
                        <div class="hidden md:block">
                            <div class="font-bold text-white text-sm leading-tight tracking-wide">Wisma Karya Jasa</div>
                            <div class="text-gold-400 text-[10px] tracking-widest uppercase font-semibold">Pro Panel</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden lg:flex lg:items-center lg:space-x-1 lg:ml-10">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-inner' : 'text-slate-300 hover:text-white hover:bg-white/5' }} px-4 py-2 text-sm font-semibold tracking-wide transition-all duration-300 rounded-lg relative overflow-hidden group">
                        Ringkasan
                        @if(request()->routeIs('dashboard')) <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-1 bg-gold-400 rounded-t-full"></span> @endif
                    </a>
                    <a href="{{ route('kamar.index') }}" class="{{ request()->routeIs('kamar.*') ? 'bg-white/10 text-white shadow-inner' : 'text-slate-300 hover:text-white hover:bg-white/5' }} px-4 py-2 text-sm font-semibold tracking-wide transition-all duration-300 rounded-lg relative overflow-hidden group">
                        Kamar
                        @if(request()->routeIs('kamar.*')) <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-1 bg-gold-400 rounded-t-full"></span> @endif
                    </a>
                    <a href="{{ route('pemesanan.index') }}" class="{{ request()->routeIs('pemesanan.*') ? 'bg-white/10 text-white shadow-inner' : 'text-slate-300 hover:text-white hover:bg-white/5' }} px-4 py-2 text-sm font-semibold tracking-wide transition-all duration-300 rounded-lg relative overflow-hidden group flex items-center">
                        Reservasi
                        <!-- Badge notification example -->
                        <span class="ml-2 w-2 h-2 rounded-full bg-gold-500 animate-pulse"></span>
                        @if(request()->routeIs('pemesanan.*')) <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-1 bg-gold-400 rounded-t-full"></span> @endif
                    </a>
                    <a href="{{ route('fasilitas.index') }}" class="{{ request()->routeIs('fasilitas.*') ? 'bg-white/10 text-white shadow-inner' : 'text-slate-300 hover:text-white hover:bg-white/5' }} px-4 py-2 text-sm font-semibold tracking-wide transition-all duration-300 rounded-lg relative overflow-hidden group">
                        Fasilitas
                        @if(request()->routeIs('fasilitas.*')) <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-1 bg-gold-400 rounded-t-full"></span> @endif
                    </a>
                    <a href="{{ route('galeri.index') }}" class="{{ request()->routeIs('galeri.*') ? 'bg-white/10 text-white shadow-inner' : 'text-slate-300 hover:text-white hover:bg-white/5' }} px-4 py-2 text-sm font-semibold tracking-wide transition-all duration-300 rounded-lg relative overflow-hidden group">
                        Media
                        @if(request()->routeIs('galeri.*')) <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-1 bg-gold-400 rounded-t-full"></span> @endif
                    </a>
                    <a href="{{ route('profil-wisma.index') }}" class="{{ request()->routeIs('profil-wisma.*') ? 'bg-white/10 text-white shadow-inner' : 'text-slate-300 hover:text-white hover:bg-white/5' }} px-4 py-2 text-sm font-semibold tracking-wide transition-all duration-300 rounded-lg relative overflow-hidden group">
                        Pengaturan
                        @if(request()->routeIs('profil-wisma.*')) <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-1 bg-gold-400 rounded-t-full"></span> @endif
                    </a>
                </div>
            </div>

            <!-- Right: User Dropdown + Hamburger -->
            <div class="flex items-center space-x-4">
                <!-- Live view button -->
                <a href="{{ route('home') }}" target="_blank" class="hidden md:flex items-center text-xs font-bold uppercase tracking-widest text-kemnaker-200 hover:text-gold-400 transition-colors">
                    Lihat Web <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>

                <!-- User Dropdown -->
                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-3 p-1.5 pr-4 bg-kemnaker-800/80 hover:bg-kemnaker-800 border border-white/10 rounded-full text-white text-sm font-semibold transition duration-300 shadow-sm hover:shadow-lg focus:ring-2 focus:ring-gold-500/50">
                                <div class="w-8 h-8 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-inner">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="hidden md:block max-w-[120px] truncate text-sm font-medium">{{ Auth::user()->name }}</span>
                                <svg class="fill-current h-4 w-4 text-kemnaker-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-white border border-slate-100 rounded-xl shadow-2xl overflow-hidden py-1">
                                <div class="px-5 py-4 bg-slate-50 border-b border-slate-100 mb-1">
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.15em] mb-1">Signed in as</p>
                                    <p class="text-sm font-bold text-kemnaker-900 truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <x-dropdown-link :href="route('profile.edit')" class="text-slate-700 hover:bg-kemnaker-50 hover:text-kemnaker-900 text-sm px-5 py-2.5 flex items-center font-medium">
                                    <svg class="w-4 h-4 mr-3 text-kemnaker-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Manajemen Akun
                                </x-dropdown-link>
                                <div class="border-t border-slate-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="text-red-600 hover:bg-red-50 text-sm px-5 py-2.5 flex items-center font-medium">
                                        <svg class="w-4 h-4 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Akhiri Sesi
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="flex items-center lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-kemnaker-100 hover:text-white hover:bg-kemnaker-700 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden bg-kemnaker-900 border-t border-white/10 absolute w-full shadow-2xl">
        <div class="pt-2 pb-4 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-kemnaker-200 hover:bg-white/5 hover:text-white' }}">Ringkasan</a>
            <a href="{{ route('kamar.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('kamar.*') ? 'bg-white/10 text-white' : 'text-kemnaker-200 hover:bg-white/5 hover:text-white' }}">Kelola Kamar</a>
            <a href="{{ route('pemesanan.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('pemesanan.*') ? 'bg-white/10 text-white' : 'text-kemnaker-200 hover:bg-white/5 hover:text-white' }}">Reservasi</a>
            <a href="{{ route('fasilitas.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('fasilitas.*') ? 'bg-white/10 text-white' : 'text-kemnaker-200 hover:bg-white/5 hover:text-white' }}">Fasilitas</a>
            <a href="{{ route('galeri.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('galeri.*') ? 'bg-white/10 text-white' : 'text-kemnaker-200 hover:bg-white/5 hover:text-white' }}">Media Galeri</a>
            <a href="{{ route('profil-wisma.index') }}" class="block px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('profil-wisma.*') ? 'bg-white/10 text-white' : 'text-kemnaker-200 hover:bg-white/5 hover:text-white' }}">Pengaturan Wisma</a>
        </div>

        <div class="pt-4 pb-4 border-t border-white/10 px-6 bg-kemnaker-900/50">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-gold-500 rounded-full flex items-center justify-center text-white font-bold mr-3 shadow-inner">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-bold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-kemnaker-300 text-xs">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="space-y-2">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-kemnaker-100 hover:text-white font-medium">Akun Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-red-400 hover:text-red-300 font-medium">Keluar</a>
                </form>
            </div>
        </div>
    </div>
</nav>
