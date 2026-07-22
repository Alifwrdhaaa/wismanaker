<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Booking Management</h2>
                <p class="text-kemnaker-200 text-sm mt-1">Data pemesanan kamar wisma</p>
            </div>
            <a href="{{ route('pemesanan.create') }}" class="relative overflow-hidden inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-gold-400 to-gold-600 text-kemnaker-900 font-extrabold text-[11px] tracking-[0.2em] uppercase rounded-xl shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:shadow-[0_20px_40px_rgba(212,175,55,0.5)] hover:-translate-y-1 transition-all duration-300 group/btn">
                <span class="absolute top-0 left-0 w-full h-full bg-white/40 skew-x-[-45deg] -translate-x-[150%] group-hover/btn:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Reservasi
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
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Kamar</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Jml.</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Nama Pemesan</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">No. HP</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Check In</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Check Out</th>
                            <th class="px-8 py-5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Catatan</th>
                            <th class="px-8 py-5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-widest">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-slate-50/80 transition-colors duration-200">
                            <td class="px-8 py-5 whitespace-nowrap font-serif font-bold text-kemnaker-900 text-base">
                                {{ $booking->kamar->nama ?? '-' }}
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap font-bold text-kemnaker-600">{{ $booking->jumlah_kamar }}</td>
                            <td class="px-8 py-5 whitespace-nowrap font-bold text-slate-700">{{ $booking->nama_pemesan }}</td>
                            <td class="px-8 py-5 whitespace-nowrap font-medium text-slate-500">{{ $booking->nomor_hp }}</td>
                            <td class="px-8 py-5 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 border border-green-200 text-green-700 shadow-sm">
                                    {{ $booking->checkin_date->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-50 border border-red-200 text-red-700 shadow-sm">
                                    {{ $booking->checkout_date->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="text-slate-500 text-xs max-w-xs line-clamp-2 leading-relaxed">{{ $booking->catatan ?? '-' }}</div>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap text-right text-sm">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('pemesanan.edit', $booking->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-kemnaker-50 text-kemnaker-600 hover:bg-kemnaker-600 hover:text-white transition-colors duration-200" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('pemesanan.destroy', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data reservasi ini?');">
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
                            <td colspan="7" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center justify-center w-full max-w-sm mx-auto p-10 rounded-[2rem] border-2 border-dashed border-slate-200 bg-slate-50/50">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-5">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-serif font-bold text-kemnaker-900 mb-2">Belum Ada Reservasi</h3>
                                    <p class="text-sm text-slate-500 font-light text-center leading-relaxed mb-6">Saat ini belum ada data pemesanan kamar yang aktif. Anda dapat menambahkannya secara manual.</p>
                                    
                                    <a href="{{ route('pemesanan.create') }}" class="inline-flex items-center px-6 py-2.5 bg-kemnaker-900 text-white text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-gold-500 hover:shadow-lg transition-all duration-300">
                                        Tambah Reservasi
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-8 py-5 border-t border-slate-100 bg-slate-50/50">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
