<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kamar & Ruangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('kamar.update', $room->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="nama" :value="__('Nama Kamar / Ruangan')" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $room->nama)" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="harga" :value="__('Harga (Rp)')" />
                                <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full" :value="old('harga', $room->harga)" required min="0" />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="jumlah_unit" :value="__('Jumlah Unit')" />
                                <x-text-input id="jumlah_unit" name="jumlah_unit" type="number" class="mt-1 block w-full" :value="old('jumlah_unit', $room->jumlah_unit)" required min="1" />
                                <x-input-error :messages="$errors->get('jumlah_unit')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="foto" :value="__('Foto Kamar')" />
                            @if($room->foto)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($room->foto) }}" alt="Foto Kamar" class="h-32 object-cover rounded">
                                </div>
                            @endif
                            <input type="file" id="foto" name="foto" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" accept="image/*" />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Biarkan kosong jika tidak ingin mengubah foto.</p>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('deskripsi', $room->deskripsi) }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                            <a href="{{ route('kamar.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
