<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-bold uppercase tracking-widest text-kemnaker-700 mb-2 ml-1">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                   class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 transition-all font-medium text-sm placeholder-slate-400" 
                   placeholder="admin@wismakaryajasa.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-[10px] font-bold uppercase tracking-widest text-kemnaker-700 mb-2 ml-1">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                   class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:ring-2 focus:ring-gold-500 focus:border-gold-500 transition-all font-medium text-sm placeholder-slate-400"
                   placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-gold-500 shadow-sm focus:ring-gold-500 focus:ring-offset-0">
                <span class="ms-2 text-xs font-semibold text-slate-500 group-hover:text-kemnaker-700 transition-colors">Ingat Sesi Saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs font-semibold text-gold-600 hover:text-gold-500 hover:underline transition-colors" href="{{ route('password.request') }}">
                    Lupa Sandi?
                </a>
            @endif
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-kemnaker-900 hover:bg-kemnaker-800 text-white rounded-xl py-3.5 px-4 font-bold uppercase tracking-[0.2em] text-xs shadow-[0_10px_20px_rgba(23,43,77,0.2)] hover:shadow-[0_15px_25px_rgba(23,43,77,0.3)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center group">
                Otorisasi Masuk
                <svg class="w-4 h-4 ml-3 text-gold-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </form>
</x-guest-layout>
