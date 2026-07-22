<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-bold text-2xl text-white uppercase tracking-widest">
            {{ __('Profil Wisma Karya Jasa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-[0_15px_40px_rgba(23,43,77,0.04)] border border-slate-100 overflow-hidden relative animate-fade-in-up mt-8">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-gold-200/20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="p-10 md:p-14 relative z-10">
                    
                    @if(session('success'))
                        <div class="mb-8 bg-green-50 border-l-4 border-green-500 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($profile)
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                            <!-- Detail Column -->
                            <div class="space-y-10">
                                <div>
                                    <div class="inline-flex items-center space-x-2 bg-slate-50 border border-slate-100 px-3 py-1 rounded-full mb-4">
                                        <span class="w-2 h-2 rounded-full bg-gold-400"></span>
                                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Tentang Wisma</span>
                                    </div>
                                    <p class="text-slate-600 font-light leading-relaxed text-lg">{{ $profile->tentang ?? '-' }}</p>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-8 border-t border-slate-100">
                                    <div class="group">
                                        <strong class="flex items-center text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 mb-3 group-hover:text-gold-500 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                            WhatsApp
                                        </strong>
                                        <p class="text-kemnaker-900 font-serif font-bold text-xl">{{ $profile->whatsapp ?? '-' }}</p>
                                    </div>
                                    <div class="group">
                                        <strong class="flex items-center text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 mb-3 group-hover:text-gold-500 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            Alamat Utama
                                        </strong>
                                        <p class="text-kemnaker-900 font-medium leading-relaxed">{{ $profile->alamat ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-8 border-t border-slate-100">
                                    <div class="group">
                                        <strong class="flex items-center text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 mb-3 group-hover:text-gold-500 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                            Instagram
                                        </strong>
                                        @if($profile->instagram)
                                            <a href="{{ $profile->instagram }}" target="_blank" class="text-kemnaker-600 hover:text-gold-500 transition font-bold">{{ $profile->instagram }}</a>
                                        @else
                                            <p class="text-slate-400 font-medium">-</p>
                                        @endif
                                    </div>
                                    <div class="group">
                                        <strong class="flex items-center text-[10px] uppercase tracking-[0.2em] font-bold text-slate-400 mb-3 group-hover:text-gold-500 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            TikTok
                                        </strong>
                                        @if($profile->tiktok)
                                            <a href="{{ $profile->tiktok }}" target="_blank" class="text-kemnaker-600 hover:text-gold-500 transition font-bold">{{ $profile->tiktok }}</a>
                                        @else
                                            <p class="text-slate-400 font-medium">-</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="pt-8">
                                    <a href="{{ route('profil-wisma.edit', $profile->id) }}" class="relative overflow-hidden inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[12px] tracking-[0.2em] uppercase rounded-2xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group/btn">
                                        <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover/btn:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                                        <span class="relative z-10 flex items-center gap-3">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            Ubah Informasi
                                        </span>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Maps Column -->
                            <div class="h-[500px] bg-slate-50 border border-slate-200 rounded-3xl p-3 shadow-inner relative group overflow-hidden">
                                <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-md z-10 flex items-center space-x-2">
                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                    <strong class="text-[10px] uppercase tracking-[0.2em] font-bold text-slate-600">Google Maps</strong>
                                </div>
                                
                                <div class="w-full h-full rounded-2xl overflow-hidden bg-slate-100">
                                    @if($profile->maps_url)
                                        <iframe src="{{ $profile->maps_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" class="w-full h-full filter grayscale-[50%] group-hover:grayscale-0 transition-all duration-1000 transform group-hover:scale-105"></iframe>
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                            <svg class="w-16 h-16 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <span class="font-serif font-bold text-lg text-slate-500">URL Peta Kosong</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto p-12 rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50/50 my-10">
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-sm mb-6">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-kemnaker-900 mb-3">Profil Belum Diatur</h3>
                            <p class="text-sm text-slate-500 font-light text-center leading-relaxed mb-8">Silakan lengkapi informasi utama Wisma Karya Jasa agar tampil memukau di halaman publik.</p>
                            <a href="{{ route('profil-wisma.create') }}" class="relative overflow-hidden inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[12px] tracking-[0.2em] uppercase rounded-2xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group/btn">
                                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover/btn:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                                <span class="relative z-10 flex items-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Buat Profil Baru
                                </span>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
