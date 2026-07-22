<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-serif font-bold text-2xl text-white uppercase tracking-widest">
                {{ __('Manajemen Galeri') }}
            </h2>
            <a href="{{ route('galeri.create') }}" class="relative overflow-hidden inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[11px] tracking-[0.2em] uppercase rounded-xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group/btn">
                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover/btn:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Foto
                </span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-[0_15px_40px_rgba(23,43,77,0.04)] border border-slate-100 overflow-hidden relative animate-fade-in-up mt-8">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-gold-200/20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="p-10 relative z-10">

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4">
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

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @forelse($galleries as $gallery)
                            <div class="bg-slate-50 rounded-3xl overflow-hidden shadow-sm border border-slate-200 group relative hover:shadow-[0_15px_30px_rgba(23,43,77,0.08)] hover:-translate-y-2 transition-all duration-300">
                                @if($gallery->foto && Storage::disk('public')->exists($gallery->foto))
                                    <img src="{{ Storage::url($gallery->foto) }}" alt="{{ $gallery->judul }}" class="w-full h-64 object-cover transform transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-64 bg-slate-100 flex flex-col items-center justify-center text-slate-300 transform transition-transform duration-700 group-hover:scale-105">
                                        <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span class="text-[10px] uppercase tracking-widest font-bold">Tanpa Foto</span>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-kemnaker-900/90 via-kemnaker-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <h3 class="font-serif font-bold text-white text-lg truncate mb-3">{{ $gallery->judul }}</h3>
                                    
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('galeri.edit', $gallery->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-white/20 text-white hover:bg-white hover:text-kemnaker-900 backdrop-blur-sm transition-colors duration-200" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                        </a>
                                        <form action="{{ route('galeri.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-500/80 text-white hover:bg-red-500 backdrop-blur-sm transition-colors duration-200" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="flex flex-col items-center justify-center w-full max-w-md mx-auto p-12 rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50/50">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-6">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-serif font-bold text-kemnaker-900 mb-3">Galeri Masih Kosong</h3>
                                    <p class="text-sm text-slate-500 font-light text-center leading-relaxed mb-8">Pamerkan keindahan fasilitas, kamar, dan lingkungan wisma Anda dengan mengunggah foto berkualitas tinggi ke galeri.</p>
                                    
                                    <a href="{{ route('galeri.create') }}" class="inline-flex items-center px-8 py-3 bg-kemnaker-900 text-white text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-gold-500 hover:shadow-lg transition-all duration-300">
                                        Unggah Foto Pertama
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-10">
                        {{ $galleries->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
