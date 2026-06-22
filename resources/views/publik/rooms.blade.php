@extends('layouts.public')

@section('title', 'Kamar & Ruangan')

@section('content')
<div class="bg-blue-900 py-20 text-white text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Kamar & Ruangan</h1>
        <p class="mt-4 text-xl text-blue-200">Temukan ruangan ideal untuk istirahat atau acara Anda.</p>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($rooms as $room)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden flex flex-col transition hover:shadow-2xl">
                    <div class="relative h-64">
                        @if($room->foto)
                            <img src="{{ Storage::url($room->foto) }}" alt="{{ $room->nama }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-md font-bold text-blue-900 shadow">
                            Rp {{ number_format($room->harga, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="p-8 flex-grow flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $room->nama }}</h3>
                        <p class="text-sm font-medium text-blue-600 mb-4">{{ $room->jumlah_unit }} Unit Tersedia</p>
                        <p class="text-gray-500 mb-6 line-clamp-3">{{ $room->deskripsi }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('kamar.detail', $room->id) }}" class="block w-full py-3 px-4 bg-blue-600 text-white text-center font-bold rounded-xl hover:bg-blue-700 shadow-md hover:shadow-lg transition duration-300">
                                Lihat Detail & Cek Ketersediaan
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 text-lg">
                    Belum ada data kamar.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
