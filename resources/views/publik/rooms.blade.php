@extends('layouts.public')

@section('title', 'Kamar & Ruangan')

@section('content')
<!-- Hero Section -->
<div class="relative h-[65vh] bg-kemnaker-900 overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
        <!-- Using a premium master suite photo -->
        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
             alt="Premium Room" 
             class="w-full h-full object-cover opacity-40 scale-105 animate-[kenburns_20s_ease-out_infinite_alternate]">
        <!-- Smooth gradient transition to content area -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#F8FAFC] via-kemnaker-900/60 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center mt-20 animate-fade-in-up">
        <div class="inline-flex items-center space-x-3 mb-6 justify-center">
            <span class="w-12 h-[2px] bg-gold-500"></span>
            <span class="text-gold-400 font-bold uppercase tracking-[0.3em] text-[10px] md:text-xs">Koleksi Terbatas</span>
            <span class="w-12 h-[2px] bg-gold-500"></span>
        </div>
        <h1 class="text-6xl md:text-8xl font-serif font-extrabold text-white mb-6 tracking-tight drop-shadow-2xl">
            Kamar <span class="italic font-light text-gold-300">Premium</span>
        </h1>
        <p class="text-lg md:text-xl text-kemnaker-100 font-medium max-w-2xl mx-auto leading-relaxed drop-shadow-md">
            Simfoni kenyamanan absolut dan kemewahan tak lekang oleh waktu. Temukan ruang istirahat paripurna Anda.
        </p>
    </div>
</div>

<!-- Rooms Grid -->
<div class="py-24 bg-[#F8FAFC] relative z-20">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
            @forelse($rooms as $room)
                <div class="group flex flex-col bg-white rounded-[2rem] overflow-hidden shadow-[0_10px_40px_rgba(23,43,77,0.06)] border border-slate-100 hover:shadow-[0_25px_50px_rgba(212,175,55,0.1)] hover:border-gold-500/30 transition-all duration-700 hover:-translate-y-2">
                    <!-- Image Wrapper -->
                    <div class="relative h-80 overflow-hidden">
                        @if($room->foto)
                            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 font-serif">Belum Ada Gambar</div>
                        @endif
                        
                        <!-- Overlay & Status -->
                        <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/90 via-kemnaker-900/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-700"></div>
                        
                        <!-- Availability Badge -->
                        <div class="absolute top-6 left-6">
                            <span class="px-4 py-2 bg-white/95 backdrop-blur-md rounded-full text-[10px] font-bold text-kemnaker-900 uppercase tracking-widest shadow-xl border border-white/50">
                                {{ $room->available_today }} Unit Tersedia Hari Ini
                            </span>
                        </div>
                    </div>
                    
                    <!-- Content Wrapper -->
                    <div class="p-8 flex-grow flex flex-col relative bg-white">
                        <!-- Floating Price Badge -->
                        <div class="absolute -top-10 right-8 bg-gradient-to-br from-gold-400 to-gold-600 text-white shadow-[0_15px_30px_rgba(212,175,55,0.3)] px-6 py-4 rounded-[1.25rem] transform transition-transform duration-500 group-hover:-translate-y-2 group-hover:shadow-[0_20px_40px_rgba(212,175,55,0.4)] border border-white/20">
                            <span class="block text-xl md:text-2xl font-bold font-serif leading-none tracking-wide">Rp {{ number_format($room->harga, 0, ',', '.') }}</span>
                            <span class="block text-[9px] uppercase tracking-[0.2em] font-bold opacity-90 mt-1.5 text-center">Per Malam</span>
                        </div>
                        
                        <h3 class="text-3xl font-serif font-bold text-kemnaker-900 mb-2 mt-4 group-hover:text-gold-600 transition-colors duration-300">{{ $room->nama }}</h3>
                        <div class="w-10 h-0.5 bg-gold-500 mb-5 transform scale-x-100 group-hover:scale-x-150 origin-left transition-transform duration-500"></div>
                        
                        <p class="text-slate-500 text-sm font-light leading-relaxed mb-10 flex-grow line-clamp-3">
                            {{ $room->deskripsi ?? 'Kamar elegan dengan fasilitas eksklusif, memberikan kenyamanan maksimal bagi tamu saat menginap di Wisma Karya Jasa.' }}
                        </p>
                        
                        <!-- Action Button -->
                        <div class="mt-auto border-t border-slate-100 pt-6">
                            <a href="{{ route('kamar.detail', $room->id) }}" class="flex items-center w-full text-kemnaker-900 font-bold uppercase tracking-[0.2em] text-xs group-hover:text-gold-500 transition-colors duration-300">
                                <span>Lihat Detail & Pesan</span>
                                <div class="flex-1 relative h-10 ml-4">
                                    <span class="absolute left-0 group-hover:left-[calc(100%-2.5rem)] w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center group-hover:border-gold-500 group-hover:bg-gold-50 transition-all duration-[600ms] ease-in-out shadow-sm group-hover:shadow-md">
                                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300 delay-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center bg-white/50 backdrop-blur-sm rounded-[2rem] border-2 border-dashed border-slate-300 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 w-24 h-24 mb-6 bg-slate-100 rounded-full flex items-center justify-center text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <h3 class="relative z-10 text-2xl font-serif font-bold text-kemnaker-900 mb-2">Kamar Belum Tersedia</h3>
                    <p class="relative z-10 text-slate-500 font-light max-w-md mx-auto">Koleksi kamar premium kami sedang dalam tahap persiapan akhir. Mohon kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    @keyframes kenburns {
        0% { transform: scale(1.05); }
        100% { transform: scale(1.15); }
    }
</style>
@endsection
