<x-app-layout>

    <div class="min-h-screen bg-[#f8f9ff]">

        {{-- HEADER --}}
        <div class="border-b border-slate-200 bg-white">

            <div class="mx-auto max-w-7xl px-5 py-8 lg:px-8">

                <p class="text-sm font-medium text-[#29459b]">
                    Dashboard Mahasiswa
                </p>

                <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                    Selamat datang, {{ auth()->user()->name }}
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Temukan posisi magang yang tersedia dan pantau pengajuan
                    magangmu melalui dashboard ini.
                </p>

            </div>

        </div>


        {{-- CONTENT --}}
        <div class="mx-auto max-w-7xl px-5 py-8 lg:px-8">


            {{-- ========================================================= --}}
            {{-- SUMMARY --}}
            {{-- ========================================================= --}}

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">


                {{-- POSISI TERSEDIA --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium text-slate-500">
                                Posisi Tersedia
                            </p>

                            <p class="mt-2 text-3xl font-extrabold text-[#29459b]">
                                {{ $positions->count() }}
                            </p>

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#e8edff] text-[#29459b]">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2ZM8 7h8" />

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- PENGAJUAN SAYA --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium text-slate-500">
                                Pengajuan Saya
                            </p>

                            <p class="mt-2 text-3xl font-extrabold text-slate-900">
                                {{ $applications->count() }}
                            </p>

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-600">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l5 5v11a2 2 0 0 1-2 2Z" />

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- STATUS PENGAJUAN --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium text-slate-500">
                                Status Pengajuan
                            </p>


                            @if ($applications->count())

                                @php
                                    $latestApplication = $applications->first();
                                @endphp


                                @if ($latestApplication->status === 'pending')
                                    <p class="mt-2 text-lg font-extrabold text-amber-600">
                                        Menunggu Review
                                    </p>
                                @elseif ($latestApplication->status === 'approved')
                                    <p class="mt-2 text-lg font-extrabold text-green-600">
                                        Disetujui
                                    </p>
                                @elseif ($latestApplication->status === 'rejected')
                                    <p class="mt-2 text-lg font-extrabold text-red-600">
                                        Ditolak
                                    </p>
                                @endif
                            @else
                                <p class="mt-2 text-lg font-extrabold text-slate-400">
                                    Belum Ada
                                </p>

                            @endif

                        </div>


                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-500">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <circle cx="12" cy="12" r="9" stroke-width="1.8" />

                                <path stroke-linecap="round" stroke-width="1.8" d="M12 7v5l3 2" />

                            </svg>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- PENGAJUAN SAYA --}}
            {{-- ========================================================= --}}

            <div class="mt-10">

                <div class="mb-5">

                    <p class="text-xs font-semibold uppercase tracking-wider text-[#29459b]">
                        Pengajuan Saya
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                        Kelola Pengajuan Magang
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Lihat kode pengajuan, status, dan perkembangan proses
                        seleksi magangmu.
                    </p>

                </div>


                @if ($applications->count())

                    <div class="space-y-4">

                        @foreach ($applications as $application)
                            <div
                                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:shadow-md">

                                <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


                                    {{-- INFORMASI --}}
                                    <div class="min-w-0 flex-1">

                                        {{-- POSISI + STATUS --}}
                                        <div class="flex flex-wrap items-center gap-2">

                                            <h3 class="text-lg font-extrabold text-slate-900">
                                                {{ $application->position->name }}
                                            </h3>


                                            @if ($application->status === 'pending')
                                                <span
                                                    class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">

                                                    Menunggu Review

                                                </span>
                                            @elseif ($application->status === 'approved')
                                                <span
                                                    class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                                    Disetujui

                                                </span>
                                            @elseif ($application->status === 'rejected')
                                                <span
                                                    class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                                    Ditolak

                                                </span>
                                            @endif

                                        </div>


                                        {{-- DETAIL --}}
                                        <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">


                                            {{-- KODE --}}
                                            <div>

                                                <p
                                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">

                                                    Kode Pengajuan

                                                </p>

                                                <p class="mt-1 break-all text-sm font-bold text-[#29459b]">

                                                    {{ $application->registration_number }}

                                                </p>

                                            </div>


                                            {{-- INSTITUSI --}}
                                            <div>

                                                <p
                                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">

                                                    Institusi

                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">

                                                    {{ $application->institution }}

                                                </p>

                                            </div>


                                            {{-- PERIODE --}}
                                            <div>

                                                <p
                                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">

                                                    Periode Magang

                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">

                                                    {{ $application->start_date?->format('d M Y') }}

                                                    -

                                                    {{ $application->end_date?->format('d M Y') }}

                                                </p>

                                            </div>


                                            {{-- TANGGAL PENGAJUAN --}}
                                            <div>

                                                <p
                                                    class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">

                                                    Diajukan

                                                </p>

                                                <p class="mt-1 text-sm font-semibold text-slate-700">

                                                    {{ $application->created_at?->format('d M Y, H:i') }}

                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- BUTTON --}}
                                    <div class="shrink-0">

                                        <a href="{{ auth()->user()->role === 'mahasiswa'
                                            ? route('mahasiswa.applications.show', $application)
                                            : route('siswa.applications.show', $application) }}"
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#29459b] px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#20377f] sm:w-auto">

                                            Cek Status

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />

                                            </svg>

                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                @else
                    {{-- EMPTY STATE --}}
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-12 text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l5 5v11a2 2 0 0 1-2 2Z" />

                            </svg>

                        </div>

                        <h3 class="mt-4 text-sm font-bold text-slate-800">
                            Belum Ada Pengajuan
                        </h3>

                        <p class="mx-auto mt-1 max-w-md text-xs leading-5 text-slate-500">
                            Kamu belum memiliki pengajuan magang.
                            Silakan pilih posisi magang yang tersedia
                            untuk mulai melakukan pengajuan.
                        </p>

                    </div>

                @endif

            </div>


            {{-- ========================================================= --}}
            {{-- POSISI MAGANG --}}
            {{-- ========================================================= --}}

            <div class="mt-12">

                <div class="mb-5">

                    <p class="text-xs font-semibold uppercase tracking-wider text-[#29459b]">
                        Program Magang
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                        Posisi Magang yang Tersedia
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Pilih posisi yang sesuai dengan bidang dan minatmu.
                    </p>

                </div>


                {{-- CARD POSISI --}}
                @if ($positions->count())

                    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">

                        @foreach ($positions as $position)
                            <div
                                class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                                <div class="p-6">


                                    {{-- BADGE --}}
                                    <div class="flex items-center justify-between gap-3">

                                        <span
                                            class="inline-flex rounded-full bg-[#e8edff] px-3 py-1 text-[10px] font-bold text-[#29459b]">

                                            TERSEDIA

                                        </span>

                                        <span class="text-xs font-medium text-slate-500">

                                            Kuota {{ $position->quota }}

                                        </span>

                                    </div>


                                    {{-- NAMA --}}
                                    <h3 class="mt-5 text-lg font-extrabold leading-tight text-slate-900">

                                        {{ $position->name }}

                                    </h3>


                                    {{-- DEPARTMENT --}}
                                    @if ($position->department)
                                        <p class="mt-1 text-xs font-semibold text-[#29459b]">

                                            {{ $position->department }}

                                        </p>
                                    @endif


                                    {{-- DESCRIPTION --}}
                                    @if ($position->description)
                                        <p class="mt-4 line-clamp-3 text-sm leading-6 text-slate-500">

                                            {{ $position->description }}

                                        </p>
                                    @else
                                        <p class="mt-4 text-sm text-slate-400">

                                            Informasi posisi belum tersedia.

                                        </p>
                                    @endif


                                    {{-- BUTTON --}}
                                    <div class="mt-6">

                                        <a href="{{ route('mahasiswa.positions.show', $position) }}"
                                            class="inline-flex items-center gap-2 rounded-xl bg-[#e8edff] px-4 py-2.5 text-sm font-semibold text-[#29459b] transition duration-200 hover:bg-[#dce5ff]">

                                            Lihat Detail

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />

                                            </svg>

                                        </a>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                @else
                    {{-- EMPTY STATE --}}
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Z" />

                            </svg>

                        </div>

                        <h3 class="mt-4 text-sm font-bold text-slate-800">
                            Belum ada posisi magang
                        </h3>

                        <p class="mx-auto mt-1 max-w-md text-xs leading-5 text-slate-500">
                            Saat ini belum ada posisi magang yang sedang dibuka.
                            Silakan cek kembali beberapa saat lagi.
                        </p>

                    </div>

                @endif

            </div>


        </div>

    </div>

</x-app-layout>
