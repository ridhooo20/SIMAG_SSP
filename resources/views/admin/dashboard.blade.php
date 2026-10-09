<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin SSP
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

            {{-- Welcome --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-800">
                    Dashboard Admin SSP
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Selamat datang, {{ auth()->user()->name }}.
                    Kelola sistem informasi magang SSP dari halaman ini.
                </p>
            </div>


            {{-- Menu Admin --}}
            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">

                {{-- Kelola Posisi --}}
                <a href="{{ route('admin.positions.index') }}"
                    class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                    <div class="flex items-start justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#e8edff] text-[#29459b]">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M4 7h16M4 12h16M4 17h16" />

                            </svg>

                        </div>

                        <svg class="h-5 w-5 text-slate-300 transition duration-200 group-hover:translate-x-1 group-hover:text-[#29459b]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />

                        </svg>

                    </div>

                    <div class="mt-5">

                        <h3 class="text-base font-bold text-slate-800">
                            Kelola Posisi Magang
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Tambah, edit, dan kelola posisi magang
                            yang tersedia untuk peserta.
                        </p>

                    </div>

                </a>


                {{-- Pengajuan Magang --}}
                <a href="{{ route('admin.applications.index') }}"
                    class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                    <div class="flex items-start justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#eef2ff] text-[#29459b]">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 12h6m-6 4h4m-6-8h8m2-4H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z" />

                            </svg>

                        </div>

                        <svg class="h-5 w-5 text-slate-300 transition duration-200 group-hover:translate-x-1 group-hover:text-[#29459b]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />

                        </svg>

                    </div>

                    <div class="mt-5">

                        <h3 class="text-base font-bold text-slate-800">
                            Pengajuan Magang
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Melihat dan memproses pengajuan magang
                            dari mahasiswa dan siswa.
                        </p>

                        <span
                            class="mt-3 inline-block rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-[#29459b]">
                            Kelola Pengajuan
                        </span>

                    </div>

                </a>


                {{-- Data Peserta --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#eef8f7] text-[#08746d]">

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m10-10a4 4 0 1 0-8 0 4 4 0 0 0 8 0Zm6 10v-2a4 4 0 0 0-3-3.87m0-8.13a4 4 0 0 1 0 7.75" />

                        </svg>

                    </div>


                    <a href="{{ route('admin.participants.index') }}"
                        class="block mt-5 rounded-xl transition hover:bg-slate-50">

                        <h3 class="text-base font-bold text-slate-800">
                            Data Peserta
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Melihat data peserta yang telah terdaftar
                            dalam sistem.
                        </p>

                        <span
                            class="mt-3 inline-block rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                            Lihat Data Peserta →
                        </span>

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
