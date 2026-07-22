<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between animate-fade-in-up">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white rounded-xl shadow-lg flex items-center justify-center">
                    <span class="font-serif font-extrabold text-kemnaker-900 text-sm leading-none text-center">
                        WK<br><span class="text-gold-500 text-[9px] tracking-widest">JASA</span>
                    </span>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-white tracking-wide">Ringkasan Eksekutif</h2>
                    <p class="text-kemnaker-200 text-sm font-light mt-0.5">Control Panel &mdash; Wisma Karya Jasa</p>
                </div>
            </div>
            <div class="hidden md:flex flex-col items-end">
                <div class="inline-flex items-center space-x-2 bg-kemnaker-900/50 backdrop-blur-sm px-4 py-1.5 rounded-full border border-white/10">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    <span class="text-gold-400 text-xs font-bold tracking-widest uppercase">{{ now()->translatedFormat('l') }}, {{ now()->translatedFormat('d M Y') }}</span>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Welcome Banner (Pro Max) -->
    <div class="animate-fade-in-up relative bg-kemnaker-900 rounded-[2.5rem] p-10 mb-10 shadow-[0_20px_50px_rgba(23,43,77,0.3)] border border-kemnaker-800 overflow-hidden flex flex-col md:flex-row items-center justify-between group">
        <!-- Luxury Animated Background -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-kemnaker-900 via-kemnaker-800/80 to-kemnaker-900"></div>
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-gold-500/20 rounded-full blur-[80px] group-hover:bg-gold-400/30 transition-colors duration-1000"></div>
        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-500/20 rounded-full blur-[80px] group-hover:bg-blue-400/30 transition-colors duration-1000"></div>
        
        <div class="relative z-10 w-full md:w-2/3">
            <div class="inline-flex items-center space-x-2 bg-kemnaker-800/50 backdrop-blur-md border border-white/10 px-4 py-1.5 rounded-full mb-5 shadow-inner">
                <span class="w-2 h-2 rounded-full bg-gold-400 animate-pulse"></span>
                <span class="text-[10px] font-bold text-gold-100 uppercase tracking-[0.2em]">Pusat Kendali Sistem</span>
            </div>
            <h3 class="text-4xl md:text-5xl font-serif font-extrabold text-white mb-4 tracking-tight drop-shadow-lg">
                Selamat datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-300 to-gold-500">{{ Auth::user()->name }}</span>
            </h3>
            <p class="text-kemnaker-100 font-light text-sm md:text-base max-w-2xl leading-relaxed opacity-90">
                Ini adalah pusat komando operasional Wisma Karya Jasa. Kelola seluruh aktivitas akomodasi, reservasi pelanggan, dan konfigurasi fasilitas dengan presisi tinggi.
            </p>
        </div>
        
        <div class="relative z-10 mt-8 md:mt-0 w-full md:w-auto flex justify-end">
            <a href="{{ route('kamar.create') }}" class="relative overflow-hidden inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[12px] tracking-[0.2em] uppercase rounded-2xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group/btn">
                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover/btn:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                <span class="relative z-10 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Kamar Baru
                </span>
            </a>
        </div>
    </div>

    <!-- Stats Grid (Pro Max Staggered) -->
    <div class="grid-stagger grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Card 1 -->
        <div class="bg-white rounded-[2rem] shadow-[0_10px_30px_rgba(23,43,77,0.03)] border border-slate-100 p-8 flex flex-col justify-between group hover:shadow-[0_20px_40px_rgba(23,43,77,0.08)] hover:-translate-y-2 hover:border-gold-200 transition-all duration-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-kemnaker-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-kemnaker-100/50 rounded-full blur-2xl group-hover:bg-gold-100/50 transition-colors duration-700"></div>
            <div class="relative z-10 flex justify-between items-start mb-6">
                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 text-kemnaker-700 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-kemnaker-800 group-hover:to-kemnaker-900 group-hover:text-white group-hover:shadow-lg transition-all duration-500 transform group-hover:rotate-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 group-hover:text-gold-500 transition-colors">Database</span>
            </div>
            <div class="relative z-10">
                <h4 class="text-5xl font-serif font-extrabold text-kemnaker-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-kemnaker-800 group-hover:to-gold-500 transition-all duration-300">{{ \App\Models\Kamar::count() }}</h4>
                <p class="text-sm text-slate-500 font-medium">Total Kamar</p>
                <a href="{{ route('kamar.index') }}" class="mt-6 flex items-center text-[11px] font-bold uppercase tracking-widest text-kemnaker-600 group-hover:text-gold-600 transition-colors">
                    Kelola <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-[2rem] shadow-[0_10px_30px_rgba(23,43,77,0.03)] border border-slate-100 p-8 flex flex-col justify-between group hover:shadow-[0_20px_40px_rgba(212,175,55,0.08)] hover:-translate-y-2 hover:border-gold-200 transition-all duration-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-gold-100/50 rounded-full blur-2xl group-hover:bg-gold-200/40 transition-colors duration-700"></div>
            <div class="relative z-10 flex justify-between items-start mb-6">
                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 text-gold-600 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-gold-400 group-hover:to-gold-600 group-hover:text-white group-hover:shadow-lg transition-all duration-500 transform group-hover:-rotate-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 group-hover:text-gold-500 transition-colors">Aktif</span>
            </div>
            <div class="relative z-10">
                <h4 class="text-5xl font-serif font-extrabold text-kemnaker-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-gold-500 group-hover:to-gold-700 transition-all duration-300">{{ \App\Models\Pemesanan::where('checkout_date', '>=', now())->count() }}</h4>
                <p class="text-sm text-slate-500 font-medium">Reservasi Berjalan</p>
                <a href="{{ route('pemesanan.index') }}" class="mt-6 flex items-center text-[11px] font-bold uppercase tracking-widest text-kemnaker-600 group-hover:text-gold-600 transition-colors">
                    Booking <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-[2rem] shadow-[0_10px_30px_rgba(23,43,77,0.03)] border border-slate-100 p-8 flex flex-col justify-between group hover:shadow-[0_20px_40px_rgba(23,43,77,0.08)] hover:-translate-y-2 hover:border-gold-200 transition-all duration-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-kemnaker-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-kemnaker-100/50 rounded-full blur-2xl group-hover:bg-gold-100/50 transition-colors duration-700"></div>
            <div class="relative z-10 flex justify-between items-start mb-6">
                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 text-kemnaker-700 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-kemnaker-800 group-hover:to-kemnaker-900 group-hover:text-white group-hover:shadow-lg transition-all duration-500 transform group-hover:rotate-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 group-hover:text-gold-500 transition-colors">Fasilitas</span>
            </div>
            <div class="relative z-10">
                <h4 class="text-5xl font-serif font-extrabold text-kemnaker-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-kemnaker-800 group-hover:to-gold-500 transition-all duration-300">{{ \App\Models\Fasilitas::count() }}</h4>
                <p class="text-sm text-slate-500 font-medium">Layanan Tersedia</p>
                <a href="{{ route('fasilitas.index') }}" class="mt-6 flex items-center text-[11px] font-bold uppercase tracking-widest text-kemnaker-600 group-hover:text-gold-600 transition-colors">
                    Kelola <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-[2rem] shadow-[0_10px_30px_rgba(23,43,77,0.03)] border border-slate-100 p-8 flex flex-col justify-between group hover:shadow-[0_20px_40px_rgba(23,43,77,0.08)] hover:-translate-y-2 hover:border-gold-200 transition-all duration-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-kemnaker-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-kemnaker-100/50 rounded-full blur-2xl group-hover:bg-gold-100/50 transition-colors duration-700"></div>
            <div class="relative z-10 flex justify-between items-start mb-6">
                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-100 text-kemnaker-700 flex items-center justify-center group-hover:bg-gradient-to-br group-hover:from-kemnaker-800 group-hover:to-kemnaker-900 group-hover:text-white group-hover:shadow-lg transition-all duration-500 transform group-hover:-rotate-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 group-hover:text-gold-500 transition-colors">Media</span>
            </div>
            <div class="relative z-10">
                <h4 class="text-5xl font-serif font-extrabold text-kemnaker-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-kemnaker-800 group-hover:to-gold-500 transition-all duration-300">{{ \App\Models\Galeri::count() }}</h4>
                <p class="text-sm text-slate-500 font-medium">Foto Galeri</p>
                <a href="{{ route('galeri.index') }}" class="mt-6 flex items-center text-[11px] font-bold uppercase tracking-widest text-kemnaker-600 group-hover:text-gold-600 transition-colors">
                    Atur <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Access Section -->
    <div class="animate-fade-in-up bg-white rounded-[2.5rem] shadow-[0_15px_40px_rgba(23,43,77,0.04)] border border-slate-100 p-10 relative overflow-hidden">
        <h3 class="font-serif font-bold text-kemnaker-900 text-2xl mb-8 flex items-center">
            <span class="w-3 h-3 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full mr-4 shadow-[0_0_10px_rgba(212,175,55,0.5)]"></span>
            Aksi Cepat (Quick Access)
        </h3>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <a href="{{ route('kamar.create') }}" class="flex flex-col items-center justify-center p-8 bg-slate-50 border border-slate-100 hover:border-gold-300 hover:bg-white rounded-3xl transition-all duration-500 group hover:shadow-[0_20px_40px_rgba(212,175,55,0.1)] hover:-translate-y-2 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-gold-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 w-16 h-16 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-4 group-hover:bg-gradient-to-br group-hover:from-gold-400 group-hover:to-gold-600 transition-all duration-500 transform group-hover:scale-110 group-hover:rotate-6">
                    <svg class="w-8 h-8 text-kemnaker-600 group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <span class="relative z-10 text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-gold-700 transition-colors duration-300">Kamar Baru</span>
            </a>
            
            <a href="{{ route('pemesanan.create') }}" class="flex flex-col items-center justify-center p-8 bg-slate-50 border border-slate-100 hover:border-kemnaker-300 hover:bg-white rounded-3xl transition-all duration-500 group hover:shadow-[0_20px_40px_rgba(23,43,77,0.08)] hover:-translate-y-2 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-kemnaker-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 w-16 h-16 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-4 group-hover:bg-gradient-to-br group-hover:from-kemnaker-800 group-hover:to-kemnaker-900 transition-all duration-500 transform group-hover:scale-110 group-hover:-rotate-6">
                    <svg class="w-8 h-8 text-gold-600 group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <span class="relative z-10 text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-kemnaker-900 transition-colors duration-300">Reservasi Manual</span>
            </a>
            
            <a href="{{ route('fasilitas.create') }}" class="flex flex-col items-center justify-center p-8 bg-slate-50 border border-slate-100 hover:border-gold-300 hover:bg-white rounded-3xl transition-all duration-500 group hover:shadow-[0_20px_40px_rgba(212,175,55,0.1)] hover:-translate-y-2 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-gold-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 w-16 h-16 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-4 group-hover:bg-gradient-to-br group-hover:from-gold-400 group-hover:to-gold-600 transition-all duration-500 transform group-hover:scale-110 group-hover:rotate-6">
                    <svg class="w-8 h-8 text-kemnaker-600 group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <span class="relative z-10 text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-gold-700 transition-colors duration-300">Fasilitas</span>
            </a>
            
            <a href="{{ route('galeri.create') }}" class="flex flex-col items-center justify-center p-8 bg-slate-50 border border-slate-100 hover:border-kemnaker-300 hover:bg-white rounded-3xl transition-all duration-500 group hover:shadow-[0_20px_40px_rgba(23,43,77,0.08)] hover:-translate-y-2 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-kemnaker-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 w-16 h-16 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-4 group-hover:bg-gradient-to-br group-hover:from-kemnaker-800 group-hover:to-kemnaker-900 transition-all duration-500 transform group-hover:scale-110 group-hover:-rotate-6">
                    <svg class="w-8 h-8 text-kemnaker-600 group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                </div>
                <span class="relative z-10 text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-kemnaker-900 transition-colors duration-300">Upload Foto</span>
            </a>
            
            <a href="{{ route('profil-wisma.index') }}" class="flex flex-col items-center justify-center p-8 bg-slate-50 border border-slate-100 hover:border-slate-400 hover:bg-white rounded-3xl transition-all duration-500 group hover:shadow-[0_20px_40px_rgba(100,116,139,0.1)] hover:-translate-y-2 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-100 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10 w-16 h-16 bg-white rounded-[1.25rem] shadow-sm flex items-center justify-center mb-4 group-hover:bg-slate-700 transition-all duration-500 transform group-hover:scale-110 group-hover:rotate-180">
                    <svg class="w-8 h-8 text-slate-600 group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="relative z-10 text-xs font-bold uppercase tracking-widest text-slate-500 group-hover:text-slate-900 transition-colors duration-300">Pengaturan</span>
            </a>
        </div>
    </div>
</x-app-layout>
