<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar - SIMAG SSP</title>

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


                {{-- ================================================= --}}
                {{-- LEFT : REGISTER --}}
                {{-- ================================================= --}}

                <div class="flex flex-col justify-center px-6 py-9 sm:px-10 lg:px-12">

                    {{-- Logo --}}
                    <a href="{{ url('/') }}" class="mb-7 flex w-fit items-center gap-3">

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
                    <div class="mb-6">

                        <div
                            class="mb-3 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5">

                            <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>

                            <span class="text-[10px] font-bold uppercase tracking-wide text-blue-700">
                                Portal Magang SSP
                            </span>

                        </div>


                        <h1 class="text-3xl font-extrabold tracking-[-0.035em] text-slate-900 sm:text-4xl">

                            Buat Akun
                            <span class="text-[#0c57cc]">
                                SIMAG
                            </span>

                        </h1>


                        <p class="mt-3 max-w-md text-sm leading-6 text-slate-500">

                            Daftarkan diri Anda untuk mengajukan dan
                            memantau proses magang di SSP.

                        </p>

                    </div>


                    {{-- Register Form --}}
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">

                        @csrf


                        {{-- Name --}}
                        <div>

                            <x-input-label for="name" :value="__('Nama Lengkap')"
                                class="mb-2 text-xs font-semibold text-slate-700" />

                            <x-text-input id="name"
                                class="block h-11 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500/20"
                                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                                placeholder="Masukkan nama lengkap" />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>


                        {{-- Email --}}
                        <div>

                            <x-input-label for="email" :value="__('Email')"
                                class="mb-2 text-xs font-semibold text-slate-700" />

                            <x-text-input id="email"
                                class="block h-11 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500/20"
                                type="email" name="email" :value="old('email')" required autocomplete="username"
                                placeholder="contoh@email.com" />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>


                        {{-- Role --}}
                        <div>

                            <x-input-label for="role" :value="__('Daftar sebagai')"
                                class="mb-2 text-xs font-semibold text-slate-700" />

                            <select id="role" name="role" required
                                class="block h-11 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm text-slate-700 shadow-none outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20">

                                <option value="">
                                    Pilih jenis akun
                                </option>

                                <option value="mahasiswa" {{ old('role') === 'mahasiswa' ? 'selected' : '' }}>
                                    Mahasiswa
                                </option>

                                <option value="siswa" {{ old('role') === 'siswa' ? 'selected' : '' }}>
                                    Siswa
                                </option>

                            </select>

                            <x-input-error :messages="$errors->get('role')" class="mt-2" />

                        </div>


                        {{-- Password --}}
                        <div>

                            <x-input-label for="password" :value="__('Password')"
                                class="mb-2 text-xs font-semibold text-slate-700" />

                            <x-text-input id="password"
                                class="block h-11 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500/20"
                                type="password" name="password" required autocomplete="new-password"
                                placeholder="Buat password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>


                        {{-- Confirm Password --}}
                        <div>

                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')"
                                class="mb-2 text-xs font-semibold text-slate-700" />

                            <x-text-input id="password_confirmation"
                                class="block h-11 w-full rounded-xl border-slate-200 bg-slate-50 px-4 text-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500/20"
                                type="password" name="password_confirmation" required autocomplete="new-password"
                                placeholder="Ulangi password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>


                        {{-- Button --}}
                        <button type="submit"
                            class="mt-2 flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-[#0759d1] text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition duration-200 hover:bg-[#034bb5] hover:shadow-blue-600/30">

                            Buat Akun

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-6-6 6 6-6 6" />

                            </svg>

                        </button>

                    </form>


                    {{-- Login --}}
                    <div class="mt-6 text-center">

                        <p class="text-xs text-slate-500">

                            Sudah memiliki akun?

                            <a href="{{ route('login') }}"
                                class="font-bold text-[#0c57cc] transition hover:text-[#034bb5]">

                                Masuk sekarang

                            </a>

                        </p>

                    </div>


                    {{-- Footer --}}
                    <div class="mt-6 border-t border-slate-100 pt-4 text-center">

                        <p class="text-[10px] text-slate-400">
                            © {{ date('Y') }} SIMAG SSP · Sistem Informasi Magang SSP
                        </p>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- RIGHT : HERO IMAGE --}}
                {{-- ================================================= --}}

                <div class="relative hidden min-h-[700px] overflow-hidden lg:block">

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


                    {{-- Hero Content --}}
                    <div class="absolute inset-x-0 bottom-0 p-8 xl:p-10">

                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 backdrop-blur-md">

                            <span class="h-1.5 w-1.5 rounded-full bg-white"></span>

                            <span class="text-[10px] font-semibold uppercase tracking-wide text-white">
                                Bergabung Bersama SSP
                            </span>

                        </div>


                        <h2
                            class="max-w-lg text-3xl font-extrabold leading-tight tracking-tight text-white xl:text-4xl">

                            Mulai Langkahmu.
                            <br>

                            <span class="text-blue-200">
                                Kembangkan Potensimu.
                            </span>

                        </h2>


                        <p class="mt-4 max-w-md text-sm leading-6 text-blue-50/90">

                            Bangun pengalaman profesional melalui
                            program magang yang dirancang untuk
                            mempersiapkan Anda menghadapi dunia industri.

                        </p>


                        {{-- Info Card --}}
                        <div
                            class="mt-6 flex w-fit items-center gap-3 rounded-2xl border border-white/20 bg-white/10 px-4 py-3 backdrop-blur-md">

                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">

                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm6-3v6m3-3h-6" />

                                </svg>

                            </div>


                            <div>

                                <p class="text-[10px] font-medium text-blue-100">
                                    Pendaftaran Terbuka
                                </p>

                                <p class="text-xs font-bold text-white">
                                    Mahasiswa & Siswa SMK
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- MOBILE HERO IMAGE --}}
                {{-- ================================================= --}}

                <div class="relative h-52 overflow-hidden lg:hidden">

                    <img src="{{ asset('images/hero-magang.jpeg') }}" alt="Peserta magang SSP"
                        class="h-full w-full object-cover" />

                    <div class="absolute inset-0 bg-gradient-to-t from-[#061b4f]/85 to-transparent">
                    </div>


                    <div class="absolute bottom-5 left-5">

                        <p class="text-[10px] font-semibold uppercase tracking-wide text-blue-100">
                            Program Magang SSP
                        </p>

                        <h2 class="mt-1 text-xl font-extrabold text-white">
                            Mulai Langkahmu.
                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
