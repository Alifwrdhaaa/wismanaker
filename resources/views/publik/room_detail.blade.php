@extends('layouts.public')

@section('title', $room->nama)

@section('content')
<div class="py-12 bg-gray-50" x-data="bookingForm({{ json_encode($bookedDates) }}, '{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}', '{{ addslashes($room->nama) }}')">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500 font-medium">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('kamar.public') }}" class="hover:text-blue-600 transition">Kamar & Ruangan</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $room->nama }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Left Content: Image & Detail -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="h-96 w-full relative">
                        @if($room->foto)
                            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-lg">No Image</div>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h1 class="text-3xl font-extrabold text-gray-900">{{ $room->nama }}</h1>
                                <p class="text-blue-600 font-semibold mt-1">{{ $room->jumlah_unit }} Unit Tersedia</p>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-black text-blue-900">Rp {{ number_format($room->harga, 0, ',', '.') }}</span>
                                <span class="text-gray-500 block text-sm">/ Malam</span>
                            </div>
                        </div>
                        <div class="prose max-w-none text-gray-600 mt-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Deskripsi</h3>
                            <p>{{ $room->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content: Booking Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-28">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-4">Cek Ketersediaan & Booking</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Anda</label>
                            <input type="text" x-model="form.nama" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama Anda">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP / WA</label>
                            <input type="text" x-model="form.nomor_hp" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="08xxxxxxxxxx">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Check-in</label>
                            <input type="date" x-model="form.checkin" @change="validateDates()" :min="minDate" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Check-out</label>
                            <input type="date" x-model="form.checkout" @change="validateDates()" :min="form.checkin || minDate" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Status Message -->
                        <div x-show="statusMessage" class="p-3 rounded-lg text-sm font-semibold" :class="isAvailable ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'" x-text="statusMessage" style="display: none;"></div>

                        <button @click="openWhatsApp()" :disabled="!isValid" :class="isValid ? 'bg-green-500 hover:bg-green-600 transform hover:-translate-y-1 shadow-lg' : 'bg-gray-300 cursor-not-allowed'" class="w-full mt-4 flex items-center justify-center px-4 py-3 text-white font-bold rounded-xl transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            Pesan via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('bookingForm', (bookedDates, whatsappNumber, roomName) => ({
            bookedDates: bookedDates,
            whatsappNumber: whatsappNumber,
            roomName: roomName,
            form: {
                nama: '',
                nomor_hp: '',
                checkin: '',
                checkout: ''
            },
            statusMessage: '',
            isAvailable: true,
            minDate: new Date().toISOString().split('T')[0],

            get isValid() {
                return this.form.nama !== '' && 
                       this.form.nomor_hp !== '' && 
                       this.form.checkin !== '' && 
                       this.form.checkout !== '' && 
                       this.isAvailable;
            },

            validateDates() {
                this.statusMessage = '';
                this.isAvailable = true;

                if (!this.form.checkin || !this.form.checkout) return;

                if (this.form.checkin >= this.form.checkout) {
                    this.isAvailable = false;
                    this.statusMessage = 'Tanggal Check-out harus setelah Check-in.';
                    return;
                }

                // Check for overlap with booked dates
                let current = new Date(this.form.checkin);
                let end = new Date(this.form.checkout);
                
                let hasConflict = false;
                while(current < end) { // Don't check the checkout day itself, as another person can check-in that day
                    let dateStr = current.toISOString().split('T')[0];
                    if (this.bookedDates.includes(dateStr)) {
                        hasConflict = true;
                        break;
                    }
                    current.setDate(current.getDate() + 1);
                }

                if (hasConflict) {
                    this.isAvailable = false;
                    this.statusMessage = 'Tanggal tidak tersedia (sudah dibooking).';
                } else {
                    this.isAvailable = true;
                    this.statusMessage = 'Kamar tersedia pada tanggal ini!';
                }
            },

            openWhatsApp() {
                if (!this.isValid) return;

                if (!this.whatsappNumber) {
                    alert('Nomor WhatsApp admin belum diatur.');
                    return;
                }

                let message = `Halo Admin Wisma Karya Jasa,\n\nSaya ingin melakukan pemesanan:\n\nNama: ${this.form.nama}\nNo. HP: ${this.form.nomor_hp}\nKamar: ${this.roomName}\nCheck-in: ${this.form.checkin}\nCheck-out: ${this.form.checkout}\n\nMohon informasi lebih lanjut.`;
                let encodedMessage = encodeURIComponent(message);
                let url = `https://wa.me/${this.whatsappNumber}?text=${encodedMessage}`;
                
                window.open(url, '_blank');
            }
        }))
    })
</script>
@endsection
