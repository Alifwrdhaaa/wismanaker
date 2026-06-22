<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('pemesanan.update', $booking->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="room_id" :value="__('Pilih Kamar / Ruangan')" />
                            <select id="room_id" name="room_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">-- Pilih Kamar --</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id) == $room->id ? 'selected' : '' }}>
                                        {{ $room->nama }} (Rp {{ number_format($room->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_pemesan" :value="__('Nama Pemesan')" />
                                <x-text-input id="nama_pemesan" name="nama_pemesan" type="text" class="mt-1 block w-full" :value="old('nama_pemesan', $booking->nama_pemesan)" required />
                                <x-input-error :messages="$errors->get('nama_pemesan')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="nomor_hp" :value="__('Nomor HP/WA')" />
                                <x-text-input id="nomor_hp" name="nomor_hp" type="text" class="mt-1 block w-full" :value="old('nomor_hp', $booking->nomor_hp)" required />
                                <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="checkin_date" :value="__('Tanggal Check-in')" />
                                <x-text-input id="checkin_date" name="checkin_date" type="date" class="mt-1 block w-full" :value="old('checkin_date', $booking->checkin_date->format('Y-m-d'))" required />
                                <x-input-error :messages="$errors->get('checkin_date')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="checkout_date" :value="__('Tanggal Check-out')" />
                                <x-text-input id="checkout_date" name="checkout_date" type="date" class="mt-1 block w-full" :value="old('checkout_date', $booking->checkout_date->format('Y-m-d'))" required />
                                <x-input-error :messages="$errors->get('checkout_date')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="catatan" :value="__('Catatan (Opsional)')" />
                            <textarea id="catatan" name="catatan" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('catatan', $booking->catatan) }}</textarea>
                            <x-input-error :messages="$errors->get('catatan')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                            <a href="{{ route('pemesanan.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
