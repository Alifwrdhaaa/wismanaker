@extends('layouts.public')

@section('title', $room->nama)

@section('content')
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* Premium styling for disabled dates */
    .flatpickr-day.flatpickr-disabled, .flatpickr-day.flatpickr-disabled:hover {
        color: #ef4444 !important;
        background: #fef2f2 !important;
        border-color: #fee2e2 !important;
        text-decoration: line-through;
        cursor: not-allowed;
    }
</style>

<!-- Detail Hero -->
<div class="relative h-[55vh] bg-kemnaker-900 overflow-hidden flex items-end pb-20">
    <div class="absolute inset-0 z-0">
        @if($room->foto)
            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover opacity-50 scale-105 animate-[kenburns_20s_ease-out_infinite_alternate]">
        @else
            <!-- Premium empty state background -->
            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover opacity-20 scale-105 animate-[kenburns_20s_ease-out_infinite_alternate]">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#F8FAFC] via-kemnaker-900/70 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 animate-fade-in-up">
        <!-- Breadcrumbs -->
        <nav class="flex items-center space-x-2 text-[10px] sm:text-xs text-kemnaker-200 font-bold tracking-[0.2em] uppercase mb-6">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="text-white/50">/</span>
            <a href="{{ route('kamar.public') }}" class="hover:text-gold-400 transition-colors">Kamar</a>
            <span class="text-white/50">/</span>
            <span class="text-white">{{ $room->nama }}</span>
        </nav>
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                @if($availableToday > 0)
                    <span class="inline-block px-3 py-1 bg-gold-500/90 backdrop-blur-sm text-kemnaker-900 font-bold uppercase tracking-widest text-[10px] rounded mb-4 shadow-sm">
                        Tersedia {{ $availableToday }} Unit Hari Ini
                    </span>
                @else
                    <span class="inline-block px-3 py-1 bg-red-500/90 backdrop-blur-sm text-white font-bold uppercase tracking-widest text-[10px] rounded mb-4 shadow-sm animate-pulse">
                        Penuh (Full Booked) Hari Ini
                    </span>
                @endif
                <h1 class="text-4xl md:text-6xl font-serif font-extrabold text-white drop-shadow-lg tracking-tight">{{ $room->nama }}</h1>
            </div>
            <div class="text-left md:text-right">
                <span class="text-sm font-semibold uppercase tracking-widest text-kemnaker-200 block mb-1">Tarif Menginap</span>
                <span class="text-3xl md:text-4xl font-bold text-gold-400 block font-serif">Rp {{ number_format($room->harga, 0, ',', '.') }}</span>
                <span class="text-xs text-kemnaker-200 font-light tracking-wide uppercase mt-1 block">/ Malam (Nett)</span>
            </div>
        </div>
    </div>
</div>

