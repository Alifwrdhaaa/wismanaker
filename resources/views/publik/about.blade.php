@extends('layouts.public')

@section('title', 'Kisah & Filosofi')

@section('content')
<!-- Hero Section -->
<div class="relative h-[65vh] bg-kemnaker-900 overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 z-0">
        <!-- Fix image to a reliable architecture/nature image -->
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
             alt="About View" 
             class="w-full h-full object-cover opacity-40 scale-105 animate-[kenburns_20s_ease-out_infinite_alternate]">
        <!-- Make gradient more elegant and dark, smoothly transitioning to the next section color -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#F8FAFC] via-[#F8FAFC]/10 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-kemnaker-900/80 via-transparent to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center mt-20 animate-fade-in-up">
        <div class="inline-flex items-center space-x-3 mb-6 justify-center">
            <span class="w-12 h-[2px] bg-gold-500"></span>
            <span class="text-gold-400 font-bold uppercase tracking-[0.3em] text-xs">Identitas & Dedikasi</span>
            <span class="w-12 h-[2px] bg-gold-500"></span>
        </div>
        <h1 class="text-5xl md:text-7xl font-serif font-extrabold text-white mb-6 tracking-tight drop-shadow-2xl">
            Kisah <span class="italic font-light text-gold-300">Kami</span>
        </h1>
        <p class="text-lg text-kemnaker-100 font-medium max-w-2xl mx-auto leading-relaxed drop-shadow-md">
            Mengenal lebih dekat filosofi, pelayanan, dan komitmen Wisma Karya Jasa sebagai fasilitas penginapan kebanggaan Kementerian Ketenagakerjaan RI.
        </p>
    </div>
</div>

