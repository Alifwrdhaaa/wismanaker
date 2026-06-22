@extends('layouts.public')

@section('title', 'Fasilitas')

@section('content')
<div class="bg-blue-900 py-20 text-white text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Fasilitas Kami</h1>
        <p class="mt-4 text-xl text-blue-200">Kenyamanan Anda adalah prioritas utama kami.</p>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($facilities as $facility)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden transform transition hover:-translate-y-2 hover:shadow-xl group">
                    <div class="h-64 overflow-hidden relative">
                        @if($facility->foto)
                            <img src="{{ Storage::url($facility->foto) }}" alt="{{ $facility->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-6 text-2xl font-bold text-white">{{ $facility->nama }}</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 leading-relaxed">{{ $facility->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 text-lg">
                    Belum ada data fasilitas.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
