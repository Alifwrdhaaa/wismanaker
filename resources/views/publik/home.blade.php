@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<div class="relative bg-blue-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Hotel View" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent mix-blend-multiply"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 flex flex-col items-center justify-center text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg tracking-tight">
            Selamat Datang di <br> <span class="text-blue-300">Wisma Karya Jasa Kemnaker</span>
        </h1>
        <p class="mt-4 text-xl md:text-2xl text-blue-100 max-w-3xl mb-10 drop-shadow">
            Penginapan nyaman dan fasilitas lengkap untuk mendukung produktivitas dan relaksasi Anda.
        </p>
        <div class="flex space-x-4">
            <a href="{{ route('kamar.public') }}" class="px-8 py-4 bg-white text-blue-900 font-bold rounded-full shadow-lg hover:bg-blue-50 transition transform hover:-translate-y-1">
                Lihat Kamar
            </a>
            <a href="{{ route('about') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-blue-900 transition transform hover:-translate-y-1">
                Tentang Kami
            </a>
        </div>
    </div>
</div>

<!-- Ringkasan Profil -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Wisma Karya Jasa</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                {{ $profile->tentang ?? 'Wisma Karya Jasa adalah fasilitas penginapan resmi dari Kementerian Ketenagakerjaan yang menawarkan kenyamanan dengan harga terjangkau. Berlokasi strategis, kami menyediakan berbagai tipe kamar dan bungalow untuk kebutuhan pribadi maupun instansi.' }}
            </p>
        </div>
    </div>
</div>

<!-- Fasilitas Unggulan -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">Fasilitas Unggulan</h2>
            <p class="mt-4 text-gray-600">Nikmati berbagai fasilitas yang kami sediakan untuk kenyamanan Anda.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($facilities as $facility)
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:-translate-y-2 hover:shadow-xl group">
                    <div class="h-48 overflow-hidden">
                        @if($facility->foto)
                            <img src="{{ Storage::url($facility->foto) }}" alt="{{ $facility->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $facility->nama }}</h3>
                        <p class="text-gray-600 text-sm truncate">{{ $facility->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-12 text-center">
            <a href="{{ route('fasilitas') }}" class="text-blue-600 font-semibold hover:text-blue-800 inline-flex items-center">
                Lihat Semua Fasilitas
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</div>

<!-- Daftar Kamar -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">Pilihan Kamar & Ruangan</h2>
            <p class="mt-4 text-gray-600">Temukan ruangan yang sesuai dengan kebutuhan Anda.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($rooms as $room)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden flex flex-col transition hover:shadow-2xl">
                    <div class="relative h-56">
                        @if($room->foto)
                            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-sm font-bold text-blue-900 shadow">
                            Rp {{ number_format($room->harga, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $room->nama }}</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $room->deskripsi }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('kamar.detail', $room->id) }}" class="block w-full py-3 px-4 bg-blue-50 text-blue-700 text-center font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition duration-300">
                                Detail & Booking
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-12 text-center">
            <a href="{{ route('kamar.public') }}" class="inline-block px-6 py-3 border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition">
                Lihat Seluruh Kamar
            </a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative bg-blue-800 text-white py-16">
    <div class="absolute inset-0 opacity-10">
        <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle fill="currentColor" cx="2" cy="2" r="2"></circle></pattern></defs><rect width="100%" height="100%" fill="url(#dots)"></rect></svg>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Lebih Lanjut?</h2>
        <p class="text-blue-200 mb-8 text-lg">Tim kami siap membantu Anda merencanakan kunjungan yang sempurna ke Wisma Karya Jasa.</p>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp ?? '') }}" target="_blank" class="inline-flex items-center px-8 py-4 bg-green-500 text-white font-bold rounded-full shadow-lg hover:bg-green-600 transition transform hover:-translate-y-1">
            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            Hubungi via WhatsApp
        </a>
    </div>
</div>
@endsection
