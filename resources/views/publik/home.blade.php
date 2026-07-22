@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<!-- Premium Hero Section with Parallax Feel -->
<div class="relative h-screen bg-kemnaker-900 overflow-hidden flex items-center justify-center">
    <!-- Background Video (YouTube iframe) for Premium Motion Effect -->
    <div class="absolute inset-0 z-0 overflow-hidden bg-kemnaker-900">
        <!-- Local Background Video (Rotated correctly without zoom) -->
        <video id="heroVideo" autoplay muted playsinline loop 
               class="absolute object-cover top-1/2 left-1/2 pointer-events-none"
               style="width: 100vh; height: 100vw; transform: translate(-50%, -50%) rotate(-90deg);">
            <source src="{{ asset('videos/vidio hero.mp4') }}" type="video/mp4">
        </video>
        <!-- Luxury Solid Overlay (Transparan 40% agar video tetap terlihat jelas tapi tidak menyilaukan) -->
        <div class="absolute inset-0 bg-kemnaker-900/40 pointer-events-none"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center mt-16 animate-fade-in-up">
        <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full border border-gold-500/30 bg-kemnaker-900/50 backdrop-blur-md mb-8">
            <span class="w-2 h-2 rounded-full bg-gold-400 animate-pulse"></span>
            <span class="text-gold-300 text-xs font-bold uppercase tracking-[0.25em]">Kementerian Ketenagakerjaan RI</span>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-serif font-extrabold text-white mb-8 tracking-tight drop-shadow-2xl leading-[1.1]">
            Wisma <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-300 to-gold-600">Karya Jasa</span>
        </h1>
        
        <p class="text-xl md:text-2xl text-kemnaker-100/90 font-light max-w-2xl mx-auto mb-12 leading-relaxed">
            Eksklusivitas yang memadukan keasrian Puncak dengan kenyamanan modern untuk produktivitas Anda.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="{{ route('kamar.public') }}" class="relative inline-flex items-center justify-center overflow-hidden px-10 py-4 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[13px] tracking-[0.25em] uppercase rounded-xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group">
                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                <span class="relative z-10 flex items-center justify-center gap-3">
                    Pesan Sekarang
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </span>
            </a>
            <a href="{{ route('about') }}" class="group inline-flex items-center justify-center px-10 py-4 font-bold text-white transition-all duration-300 border border-white/30 rounded-xl hover:bg-white hover:text-kemnaker-900 hover:border-white shadow-lg hover:-translate-y-1">
                <span class="uppercase tracking-[0.25em] text-[13px]">Pelajari Lebih Lanjut</span>
            </a>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <div class="w-8 h-12 border-2 border-white/30 rounded-full flex justify-center p-1">
            <div class="w-1 h-3 bg-white/60 rounded-full"></div>
        </div>
    </div>
</div>

