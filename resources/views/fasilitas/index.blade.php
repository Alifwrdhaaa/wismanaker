<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Manajemen Fasilitas</h2>
                <p class="text-kemnaker-200 text-sm mt-1">Kelola data fasilitas wisma</p>
            </div>
            <a href="{{ route('fasilitas.create') }}" class="relative overflow-hidden inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[11px] tracking-[0.2em] uppercase rounded-xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group/btn">
                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover/btn:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Fasilitas
                </span>
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="alert-success rounded-lg mb-6">
            <svg class="h-5 w-5 text-green-500 mr-3 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-[0_15px_40px_rgba(23,43,77,0.04)] border border-slate-100 overflow-hidden relative animate-fade-in-up mt-8">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-gold-200/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="p-10 relative z-10">
            <div class="overflow-hidden border border-slate-200 rounded-3xl shadow-sm">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Foto</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Nama Fasilitas</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Deskripsi</th>
                            <th class="px-8 py-5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-widest">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                    @forelse($facilities as $facility)
                        <tr class="hover:bg-slate-50/80 transition-colors duration-200">
                            <td class="px-8 py-5 whitespace-nowrap">
                                @if($facility->foto)
                                    <div class="w-24 h-16 rounded-xl overflow-hidden shadow-sm border border-slate-200">
                                        <img src="{{ Storage::url($facility->foto) }}" alt="{{ $facility->nama }}" class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-24 h-16 rounded-xl bg-slate-100 flex items-center justify-center text-xs font-medium text-slate-400 border border-slate-200 shadow-inner">
                                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap font-serif font-bold text-kemnaker-900 text-base">{{ $facility->nama }}</td>
                            <td class="px-8 py-5">
                                <div class="text-slate-500 text-xs max-w-sm line-clamp-2 leading-relaxed">{{ $facility->deskripsi ?? '-' }}</div>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap text-right text-sm">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('fasilitas.edit', $facility->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-kemnaker-50 text-kemnaker-600 hover:bg-kemnaker-600 hover:text-white transition-colors duration-200" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('fasilitas.destroy', $facility->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus fasilitas ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-colors duration-200" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center justify-center w-full max-w-sm mx-auto p-10 rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50/50">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-5">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-serif font-bold text-kemnaker-900 mb-2">Belum Ada Fasilitas</h3>
                                    <p class="text-sm text-slate-500 font-light text-center leading-relaxed mb-6">Tingkatkan daya tarik penginapan Anda dengan menambahkan berbagai fasilitas layanan.</p>
                                    
                                    <a href="{{ route('fasilitas.create') }}" class="inline-flex items-center px-6 py-2.5 bg-kemnaker-900 text-white text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-gold-500 hover:shadow-lg transition-all duration-300">
                                        Tambah Fasilitas
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-8 py-5 border-t border-slate-100 bg-slate-50/50">
                {{ $facilities->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
