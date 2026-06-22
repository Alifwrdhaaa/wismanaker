<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Galeri Foto') }}
            </h2>
            <a href="{{ route('galeri.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Tambah Foto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($galleries as $gallery)
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg overflow-hidden shadow border border-gray-200 dark:border-gray-700">
                                <img src="{{ Storage::url($gallery->foto) }}" alt="{{ $gallery->judul }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg truncate">{{ $gallery->judul }}</h3>
                                    <div class="mt-4 flex justify-between items-center">
                                        <a href="{{ route('galeri.edit', $gallery->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400 text-sm">Edit</a>
                                        <form action="{{ route('galeri.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 dark:hover:text-red-400 text-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500 py-8">
                                Belum ada foto di galeri.
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $galleries->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