<div class="pb-32 bg-[#F8FAFC] relative z-20" x-data="bookingForm({{ json_encode($fullyBookedDates) }}, '{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}', '{{ addslashes($room->nama) }}')">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Column: Content & Gallery -->
            <div class="lg:col-span-8 space-y-12 animate-fade-in-up">
                
                <!-- Main Image Card -->
                <div class="bg-white rounded-[2rem] p-3 shadow-[0_20px_50px_rgba(23,43,77,0.08)] border border-slate-100">
                    <div class="relative h-[400px] md:h-[550px] rounded-[1.5rem] overflow-hidden group">
                        @if($room->foto)
                            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-105">
                            <div class="absolute inset-0 bg-kemnaker-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-center bg-slate-50/50 backdrop-blur-sm border-2 border-dashed border-slate-200 relative overflow-hidden">
                                <div class="relative z-10 w-20 h-20 mb-4 bg-white rounded-full flex items-center justify-center text-slate-300 shadow-sm">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <span class="relative z-10 font-serif text-kemnaker-900 text-xl font-bold">Foto Belum Diunggah</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-[2rem] p-10 md:p-12 shadow-[0_10px_30px_rgba(23,43,77,0.03)] border border-slate-100">
                    <h3 class="text-2xl font-serif font-bold text-kemnaker-900 mb-6 flex items-center">
                        <span class="w-8 h-1 bg-gold-400 mr-4 rounded-full"></span>
                        Informasi Ruangan
                    </h3>
                    <div class="prose prose-lg max-w-none text-slate-600 font-light leading-loose">
                        <p>{{ $room->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Booking Widget (Sticky) -->
            <div class="lg:col-span-4 animate-fade-in-up" style="animation-delay: 0.15s;">
                <div class="sticky top-28">
                    <!-- Glass Widget Premium -->
                    <div class="bg-white/80 backdrop-blur-3xl rounded-[2.5rem] p-8 shadow-[0_30px_60px_rgba(23,43,77,0.12)] border border-white relative overflow-hidden group">
                        
                        <!-- Decoration -->
                        <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-gold-300/20 to-kemnaker-200/10 rounded-bl-[150px] -z-10 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-kemnaker-300/20 to-transparent rounded-tr-[100px] -z-10"></div>
                        
                        <div class="mb-8 border-b border-slate-100 pb-6 relative z-10">
                            <div class="inline-flex items-center space-x-2 mb-3">
                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                <span class="text-[9px] font-bold uppercase tracking-widest text-slate-500">Reservasi Instan</span>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-kemnaker-900 mb-2">Formulir Pemesanan</h3>
                            <p class="text-slate-500 text-sm font-light leading-relaxed">Isi detail di bawah ini untuk terhubung langsung dengan Concierge WhatsApp kami.</p>
                        </div>
                        
                        <div class="space-y-5 relative z-10">
                            <!-- Input Group -->
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.15em] text-kemnaker-700 mb-2 ml-1">Nama Pemesan</label>
                                <input type="text" x-model="form.nama" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-gold-500/10 focus:border-gold-500 hover:border-slate-300 transition-all font-medium placeholder-slate-400 shadow-inner" placeholder="Nama Lengkap">
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.15em] text-kemnaker-700 mb-2 ml-1">Nomor Telepon / WA</label>
                                <input type="text" x-model="form.nomor_hp" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-gold-500/10 focus:border-gold-500 hover:border-slate-300 transition-all font-medium placeholder-slate-400 shadow-inner" placeholder="0812-XXXX-XXXX">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-[0.15em] text-kemnaker-700 mb-2 ml-1">Check-in</label>
                                    <div class="relative">
                                        <input type="text" x-model="form.checkin" x-ref="checkin" class="w-full bg-white border border-slate-200 text-slate-800 rounded-2xl pl-4 pr-3 py-3.5 focus:ring-4 focus:ring-gold-500/10 focus:border-gold-500 hover:border-slate-300 transition-all font-medium text-sm shadow-inner cursor-pointer" placeholder="Pilih Tanggal" readonly>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold uppercase tracking-[0.15em] text-kemnaker-700 mb-2 ml-1">Check-out</label>
                                    <div class="relative">
                                        <input type="text" x-model="form.checkout" x-ref="checkout" class="w-full bg-white border border-slate-200 text-slate-800 rounded-2xl pl-4 pr-3 py-3.5 focus:ring-4 focus:ring-gold-500/10 focus:border-gold-500 hover:border-slate-300 transition-all font-medium text-sm shadow-inner cursor-pointer" placeholder="Pilih Tanggal" readonly>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-[0.15em] text-kemnaker-700 mb-2 ml-1">Jumlah Kamar</label>
                                <input type="number" x-model="form.jumlah_kamar" min="1" max="{{ $room->jumlah_unit }}" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-gold-500/10 focus:border-gold-500 hover:border-slate-300 transition-all font-medium shadow-inner">
                            </div>

                            <!-- Dynamic Status Validation -->
                            <div x-show="statusMessage" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="px-5 py-4 rounded-2xl text-xs font-semibold text-center border mt-2" 
                                 :class="isAvailable ? 'bg-green-50/80 border-green-200 text-green-700 shadow-sm' : 'bg-red-50/80 border-red-200 text-red-700 shadow-sm'" 
                                 x-text="statusMessage" style="display: none;"></div>

                            <!-- CTA Button -->
                            <button @click="openWhatsApp()" :disabled="!isValid" 
                                    :class="isValid ? 'bg-gradient-to-r from-kemnaker-900 to-kemnaker-800 text-white shadow-[0_15px_30px_rgba(23,43,77,0.25)] hover:shadow-[0_20px_40px_rgba(23,43,77,0.35)] hover:-translate-y-1' : 'bg-slate-100 text-slate-400 cursor-not-allowed border border-slate-200'" 
                                    class="w-full mt-8 rounded-2xl flex items-center justify-center px-4 py-4 uppercase tracking-[0.2em] text-[11px] font-bold transition-all duration-300">
                                <svg :class="isValid ? 'text-green-400' : 'text-slate-300'" class="w-5 h-5 mr-3 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                Reservasi via WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes kenburns {
        0% { transform: scale(1.05); }
        100% { transform: scale(1.15); }
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('bookingForm', (fullyBookedDates, whatsappNumber, roomName) => ({
            fullyBookedDates: fullyBookedDates,
            whatsappNumber: whatsappNumber,
            roomName: roomName,
            form: {
                nama: '',
                nomor_hp: '',
                checkin: '',
                checkout: '',
                jumlah_kamar: 1
            },
            statusMessage: '',
            isAvailable: true,
            minDate: new Date().toISOString().split('T')[0],
            checkinPicker: null,
            checkoutPicker: null,

            init() {
                // Initialize Flatpickr for Check-in
                this.checkinPicker = flatpickr(this.$refs.checkin, {
                    minDate: "today",
                    disable: this.fullyBookedDates,
                    dateFormat: "Y-m-d",
                    onChange: (selectedDates, dateStr, instance) => {
                        this.form.checkin = dateStr;
                        // Minimum checkout date is checkin date + 1 day
                        let nextDay = new Date(selectedDates[0]);
                        nextDay.setDate(nextDay.getDate() + 1);
                        this.checkoutPicker.set('minDate', nextDay);
                        this.validateDates();
                    },
                    onDayCreate: (dObj, dStr, fp, dayElem) => {
                        let dateStr = flatpickr.formatDate(dayElem.dateObj, "Y-m-d");
                        if (this.fullyBookedDates.includes(dateStr)) {
                            dayElem.title = "Sudah ada tamu / Tanggal ini sudah dibooking";
                        }
                    }
                });

                // Initialize Flatpickr for Check-out
                this.checkoutPicker = flatpickr(this.$refs.checkout, {
                    minDate: new Date(new Date().setDate(new Date().getDate() + 1)), // Tomorrow
                    disable: this.fullyBookedDates,
                    dateFormat: "Y-m-d",
                    onChange: (selectedDates, dateStr, instance) => {
                        this.form.checkout = dateStr;
                        this.validateDates();
                    },
                    onDayCreate: (dObj, dStr, fp, dayElem) => {
                        let dateStr = flatpickr.formatDate(dayElem.dateObj, "Y-m-d");
                        if (this.fullyBookedDates.includes(dateStr)) {
                            dayElem.title = "Sudah ada tamu / Tanggal ini sudah dibooking";
                        }
                    }
                });
            },

            get isValid() {
                return this.form.nama !== '' && 
                       this.form.nomor_hp !== '' && 
                       this.form.checkin !== '' && 
                       this.form.checkout !== '' && 
                       this.form.jumlah_kamar > 0 &&
                       this.isAvailable;
            },

            validateDates() {
                this.statusMessage = '';
                this.isAvailable = true;

                if (!this.form.checkin || !this.form.checkout) return;

                if (this.form.checkin >= this.form.checkout) {
                    this.isAvailable = false;
                    this.statusMessage = 'Mohon periksa: Check-out harus setelah Check-in.';
                    return;
                }

                // Check for overlap with booked dates
                let current = new Date(this.form.checkin);
                let end = new Date(this.form.checkout);
                
                let hasConflict = false;
                while(current < end) { 
                    let dateStr = current.toISOString().split('T')[0];
                    if (this.fullyBookedDates.includes(dateStr)) {
                        hasConflict = true;
                        break;
                    }
                    current.setDate(current.getDate() + 1);
                }

                if (hasConflict) {
                    this.isAvailable = false;
                    this.statusMessage = 'Maaf, tanggal tidak tersedia (Full Booked).';
                } else {
                    this.isAvailable = true;
                    this.statusMessage = 'Kamar tersedia! Silakan lanjutkan.';
                }
            },

            openWhatsApp() {
                if (!this.isValid) return;
                if (!this.whatsappNumber) {
                    alert('Sistem sedang offline. Nomor WhatsApp admin belum dikonfigurasi.');
                    return;
                }

                let message = `*Reservasi Wisma Karya Jasa*\n\nHalo Admin, saya berminat untuk memesan akomodasi dengan detail berikut:\n\n*Informasi Tamu:*\n- Nama: ${this.form.nama}\n- Kontak: ${this.form.nomor_hp}\n\n*Detail Pesanan:*\n- Tipe Kamar: ${this.roomName}\n- Jumlah Kamar: ${this.form.jumlah_kamar} Unit\n- Check-in: ${this.form.checkin}\n- Check-out: ${this.form.checkout}\n\nMohon konfirmasi ketersediaan dan instruksi pembayaran selanjutnya. Terima kasih.`;
                let encodedMessage = encodeURIComponent(message);
                let url = `https://wa.me/${this.whatsappNumber}?text=${encodedMessage}`;
                
                window.open(url, '_blank');
            }
        }))
    })
</script>
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
