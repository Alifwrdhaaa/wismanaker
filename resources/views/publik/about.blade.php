@extends('layouts.public')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-blue-900 py-20 text-white text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Tentang Wisma Karya Jasa</h1>
        <p class="mt-4 text-xl text-blue-200">Mengenal lebih dekat penginapan resmi Kementerian Ketenagakerjaan.</p>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Profil Wisma</h2>
                <div class="prose prose-lg text-gray-600 leading-relaxed">
                    <p>{{ $profile->tentang ?? 'Profil belum tersedia.' }}</p>
                </div>

                <div class="mt-10 bg-blue-50 rounded-xl p-8 border-l-4 border-blue-600">
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Informasi Kontak</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-gray-700">{{ $profile->alamat ?? 'Alamat belum tersedia.' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-gray-700">{{ $profile->whatsapp ?? 'Nomor belum tersedia.' }}</span>
                        </li>
                        @if($profile && $profile->instagram)
                        <li class="flex items-center">
                            <svg class="w-6 h-6 text-pink-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            <a href="{{ $profile->instagram }}" target="_blank" class="text-blue-600 hover:underline">Instagram</a>
                        </li>
                        @endif
                        @if($profile && $profile->tiktok)
                        <li class="flex items-center">
                            <svg class="w-6 h-6 text-black mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 2.78-1.15 5.54-3.33 7.37-1.92 1.62-4.55 2.28-7.03 1.83-2.66-.48-5.06-2.18-6.19-4.63-1.2-2.58-1.02-5.71.49-8.15 1.52-2.47 4.16-4.08 7.02-4.38v4.11c-1.31.25-2.58 1-3.35 2.06-1.1 1.52-1.07 3.65.07 5.14 1.05 1.37 2.93 1.96 4.58 1.42 1.47-.48 2.45-1.93 2.53-3.48.15-5.91.07-11.83.13-17.74h-4.01c-.01 3.32-.01 6.64-.02 9.96h-4V4.99c2.61-.04 5.22-.04 7.83-.02l.06-.01z"/></svg>
                            <a href="{{ $profile->tiktok }}" target="_blank" class="text-blue-600 hover:underline">TikTok</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="h-96 lg:h-full min-h-[400px] bg-gray-200 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                @if($profile && $profile->maps_url)
                    <iframe src="{{ $profile->maps_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                        Peta belum tersedia.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
