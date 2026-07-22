<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('kamar.index') }}" class="text-kemnaker-200 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Edit Kamar</h2>
                <p class="text-kemnaker-200 text-sm mt-0.5">{{ $room->nama }}</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="admin-card rounded-xl p-8">
            <form method="POST" action="{{ route('kamar.update', $room->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nama" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Nama Kamar / Ruangan <span class="text-red-500">*</span></label>
                    <input id="nama" name="nama" type="text" value="{{ old('nama', $room->nama) }}" required autofocus
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                    @error('nama') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Harga per Malam (Rp) <span class="text-red-500">*</span></label>
                        <input id="harga" name="harga" type="number" value="{{ old('harga', $room->harga) }}" required min="0"
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('harga') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="jumlah_unit" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Jumlah Unit <span class="text-red-500">*</span></label>
                        <input id="jumlah_unit" name="jumlah_unit" type="number" value="{{ old('jumlah_unit', $room->jumlah_unit) }}" required min="1"
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('jumlah_unit') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="foto" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Foto Kamar</label>
                    @if($room->foto)
                        <div class="mb-3">
                            <img src="{{ Storage::url($room->foto) }}" alt="Foto Kamar" class="h-40 object-cover rounded-lg border border-slate-200 shadow-sm">
                            <p class="text-xs text-slate-400 mt-1">Foto saat ini</p>
                        </div>
                    @endif
                    <input type="file" id="foto" name="foto" accept="image/*"
                        class="block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-kemnaker-50 file:text-kemnaker-700 hover:file:bg-kemnaker-100 transition">
                    <p class="mt-1 text-xs text-slate-400">Biarkan kosong jika tidak ingin mengubah foto.</p>
                    @error('foto') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">{{ old('deskripsi', $room->deskripsi) }}</textarea>
                    @error('deskripsi') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="btn-kemnaker rounded-lg px-6 py-2.5">Simpan Perubahan</button>
                    <a href="{{ route('kamar.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
