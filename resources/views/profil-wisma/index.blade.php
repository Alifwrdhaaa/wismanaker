<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Wisma') }}
        </h2>
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

                    @if($profile)
                        <div class="mb-6 space-y-4">
                            <div>
                                <strong class="block text-sm text-gray-500 dark:text-gray-400">Tentang Wisma</strong>
                                <p>{{ $profile->tentang ?? '-' }}</p>
                            </div>
                            <div>
                                <strong class="block text-sm text-gray-500 dark:text-gray-400">WhatsApp</strong>
                                <p>{{ $profile->whatsapp ?? '-' }}</p>
                            </div>
                            <div>
                                <strong class="block text-sm text-gray-500 dark:text-gray-400">Instagram</strong>
                                <p>{{ $profile->instagram ?? '-' }}</p>
                            </div>
                            <div>
                                <strong class="block text-sm text-gray-500 dark:text-gray-400">TikTok</strong>
                                <p>{{ $profile->tiktok ?? '-' }}</p>
                            </div>
                            <div>
                                <strong class="block text-sm text-gray-500 dark:text-gray-400">Alamat</strong>
                                <p>{{ $profile->alamat ?? '-' }}</p>
                            </div>
                            <div>
                                <strong class="block text-sm text-gray-500 dark:text-gray-400">Google Maps URL</strong>
                                <p>
                                    @if($profile->maps_url)
                                        <a href="{{ $profile->maps_url }}" target="_blank" class="text-blue-500 hover:underline">Lihat di Maps</a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('profil-wisma.edit', $profile->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Edit Profil') }}
                            </a>
                        </div>
                    @else
                        <p>Profil belum diatur.</p>
                        <form method="POST" action="{{ route('profil-wisma.store') }}">
                            @csrf
                            <a href="{{ route('profil-wisma.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Buat Profil Baru') }}
                            </a>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