<div class="py-20 lg:py-32 bg-[#F8FAFC] relative z-20">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Editorial Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-8 items-center mb-32">
            
            <!-- Text Content (Left side, spanning 5 cols) -->
            <div class="lg:col-span-5 lg:pr-8 animate-fade-in-up order-2 lg:order-1" style="animation-delay: 0.15s;">
                <div class="inline-flex items-center space-x-3 mb-6">
                    <span class="w-12 h-[2px] bg-gold-500"></span>
                    <span class="text-gold-600 font-bold uppercase tracking-[0.2em] text-xs">Profil Wisma</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-serif font-extrabold text-kemnaker-900 mb-8 leading-[1.15] tracking-tight">
                    Filosofi Pelayanan <br><span class="text-kemnaker-600 italic font-light">& Dedikasi Kami</span>
                </h2>
                
                <div class="prose prose-lg text-slate-600 leading-loose font-light mb-12 relative">
                    <!-- Drop cap effect using pseudo-element or class -->
                    <p class="first-letter:text-7xl first-letter:font-serif first-letter:text-kemnaker-900 first-letter:mr-3 first-letter:float-left first-letter:font-extrabold relative z-10">
                        {{ $profile->tentang ?? 'Profil mengenai dedikasi dan sejarah belum tersedia. Kami akan segera memperbaruinya.' }}
                    </p>
                </div>

                <div class="w-24 h-[1px] bg-slate-300 mb-12"></div>


                <!-- Contact Card -->
                <div class="bg-white shadow-[0_15px_40px_rgba(23,43,77,0.05)] border border-slate-100 rounded-[2rem] p-8 lg:p-10 relative overflow-hidden group hover:shadow-[0_20px_50px_rgba(23,43,77,0.1)] transition-all duration-500">
                    <!-- Deco Circle -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-kemnaker-50 rounded-bl-full -z-0 transition-transform duration-700 group-hover:scale-[2] group-hover:bg-kemnaker-100/50"></div>
                    
                    <h3 class="text-xl font-bold text-kemnaker-900 mb-8 relative z-10 flex items-center">
                        <span class="w-2 h-2 rounded-full bg-gold-400 mr-3 animate-pulse"></span>
                        Pusat Layanan Informasi
                    </h3>
                    
                    <ul class="space-y-6 relative z-10">
                        <li class="flex items-start">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center mr-5 text-kemnaker-600 flex-shrink-0 group-hover:bg-kemnaker-600 group-hover:text-white group-hover:border-kemnaker-600 transition-all duration-300 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div class="pt-1">
                                <span class="block text-[10px] uppercase tracking-[0.15em] text-slate-400 font-bold mb-1">Alamat Resmi</span>
                                <span class="text-slate-700 font-medium text-sm leading-relaxed">{{ $profile->alamat ?? 'Alamat belum tersedia.' }}</span>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center mr-5 text-green-600 flex-shrink-0 group-hover:bg-green-500 group-hover:text-white group-hover:border-green-500 transition-all duration-300 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div class="pt-1">
                                <span class="block text-[10px] uppercase tracking-[0.15em] text-slate-400 font-bold mb-1">WhatsApp / Telepon</span>
                                <span class="text-slate-700 font-medium text-sm">{{ $profile->whatsapp ?? 'Nomor belum tersedia.' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Image Side (Right side, spanning 7 cols) -->
            <div class="lg:col-span-7 relative group animate-fade-in-up order-1 lg:order-2">
                <!-- Decorative Dark Block -->
                <div class="absolute inset-0 bg-kemnaker-900 rounded-[2.5rem] transform -translate-x-4 translate-y-4 lg:translate-x-6 lg:translate-y-6 -z-10 transition duration-700 group-hover:translate-x-8 group-hover:translate-y-8"></div>
                
                <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl relative h-[400px] md:h-[500px] lg:h-[700px] border border-white/50">
                    <!-- Fix broken image to reliable one -->
                    <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Resort Architecture" class="w-full h-full object-cover transition duration-[2000ms] group-hover:scale-110">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/60 to-transparent opacity-40 group-hover:opacity-20 transition-opacity duration-700"></div>

                    <!-- Floating Glass Card -->
                    <div class="absolute bottom-6 left-4 right-4 lg:bottom-10 lg:left-10 lg:right-10 bg-white/95 backdrop-blur-xl p-6 lg:p-8 text-center rounded-[2rem] border border-white shadow-[0_15px_30px_rgba(23,43,77,0.15)] transform transition duration-500 hover:-translate-y-2">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 bg-gold-500 rounded-full flex items-center justify-center mx-auto mb-4 -mt-12 lg:-mt-14 shadow-lg border-4 border-white text-white">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                        <span class="font-serif text-2xl lg:text-3xl font-extrabold text-kemnaker-900 block mb-1">Kemnaker RI</span>
                        <span class="text-[9px] lg:text-[10px] uppercase tracking-[0.2em] text-slate-500 font-bold">Berdiri Melayani Negeri</span>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -left-6 w-32 h-32 bg-[radial-gradient(#d4af37_2px,transparent_2px)] [background-size:16px_16px] opacity-20 z-0"></div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16 animate-fade-in-up">
            <div class="flex items-center justify-center mb-10">
                <span class="h-[1px] w-12 bg-gold-400"></span>
                <h3 class="text-xl font-serif font-bold text-kemnaker-900 uppercase tracking-[0.2em] px-6">Lokasi Kami</h3>
                <span class="h-[1px] w-12 bg-gold-400"></span>
            </div>
            
            <div class="w-full h-[500px] bg-white rounded-[2.5rem] overflow-hidden shadow-[0_20px_60px_rgba(23,43,77,0.1)] border-[8px] border-white relative group">
                @if($profile && $profile->maps_url)
                    <!-- Overlay to prevent accidental scroll captures, removes on hover -->
                    <div class="absolute inset-0 bg-kemnaker-900/10 pointer-events-none group-hover:opacity-0 transition duration-500 z-10"></div>
                    <iframe src="{{ $profile->maps_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" class="filter grayscale contrast-125 opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition duration-1000"></iframe>
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-50 text-slate-400">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-300">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="font-bold text-sm tracking-widest uppercase">Peta Belum Dikonfigurasi</span>
                    </div>
                @endif
            </div>
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
