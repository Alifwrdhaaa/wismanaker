@extends('layouts.public')

@section('title', 'Fasilitas')

@section('content')
<!-- Hero Section -->
<div class="relative h-[60vh] bg-kemnaker-900 overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
        <!-- Fix image to a reliable premium resort facilities image -->
        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
             alt="Facilities View" 
             class="w-full h-full object-cover opacity-40 scale-105 animate-[kenburns_20s_ease-out_infinite_alternate]">
        <!-- Make gradient more elegant and dark, smoothly transitioning -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#F8FAFC] via-[#F8FAFC]/10 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-kemnaker-900/80 via-transparent to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center mt-20 animate-fade-in-up">
        <div class="inline-flex items-center space-x-3 mb-6 justify-center">
            <span class="w-12 h-[2px] bg-gold-500"></span>
            <span class="text-gold-400 font-bold uppercase tracking-[0.3em] text-xs">Layanan Ekstraksi</span>
            <span class="w-12 h-[2px] bg-gold-500"></span>
        </div>
        <h1 class="text-5xl md:text-7xl font-serif font-extrabold text-white mb-6 tracking-tight drop-shadow-2xl">
            Fasilitas <span class="italic font-light text-gold-300">Eksklusif</span>
        </h1>
        <p class="text-lg text-kemnaker-100 font-medium max-w-2xl mx-auto leading-relaxed drop-shadow-md">
            Menghadirkan layanan komprehensif yang dirancang untuk mendukung segala aktivitas operasional, relaksasi, dan kebutuhan acara Anda.
        </p>
    </div>
</div>

<!-- Facilities Grid -->
<div class="py-24 bg-[#F8FAFC] relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($facilities as $facility)
                <div class="group relative bg-white rounded-[2rem] overflow-hidden shadow-[0_10px_30px_rgba(23,43,77,0.04)] border border-slate-100 hover:shadow-[0_20px_50px_rgba(23,43,77,0.12)] transition-all duration-500 hover:-translate-y-2 flex flex-col">
                    <div class="relative h-64 overflow-hidden">
                        <div class="absolute inset-0 bg-kemnaker-900/10 group-hover:bg-transparent transition duration-500 z-10"></div>
                        @if($facility->foto)
                            <img src="{{ Storage::url($facility->foto) }}" alt="{{ $facility->nama }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 font-serif">Belum Ada Gambar</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/90 via-kemnaker-900/20 to-transparent z-10 opacity-70 group-hover:opacity-90 transition-opacity duration-500"></div>
                        <div class="absolute bottom-6 left-6 z-20">
                            <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mb-3 border border-white/30 group-hover:bg-gold-500 group-hover:border-gold-500 transition-colors duration-500">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-white group-hover:text-gold-400 transition-colors duration-300">{{ $facility->nama }}</h3>
                        </div>
                    </div>
                    <div class="p-8 flex-grow">
                        <p class="text-slate-500 font-light leading-relaxed text-sm">{{ $facility->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center bg-white/50 backdrop-blur-sm rounded-[2rem] border-2 border-dashed border-slate-300 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 w-24 h-24 mb-6 bg-slate-100 rounded-full flex items-center justify-center text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="relative z-10 text-2xl font-serif font-bold text-kemnaker-900 mb-2">Belum Ada Fasilitas</h3>
                    <p class="relative z-10 text-slate-500 font-light max-w-md mx-auto">Kami sedang mempersiapkan daftar layanan dan fasilitas premium kami. Mohon kembali lagi nanti untuk melihat detail layanan eksklusif yang kami sediakan.</p>
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
