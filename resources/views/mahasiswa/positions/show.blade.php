<x-app-layout>

    <div class="min-h-screen bg-[#f8f9ff]">

        {{-- ========================================================= --}}
        {{-- MAIN CONTAINER --}}
        {{-- ========================================================= --}}

        <div class="mx-auto w-full max-w-6xl px-4 py-6 sm:px-6 lg:px-8 lg:py-8">


            {{-- Back --}}
            <a href="{{ route('mahasiswa.dashboard') }}"
                class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition duration-200 hover:text-[#29459b]">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />

                </svg>

                Kembali ke Dashboard

            </a>


            {{-- ========================================================= --}}
            {{-- MAIN CARD --}}
            {{-- ========================================================= --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


                {{-- ===================================================== --}}
                {{-- HEADER --}}
                {{-- ===================================================== --}}

                <div
                    class="border-b border-slate-100 bg-gradient-to-br from-[#f0f4ff] via-white to-[#f8f9ff] px-6 py-7 sm:px-8">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">


                        {{-- Position Info --}}
                        <div class="min-w-0">

                            {{-- Status --}}
                            <div class="pt-4">

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-emerald-600">

                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                    Tersedia

                                </span>

                            </div>


                            {{-- Title --}}
                            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">

                                {{ $position->name }}

                            </h1>


                            {{-- Department --}}
                            @if ($position->department)
                                <p class="mt-2 text-sm font-medium text-[#29459b]">

                                    {{ $position->department }}

                                </p>
                            @endif

                        </div>


                        {{-- Quota --}}
                        <div
                            class="flex shrink-0 items-center gap-3 rounded-xl border border-blue-100 bg-white px-4 py-3 shadow-sm">

                            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#e8edff]">

                                <svg class="h-4.5 w-4.5 text-[#29459b]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm6 3v6m3-3h-6" />

                                </svg>

                            </div>

                            <div>

                                <p class="text-[11px] font-medium text-slate-400">
                                    Kuota tersedia
                                </p>

                                <p class="text-lg font-extrabold leading-5 text-[#29459b]">
                                    {{ $position->quota }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- CONTENT --}}
                {{-- ===================================================== --}}

                <div class="px-6 py-7 sm:px-8 sm:py-8">

                    <div class="grid gap-7 lg:grid-cols-[minmax(0,1fr)_280px]">


                        {{-- ================================================= --}}
                        {{-- LEFT : DESCRIPTION --}}
                        {{-- ================================================= --}}

                        <div class="min-w-0">

                            <div class="pt-4">

                                <h2 class="text-lg font-bold text-slate-900">
                                    Tentang Posisi
                                </h2>

                                <p class="mt-1 text-xs text-slate-400">
                                    Informasi mengenai posisi magang yang tersedia.
                                </p>

                            </div>


                            <div class="rounded-xl border border-slate-100 bg-slate-50/70 px-5 py-4">

                                <p class="whitespace-pre-line text-sm leading-7 text-slate-600">

                                    {{ $position->description ?: 'Belum ada deskripsi untuk posisi ini.' }}

                                </p>

                            </div>


                            {{-- Info --}}
                            <div class="mt-5 grid gap-3 sm:grid-cols-2">


                                {{-- Status --}}
                                <div class="flex items-center gap-3 rounded-xl border border-slate-100 bg-white p-4">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-emerald-50">

                                        <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m5 12 4 4L19 6" />

                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[11px] text-slate-400">
                                            Status
                                        </p>

                                        <p class="text-sm font-bold text-slate-700">
                                            Pendaftaran Aktif
                                        </p>

                                    </div>

                                </div>


                                {{-- Quota --}}
                                <div class="flex items-center gap-3 rounded-xl border border-slate-100 bg-white p-4">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#e8edff]">

                                        <svg class="h-4 w-4 text-[#29459b]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M17 20h5v-2a4 4 0 0 0-4-4h-1m-4 6H3v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2Zm-2-10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Zm7 2a3 3 0 1 0-2-5.83" />

                                        </svg>

                                    </div>

                                    <div>

                                        <p class="text-[11px] text-slate-400">
                                            Kuota
                                        </p>

                                        <p class="text-sm font-bold text-slate-700">
                                            {{ $position->quota }} Peserta
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>



                        {{-- ================================================= --}}
                        {{-- RIGHT : ACTION --}}
                        {{-- ================================================= --}}

                        <div class="h-fit">

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                                <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-[#e8edff]">

                                    <svg class="h-5 w-5 text-[#29459b]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm6-3v6m3-3h-6" />

                                    </svg>

                                </div>


                                <h3 class="text-base font-bold text-slate-900">
                                    Tertarik dengan posisi ini?
                                </h3>


                                <p class="mt-2 text-xs leading-5 text-slate-500">
                                    Ajukan permohonan magang untuk posisi
                                    <span class="font-semibold text-slate-700">
                                        {{ $position->name }}
                                    </span>.
                                </p>


                                {{-- Button --}}
                                <a href="{{ route('mahasiswa.applications.create', $position) }}"
                                    class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-[#29459b] px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#203982]">

                                    Ajukan Magang

                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14m-6-6 6 6-6 6" />
                                    </svg>

                                </a>


                                <p class="mt-3 text-center text-[10px] leading-4 text-slate-400">
                                    Pastikan data diri dan dokumen yang diperlukan
                                    sudah disiapkan.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
