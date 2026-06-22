<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profil Wisma') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('profil-wisma.update', $wismaProfile->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="tentang" :value="__('Tentang Wisma')" />
                            <textarea id="tentang" name="tentang" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('tentang', $wismaProfile->tentang) }}</textarea>
                            <x-input-error :messages="$errors->get('tentang')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="whatsapp" :value="__('WhatsApp (Gunakan format +62)')" />
                            <x-text-input id="whatsapp" name="whatsapp" type="text" class="mt-1 block w-full" :value="old('whatsapp', $wismaProfile->whatsapp)" />
                            <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="instagram" :value="__('Instagram URL')" />
                            <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full" :value="old('instagram', $wismaProfile->instagram)" />
                            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tiktok" :value="__('TikTok URL')" />
                            <x-text-input id="tiktok" name="tiktok" type="text" class="mt-1 block w-full" :value="old('tiktok', $wismaProfile->tiktok)" />
                            <x-input-error :messages="$errors->get('tiktok')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
                            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('alamat', $wismaProfile->alamat) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="maps_url" :value="__('Google Maps URL')" />
                            <x-text-input id="maps_url" name="maps_url" type="text" class="mt-1 block w-full" :value="old('maps_url', $wismaProfile->maps_url)" />
                            <x-input-error :messages="$errors->get('maps_url')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                            <a href="{{ route('profil-wisma.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
