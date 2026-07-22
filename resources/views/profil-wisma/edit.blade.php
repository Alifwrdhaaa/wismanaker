<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('profil-wisma.index') }}" class="text-kemnaker-200 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-white tracking-wide">Edit Profil Wisma</h2>
                <p class="text-kemnaker-200 text-sm mt-0.5">Informasi utama yang tampil di halaman publik</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-3xl">
        <div class="admin-card rounded-xl p-8">
            <form method="POST" action="{{ route('profil-wisma.update', $wismaProfile->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="tentang" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Tentang Wisma</label>
                    <textarea id="tentang" name="tentang" rows="4"
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">{{ old('tentang', $wismaProfile->tentang) }}</textarea>
                    @error('tentang') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="3"
                        class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">{{ old('alamat', $wismaProfile->alamat) }}</textarea>
                    @error('alamat') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="whatsapp" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">WhatsApp (format: 6281234…)</label>
                        <input id="whatsapp" name="whatsapp" type="text" value="{{ old('whatsapp', $wismaProfile->whatsapp) }}"
                            placeholder="628123456789"
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('whatsapp') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="maps_url" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Google Maps Embed URL</label>
                        <input id="maps_url" name="maps_url" type="text" value="{{ old('maps_url', $wismaProfile->maps_url) }}"
                            placeholder="https://www.google.com/maps/embed?..."
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        <p class="mt-1 text-xs text-slate-400">Gunakan URL embed dari Google Maps (klik Share → Embed)</p>
                        @error('maps_url') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="instagram" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">Instagram URL</label>
                        <input id="instagram" name="instagram" type="text" value="{{ old('instagram', $wismaProfile->instagram) }}"
                            placeholder="https://instagram.com/..."
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('instagram') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="tiktok" class="block text-sm font-semibold text-kemnaker-700 mb-1.5">TikTok URL</label>
                        <input id="tiktok" name="tiktok" type="text" value="{{ old('tiktok', $wismaProfile->tiktok) }}"
                            placeholder="https://tiktok.com/@..."
                            class="block w-full rounded-lg border-slate-300 focus:border-kemnaker-500 focus:ring-kemnaker-500 shadow-sm text-slate-800">
                        @error('tiktok') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-2 border-t border-slate-100">
                    <button type="submit" class="btn-kemnaker rounded-lg px-6 py-2.5 mt-2">Simpan Perubahan</button>
                    <a href="{{ route('profil-wisma.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition mt-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
