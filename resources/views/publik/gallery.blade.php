@extends('layouts.public')

@section('title', 'Galeri')

@section('content')
<!-- Hero Section -->
<div class="relative h-[60vh] bg-kemnaker-900 overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
        <!-- Using a high quality interior/resort photo for gallery hero -->
        <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
             alt="Gallery View" 
             class="w-full h-full object-cover opacity-40 scale-105 animate-[kenburns_20s_ease-out_infinite_alternate]">
        <!-- Make gradient more elegant and dark, smoothly transitioning to light background -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#F8FAFC] via-[#F8FAFC]/10 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-kemnaker-900/80 via-transparent to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center mt-20 animate-fade-in-up">
        <div class="inline-flex items-center space-x-3 mb-6 justify-center">
            <span class="w-12 h-[2px] bg-gold-500"></span>
            <span class="text-gold-400 font-bold uppercase tracking-[0.3em] text-xs">Visualisasi Keindahan</span>
            <span class="w-12 h-[2px] bg-gold-500"></span>
        </div>
        <h1 class="text-5xl md:text-7xl font-serif font-extrabold text-white mb-6 tracking-tight drop-shadow-2xl">
            Galeri <span class="italic font-light text-gold-300">Wisma</span>
        </h1>
        <p class="text-lg text-kemnaker-100 font-medium max-w-2xl mx-auto leading-relaxed drop-shadow-md">
            Potret fasilitas, arsitektur, dan estetika yang menceritakan harmoni sempurna di Wisma Karya Jasa.
        </p>
    </div>
</div>

<!-- Gallery Grid -->
<div class="py-24 bg-[#F8FAFC] relative z-20">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
            @forelse($galleries as $gallery)
                <div class="relative group overflow-hidden rounded-[2rem] shadow-[0_10px_30px_rgba(23,43,77,0.08)] border border-slate-100 hover:shadow-[0_20px_50px_rgba(23,43,77,0.15)] transition duration-500 bg-white">
                    <!-- Image -->
                    <img src="{{ Storage::url($gallery->foto) }}" alt="{{ $gallery->judul }}" class="w-full h-80 md:h-96 object-cover transform transition duration-[1500ms] group-hover:scale-110">
                    
                    <!-- Hover Content Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/95 via-kemnaker-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8 z-20">
                        <div class="transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-gold-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Koleksi Visual</span>
                            <h3 class="text-white font-serif font-bold text-2xl tracking-wide mb-4 leading-tight">{{ $gallery->judul }}</h3>
                            <div class="w-12 h-1 bg-gold-500 transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-700 delay-100"></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center bg-white/50 backdrop-blur-sm rounded-[2rem] border-2 border-dashed border-slate-300 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-gold-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10 w-24 h-24 mb-6 bg-slate-100 rounded-full flex items-center justify-center text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="relative z-10 text-2xl font-serif font-bold text-kemnaker-900 mb-2">Belum Ada Koleksi Foto</h3>
                    <p class="relative z-10 text-slate-500 font-light max-w-md mx-auto">Tim kami sedang mempersiapkan kurasi foto terbaik dari Wisma Karya Jasa. Mohon kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($galleries->hasPages())
        <div class="mt-20 flex justify-center">
            <div class="bg-white p-2 rounded-2xl border border-slate-200 shadow-[0_10px_30px_rgba(23,43,77,0.05)] inline-block">
                {{ $galleries->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    @keyframes kenburns {
        0% { transform: scale(1.05); }
        100% { transform: scale(1.15); }
    }
</style>
@endsection
