<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - SIMAG SSP</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @font-face {
            font-family: "MyFont";
            src: url("{{ asset('fonts/PlusJakarta.ttf') }}") format("truetype");
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }

        body {
            font-family: "MyFont", sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f8f9ff] text-slate-900">

    <div class="flex min-h-screen items-center justify-center px-4 py-8 sm:px-6 lg:px-8">

        <div
            class="w-full max-w-5xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-900/10">

            <div class="grid lg:grid-cols-2">


                {{-- ================= LEFT : LOGIN ================= --}}
                <div class="flex flex-col justify-center px-6 py-10 sm:px-10 lg:px-12">

                    {{-- Logo --}}
                    <a href="{{ url('/') }}" class="mb-8 flex w-fit items-center gap-3">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-950">
                            <span class="text-sm font-bold text-white">
                                S
                            </span>
                        </div>

                        <div class="leading-tight">

                            <div class="text-[16px] font-bold tracking-tight text-[#0f2f8f]">
                                SIMAG SSP
                            </div>

                            <div class="text-[8px] font-medium uppercase tracking-wide text-slate-500">
                                Sistem Informasi Magang SSP
                            </div>

                        </div>

                    </a>


                    {{-- Heading --}}
                    <div class="mb-7">

                        <div
                            class="mb-3 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5">

                            <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>

                            <span class="text-[10px] font-bold uppercase tracking-wide text-blue-700">
                                Portal Magang SSP
                            </span>

                        </div>


                        <h1 class="text-3xl font-extrabold tracking-[-0.035em] text-slate-900 sm:text-4xl">
                            Selamat Datang
                            <span class="text-[#0c57cc]">
                                Kembali
                            </span>
                        </h1>

                        <p class="mt-3 max-w-md text-sm leading-6 text-slate-500">
                            Masuk ke akun SIMAG SSP untuk melihat pengajuan,
                            status seleksi, dan informasi magang Anda.
                        </p>

                    </div>


                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />


                    {{-- Login Form --}}
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">

                        @csrf


                        {{-- Email --}}
                        <div>

                            <x-input-label for="email" :value="__('Email')"
                                class="mb-2 text-xs font-semibold text-slate-700" />

                            <x-text-input id="email"
                                class="block h-12 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500/20"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" placeholder="Masukkan email Anda" />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>


                        {{-- Password --}}
                        <div>

                            <div class="flex items-center justify-between">

                                <x-input-label for="password" :value="__('Password')"
                                    class="text-xs font-semibold text-slate-700" />

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-[11px] font-semibold text-[#0c57cc] transition hover:text-[#034bb5]">
                                        Lupa password?
                                    </a>
                                @endif

                            </div>


                            <x-text-input id="password"
                                class="mt-2 block h-12 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500/20"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="Masukkan password Anda" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>


                        {{-- Remember --}}
                        <div class="flex items-center">

                            <label for="remember_me" class="inline-flex cursor-pointer items-center">

                                <input id="remember_me" type="checkbox"
                                    class="rounded border-slate-300 text-[#0c57cc] shadow-sm focus:ring-blue-500"
                                    name="remember">

                                <span class="ms-2 text-xs text-slate-500">
                                    Ingat saya
                                </span>

                            </label>

                        </div>


                        {{-- Button --}}
                        <button type="submit"
                            class="flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#0759d1] text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition duration-200 hover:bg-[#034bb5] hover:shadow-blue-600/30">

                            Masuk ke SIMAG

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-6-6 6 6-6 6" />

                            </svg>

                        </button>

                    </form>


                    {{-- Register --}}
                    <div class="mt-7 text-center">

                        <p class="text-xs text-slate-500">

                            Belum memiliki akun?

                            <a href="{{ route('register') }}" class="font-bold text-[#0c57cc] hover:text-[#034bb5]">

                                Daftar sekarang

                            </a>

                        </p>

                    </div>


                    {{-- Footer --}}
                    <div class="mt-8 border-t border-slate-100 pt-5 text-center">

                        <p class="text-[10px] text-slate-400">
                            © {{ date('Y') }} SIMAG SSP · Sistem Informasi Magang SSP
                        </p>

                    </div>

                </div>


                {{-- ================= RIGHT : HERO IMAGE ================= --}}
                <div class="relative hidden min-h-[650px] overflow-hidden lg:block">

                    {{-- Image --}}
                    <img src="{{ asset('images/hero-magang.jpeg') }}" alt="Peserta magang SSP"
                        class="absolute inset-0 h-full w-full object-cover" />


                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[#061b4f]/90 via-[#0b3f99]/35 to-transparent">
                    </div>


                    {{-- Decorative --}}
                    <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-blue-300/20 blur-3xl">
                    </div>

                    <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-indigo-300/20 blur-3xl">
                    </div>


                    {{-- Content --}}
                    <div class="absolute inset-x-0 bottom-0 p-8 xl:p-10">

                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 backdrop-blur-md">

                            <span class="h-1.5 w-1.5 rounded-full bg-white"></span>

                            <span class="text-[10px] font-semibold uppercase tracking-wide text-white">
                                Program Magang SSP
                            </span>

                        </div>


                        <h2
                            class="max-w-lg text-3xl font-extrabold leading-tight tracking-tight text-white xl:text-4xl">
                            Bangun Pengalaman.
                            <br>
                            <span class="text-blue-200">
                                Siapkan Masa Depan.
                            </span>
                        </h2>


                        <p class="mt-4 max-w-md text-sm leading-6 text-blue-50/90">
                            Dapatkan pengalaman langsung di lingkungan industri
                            bersama mentor dan tim profesional SSP.
                        </p>


                        {{-- Small info card --}}
                        <div
                            class="mt-6 flex w-fit items-center gap-3 rounded-2xl border border-white/20 bg-white/10 px-4 py-3 backdrop-blur-md">

                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">

                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

                                </svg>

                            </div>

                            <div>

                                <p class="text-[10px] font-medium text-blue-100">
                                    Akses Portal
                                </p>

                                <p class="text-xs font-bold text-white">
                                    Kelola pengajuan magang Anda
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================= MOBILE IMAGE ================= --}}
                <div class="relative h-56 overflow-hidden lg:hidden">

                    <img src="{{ asset('images/hero-magang.jpeg') }}" alt="Peserta magang SSP"
                        class="h-full w-full object-cover" />

                    <div class="absolute inset-0 bg-gradient-to-t from-[#061b4f]/80 to-transparent">
                    </div>

                    <div class="absolute bottom-5 left-5">

                        <p class="text-[10px] font-semibold uppercase tracking-wide text-blue-100">
                            Program Magang SSP
                        </p>

                        <h2 class="mt-1 text-xl font-extrabold text-white">
                            Bangun Pengalaman.
                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