<!-- Editorial Section: Filosofi -->
<div class="py-20 lg:py-32 bg-[#F8FAFC] relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="hidden lg:block absolute top-0 right-0 w-[45%] h-full bg-kemnaker-900 rounded-bl-[100px] shadow-2xl z-0 transform transition-transform duration-1000 hover:scale-105"></div>
    <!-- Mobile background accent -->
    <div class="block lg:hidden absolute top-0 right-0 w-full h-[30%] bg-kemnaker-900 rounded-bl-[80px] z-0"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 bg-gold-200/40 rounded-full blur-3xl z-0 pointer-events-none"></div>
    
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-8 items-center">
            
            <!-- Text Content (Left side, spanning 5 cols) -->
            <div class="lg:col-span-5 lg:pr-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="inline-flex items-center space-x-3 mb-6">
                    <span class="w-12 h-[2px] bg-gold-500"></span>
                    <span class="text-gold-600 lg:text-gold-600 text-white font-bold uppercase tracking-[0.2em] text-xs">Identitas & Dedikasi</span>
                </div>
                <h2 class="text-4xl lg:text-6xl font-serif font-extrabold text-white lg:text-kemnaker-900 mb-8 leading-[1.15] tracking-tight">
                    Harmoni antara Alam & <span class="text-gold-400 lg:text-kemnaker-600 italic font-light">Profesionalitas</span>.
                </h2>
                
                <div class="prose prose-lg text-slate-600 font-light mb-12 leading-loose relative px-4 lg:px-0">
                    <!-- Quote accent -->
                    <div class="absolute -left-2 lg:-left-6 -top-4 text-6xl text-kemnaker-200 lg:text-kemnaker-100 font-serif opacity-50 z-0 select-none">"</div>
                    <p class="relative z-10 text-slate-700 lg:text-slate-600 bg-white/80 lg:bg-transparent backdrop-blur-sm lg:backdrop-blur-none p-4 lg:p-0 rounded-2xl lg:rounded-none">
                        Wisma Karya Jasa bukan sekadar tempat menginap, melainkan ruang eksklusif dimana ketenangan alam pegunungan berpadu harmonis dengan fasilitas berstandar nasional. Kami hadir untuk menunjang segala aktivitas Anda secara paripurna.
                    </p>
                </div>
                
                <div class="flex items-center space-x-12 mb-12 border-y border-slate-200 py-8">
                    <div>
                        <span class="block text-4xl font-extrabold text-kemnaker-900 font-serif mb-1 drop-shadow-sm">5+</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Tipe Akomodasi</span>
                    </div>
                    <div class="w-[1px] h-12 bg-slate-200"></div>
                    <div>
                        <span class="block text-4xl font-extrabold text-kemnaker-900 font-serif mb-1 drop-shadow-sm">24/7</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Layanan Prima</span>
                    </div>
                </div>
                
                <a href="{{ route('about') }}" class="group inline-flex items-center text-kemnaker-700 font-bold hover:text-gold-600 transition-colors uppercase tracking-widest text-xs bg-white px-6 py-4 rounded-full shadow-[0_10px_20px_rgba(23,43,77,0.05)] hover:shadow-[0_15px_30px_rgba(23,43,77,0.1)] hover:-translate-y-1">
                    Baca Kisah Selengkapnya
                    <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Image Composition (Right side, spanning 7 cols) -->
            <div class="lg:col-span-7 relative animate-fade-in-up mt-12 lg:mt-0" style="animation-delay: 0.3s;">
                <div class="relative w-full h-[400px] md:h-[500px] lg:h-[700px] rounded-[2rem] overflow-hidden shadow-[0_30px_60px_rgba(0,0,0,0.3)] border-4 border-white/10 group">
                    <!-- Fix broken image URL to a reliable luxury resort image -->
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                         alt="Wisma Building Architecture" 
                         class="w-full h-full object-cover transform transition duration-[2000ms] group-hover:scale-110">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/60 to-transparent opacity-50 group-hover:opacity-20 transition-opacity duration-700"></div>
                </div>
                
                <!-- Floating Glassmorphism Badge -->
                <div class="absolute -bottom-8 left-4 right-4 lg:right-auto lg:-bottom-20 lg:-left-16 bg-white/95 backdrop-blur-xl p-6 lg:p-8 rounded-[2rem] shadow-[0_20px_50px_rgba(23,43,77,0.15)] border border-white max-w-none lg:max-w-sm transform transition duration-500 hover:-translate-y-2 hover:shadow-[0_30px_60px_rgba(23,43,77,0.2)]">
                    <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gold-50 rounded-2xl flex items-center justify-center text-gold-500 mb-4 lg:mb-6 shadow-sm border border-gold-100">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <h4 class="font-serif font-extrabold text-xl lg:text-2xl text-kemnaker-900 mb-2 lg:mb-3 tracking-wide">Standar Premium</h4>
                    <p class="text-slate-500 font-medium text-xs lg:text-sm leading-relaxed">Fasilitas dan layanan paripurna yang disiapkan eksklusif untuk memberikan kenyamanan mutlak bagi setiap tamu.</p>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-[radial-gradient(#d4af37_2px,transparent_2px)] [background-size:16px_16px] opacity-30 z-0"></div>
            </div>
            
        </div>
    </div>
</div>

<div class="py-20 lg:py-32 bg-slate-50 border-t border-slate-200/50 relative overflow-hidden">
    <!-- Decorative subtle pattern -->
    <div class="absolute inset-0 bg-[radial-gradient(#2C4C63_1px,transparent_1px)] [background-size:32px_32px] opacity-[0.02] z-0"></div>

    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 lg:mb-16 animate-fade-in-up">
            <div class="max-w-3xl">
                <div class="inline-flex items-center space-x-3 mb-4 lg:mb-6">
                    <span class="w-12 h-[2px] bg-gold-500"></span>
                    <span class="text-gold-600 font-bold uppercase tracking-[0.2em] text-xs">Pilihan Akomodasi</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-serif font-extrabold text-kemnaker-900 leading-tight tracking-tight">
                    Ruang Istirahat <span class="text-kemnaker-600 italic font-light">Elegan</span>.
                </h2>
            </div>
            <a href="{{ route('kamar.public') }}" class="w-full md:w-auto justify-center group mt-8 md:mt-0 px-8 py-4 bg-transparent border-2 border-kemnaker-900 text-kemnaker-900 font-bold uppercase tracking-[0.15em] text-xs rounded-full hover:bg-kemnaker-900 hover:text-white hover:shadow-[0_15px_30px_rgba(23,43,77,0.2)] hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                Eksplorasi Semua Kamar
                <svg class="w-4 h-4 ml-3 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($rooms as $index => $room)
                @if($index < 3) <!-- Only show up to 3 for landing -->
                <a href="{{ route('kamar.detail', $room->id) }}" class="group block relative rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-[0_20px_40px_rgba(23,43,77,0.12)] transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-80 overflow-hidden">
                        @if($room->foto)
                            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400 font-serif">Belum Ada Gambar</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/90 via-kemnaker-900/20 to-transparent opacity-60 group-hover:opacity-80 transition duration-500"></div>
                        
                        <!-- Price Tag -->
                        <div class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-lg">
                            <span class="text-kemnaker-900 font-bold text-sm">Rp {{ number_format($room->harga, 0, ',', '.') }}<span class="text-slate-500 font-normal text-xs">/mlm</span></span>
                        </div>
                        
                        <!-- Title & CTA at Bottom -->
                        <div class="absolute bottom-6 left-6 right-6">
                            <h3 class="text-2xl font-serif font-bold text-white mb-2">{{ $room->nama }}</h3>
                            <div class="flex items-center text-gold-300 text-sm font-semibold uppercase tracking-widest opacity-0 transform translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 delay-100">
                                Lihat Detail
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
            @empty
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center bg-white/50 backdrop-blur-sm rounded-[2rem] border-2 border-dashed border-slate-300 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 w-24 h-24 mb-6 bg-slate-100 rounded-full flex items-center justify-center text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="relative z-10 text-2xl font-serif font-bold text-kemnaker-900 mb-2">Belum Ada Kamar Tersedia</h3>
                    <p class="relative z-10 text-slate-500 font-light max-w-md mx-auto">Kami sedang dalam proses menyiapkan dan mendaftarkan tipe-tipe kamar terbaik untuk kenyamanan menginap Anda. Mohon kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Extra Styles for Ken Burns Effect -->
<style>
    @keyframes kenburns {
        0% { transform: scale(1.05); }
        100% { transform: scale(1.15); }
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var heroVideo = document.getElementById('heroVideo');
        if (heroVideo) {
            heroVideo.addEventListener('timeupdate', function() {
                // Mengulang video secara otomatis di detik ke 27
                if (this.currentTime >= 27) {
                    this.currentTime = 0;
                    this.play();
                }
            });
        }
    });
</script>
@endpush
