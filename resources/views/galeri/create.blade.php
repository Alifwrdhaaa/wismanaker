<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('galeri.index') }}" class="text-kemnaker-200 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Upload Foto Galeri</h2>
                <p class="text-kemnaker-200 text-sm mt-0.5">Tambah foto baru ke galeri wisma</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="admin-card rounded-xl p-8">
            <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="judul" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Judul Foto <span class="text-red-500">*</span></label>
                    <input id="judul" name="judul" type="text" value="{{ old('judul') }}" required autofocus
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                    @error('judul') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="foto" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">File Foto <span class="text-red-500">*</span></label>
                    <input type="file" id="foto" name="foto" accept="image/*" required
                        class="block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-kemnaker-50 file:text-kemnaker-700 hover:file:bg-kemnaker-100 transition">
                    @error('foto') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="btn-kemnaker rounded-lg px-6 py-2.5">Upload Foto</button>
                    <a href="{{ route('galeri.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
