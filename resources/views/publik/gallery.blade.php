@extends('layouts.public')

@section('title', 'Galeri')

@section('content')
<div class="bg-blue-900 py-20 text-white text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Galeri Foto</h1>
        <p class="mt-4 text-xl text-blue-200">Momen dan sudut terbaik di Wisma Karya Jasa.</p>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
                <div class="relative group rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                    <img src="{{ Storage::url($gallery->foto) }}" alt="{{ $gallery->judul }}" class="w-full h-64 object-cover transform transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                        <div class="p-4 w-full">
                            <p class="text-white font-semibold text-lg truncate">{{ $gallery->judul }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 text-lg">
                    Belum ada foto di galeri.
                </div>
            @endforelse
        </div>
        <div class="mt-12">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
@endsection
