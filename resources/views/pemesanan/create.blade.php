<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('pemesanan.index') }}" class="text-kemnaker-200 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Tambah Booking</h2>
                <p class="text-kemnaker-200 text-sm mt-0.5">Catat pemesanan kamar baru</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="admin-card rounded-xl p-8">
            <form method="POST" action="{{ route('pemesanan.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="room_id" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Kamar / Ruangan <span class="text-red-500">*</span></label>
                    <select id="room_id" name="room_id" required
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        <option value="">-- Pilih Kamar --</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                {{ $room->nama }} — Rp {{ number_format($room->harga, 0, ',', '.') }}/malam
                            </option>
                        @endforeach
                    </select>
                    @error('room_id') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_pemesan" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Nama Pemesan <span class="text-red-500">*</span></label>
                        <input id="nama_pemesan" name="nama_pemesan" type="text" value="{{ old('nama_pemesan') }}" required
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('nama_pemesan') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="nomor_hp" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Nomor HP / WA <span class="text-red-500">*</span></label>
                        <input id="nomor_hp" name="nomor_hp" type="text" value="{{ old('nomor_hp') }}" required
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('nomor_hp') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="checkin_date" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Tanggal Check-in <span class="text-red-500">*</span></label>
                        <input id="checkin_date" name="checkin_date" type="date" value="{{ old('checkin_date') }}" required
                            min="{{ now()->format('Y-m-d') }}"
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('checkin_date') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="checkout_date" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Tanggal Check-out <span class="text-red-500">*</span></label>
                        <input id="checkout_date" name="checkout_date" type="date" value="{{ old('checkout_date') }}" required
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('checkout_date') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="jumlah_kamar" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Jumlah Kamar <span class="text-red-500">*</span></label>
                    <input id="jumlah_kamar" name="jumlah_kamar" type="number" min="1" value="{{ old('jumlah_kamar', 1) }}" required
                        class="block w-full md:w-1/2 rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                    @error('jumlah_kamar') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="catatan" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Catatan (Opsional)</label>
                    <textarea id="catatan" name="catatan" rows="3"
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">{{ old('catatan') }}</textarea>
                    @error('catatan') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="btn-kemnaker rounded-lg px-6 py-2.5">Simpan Booking</button>
                    <a href="{{ route('pemesanan.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
