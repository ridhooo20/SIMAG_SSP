<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMAG SSP - Sistem Informasi Magang SSP</title>

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

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 70px;
        }
    </style>
</head>

<body class="bg-[#f8f9ff] text-slate-900">

    {{-- Navbar --}}
    <x-navbar />

    {{-- Hero + Tracking --}}
    @include('welcome')

    {{-- Posisi Magang --}}
    @include('posisimagang')

    {{-- Alur Seleksi --}}
    @include('alurmagang')

    {{-- GALLERY --}}
    @include('gallery')

    {{-- FAQ --}}
    @include('faq')

    {{-- CTA --}}
    @include('cta-magang')

    {{-- Footer --}}
    <footer class="border-t border-slate-100 bg-white px-4 py-6 sm:px-6">

        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4">

            {{-- Kiri --}}
            <div class="flex min-w-0 items-center gap-3">

                {{-- Logo --}}
                <div class="flex h-8 w-12 items-center justify-center rounded-md">
                    <img src="{{ asset('/logo/logossp.jpeg') }}" alt="SSP" class="h-full w-auto" />
                </div>

                <p class="truncate text-[9px] text-slate-500 sm:text-[10px]">
                    © {{ date('Y') }} SIMAG SSP • Program Magang Bersertifikat.
                </p>

            </div>


            {{-- Kanan --}}
            <nav class="flex shrink-0 items-center gap-4 sm:gap-6">

                <a href="Beranda"
                    class="text-[8px] font-medium text-slate-700 transition hover:text-[#0759d1] sm:text-[9px]">
                    Beranda
                </a>

                <a href="login"
                    class="text-[8px] font-medium text-slate-700 transition hover:text-[#0759d1] sm:text-[9px]">
                    Login
                </a>

                <a href="register"
                    class="text-[8px] font-medium text-slate-700 transition hover:text-[#0759d1] sm:text-[9px]">
                    Daftar
                </a>

            </nav>

        </div>

    </footer>

</body>

</html>
