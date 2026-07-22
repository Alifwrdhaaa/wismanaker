<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('fasilitas.index') }}" class="text-kemnaker-200 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Tambah Fasilitas</h2>
                <p class="text-kemnaker-200 text-sm mt-0.5">Isi data fasilitas baru</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="admin-card rounded-xl p-8">
            <form method="POST" action="{{ route('fasilitas.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Nama Fasilitas <span class="text-red-500">*</span></label>
                    <input id="nama" name="nama" type="text" value="{{ old('nama') }}" required autofocus
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800 placeholder-slate-400">
                    @error('nama') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="foto" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Foto Fasilitas</label>
                    <input type="file" id="foto" name="foto" accept="image/*"
                        class="block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-kemnaker-50 file:text-kemnaker-700 hover:file:bg-kemnaker-100 transition">
                    @error('foto') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800 placeholder-slate-400">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="btn-kemnaker rounded-lg px-6 py-2.5">Simpan Fasilitas</button>
                    <a href="{{ route('fasilitas.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
