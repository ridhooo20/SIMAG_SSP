<x-app-layout>

    <div class="min-h-screen bg-[#f8f9ff]">

        {{-- HEADER --}}
        <div class="border-b border-slate-200 bg-white">
            <div class="mx-auto max-w-5xl px-5 py-8 lg:px-8">

                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-[#29459b] transition hover:text-[#1f3578]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>

                    Kembali ke Dashboard
                </a>

                <div class="mt-5">
                    <p class="text-sm font-semibold text-[#29459b]">
                        Cek Status Pengajuan
                    </p>

                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                        Status Pengajuan Magang
                    </h1>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Pantau perkembangan pengajuan magang kamu melalui halaman ini.
                    </p>
                </div>

            </div>
        </div>


        {{-- CONTENT --}}
        <div class="mx-auto max-w-5xl px-5 py-8 lg:px-8">

            {{-- STATUS CARD --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="p-6 sm:p-8">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                                Status Pengajuan
                            </p>

                            <div class="mt-2">

                                @if ($application->status === 'pending')
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-sm font-bold text-amber-700">
                                        <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                        Menunggu Review
                                    </span>
                                @elseif ($application->status === 'approved')
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-700">
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                        Pengajuan Disetujui
                                    </span>
                                @elseif ($application->status === 'rejected')
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700">
                                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                        Pengajuan Ditolak
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-bold text-slate-700">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                @endif

                            </div>
                        </div>


                        {{-- NOMOR PENDAFTARAN --}}
                        <div class="sm:text-right">

                            <p class="text-xs font-semibold text-slate-400">
                                Nomor Pendaftaran
                            </p>

                            <div class="mt-2 flex items-center gap-2 sm:justify-end">

                                <span id="registration-number"
                                    class="rounded-lg bg-slate-100 px-3 py-2 font-mono text-sm font-bold text-slate-800">
                                    {{ $application->registration_number }}
                                </span>

                                <button type="button" onclick="copyRegistrationNumber()" id="copy-registration-button"
                                    class="inline-flex items-center gap-2 rounded-lg bg-[#29459b] px-3 py-2 text-xs font-bold text-white transition hover:bg-[#1f3578]">

                                    {{-- Icon Copy --}}
                                    <svg id="copy-icon" class="h-4 w-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>

                                    <span id="copy-text">
                                        Copy
                                    </span>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- DETAIL PENGAJUAN --}}
            <div class="mt-6 grid gap-6 lg:grid-cols-3">

                {{-- POSISI --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e8edff] text-[#29459b]">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.214-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>

                        </div>

                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Posisi Magang
                            </p>

                            <h2 class="text-lg font-extrabold text-slate-900">
                                {{ $application->position->name }}
                            </h2>
                        </div>

                    </div>


                    <div class="mt-6 grid gap-5 sm:grid-cols-2">

                        {{-- INSTITUSI --}}
                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Institusi
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-800">
                                {{ $application->institution }}
                            </p>
                        </div>


                        {{-- PROGRAM STUDI --}}
                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Program Studi
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-800">
                                {{ $application->study_program }}
                            </p>
                        </div>


                        {{-- TANGGAL MULAI --}}
                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Mulai Magang
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-800">
                                {{ $application->start_date?->format('d F Y') }}
                            </p>
                        </div>


                        {{-- TANGGAL SELESAI --}}
                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Selesai Magang
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-800">
                                {{ $application->end_date?->format('d F Y') }}
                            </p>
                        </div>


                        {{-- NOMOR HP --}}
                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Nomor HP
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-800">
                                {{ $application->phone }}
                            </p>
                        </div>


                        {{-- TANGGAL PENGAJUAN --}}
                        <div>
                            <p class="text-xs font-semibold text-slate-400">
                                Diajukan Pada
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-800">
                                {{ $application->created_at?->format('d F Y, H:i') }}
                            </p>
                        </div>

                    </div>

                </div>


                {{-- STATUS SINGKAT --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Ringkasan
                    </p>

                    <div class="mt-5 space-y-5">

                        {{-- STEP 1 --}}
                        <div class="flex gap-3">

                            <div
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                ✓
                            </div>

                            <div>
                                <p class="text-sm font-bold text-slate-800">
                                    Pengajuan Dikirim
                                </p>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Data pengajuan berhasil diterima sistem.
                                </p>
                            </div>

                        </div>


                        {{-- GARIS --}}
                        <div class="ml-4 h-5 border-l border-slate-200"></div>


                        {{-- STEP 2 --}}
                        <div class="flex gap-3">

                            @if ($application->status === 'pending')
                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600">
                                    •
                                </div>
                            @else
                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    ✓
                                </div>
                            @endif

                            <div>
                                <p class="text-sm font-bold text-slate-800">
                                    Review Admin
                                </p>

                                <p class="mt-1 text-xs leading-5 text-slate-500">

                                    @if ($application->status === 'pending')
                                        Pengajuan sedang diperiksa oleh admin.
                                    @else
                                        Pengajuan sudah selesai direview.
                                    @endif

                                </p>
                            </div>

                        </div>


                        {{-- GARIS --}}
                        <div class="ml-4 h-5 border-l border-slate-200"></div>


                        {{-- STEP 3 --}}
                        <div class="flex gap-3">

                            @if ($application->status === 'approved')
                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    ✓
                                </div>

                                <div>
                                    <p class="text-sm font-bold text-emerald-700">
                                        Pengajuan Disetujui
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-slate-500">
                                        Selamat! Pengajuan magang kamu telah disetujui.
                                    </p>
                                </div>
                            @elseif ($application->status === 'rejected')
                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                                    ×
                                </div>

                                <div>
                                    <p class="text-sm font-bold text-red-700">
                                        Pengajuan Ditolak
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-slate-500">
                                        Pengajuan magang kamu belum dapat disetujui.
                                    </p>
                                </div>
                            @else
                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                    •
                                </div>

                                <div>
                                    <p class="text-sm font-bold text-slate-500">
                                        Hasil Pengajuan
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-slate-400">
                                        Menunggu hasil review admin.
                                    </p>
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- CATATAN ADMIN --}}
            @if ($application->notes)
                <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m-3-13a9 9 0 110 18 9 9 0 010-18z" />
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-sm font-bold text-slate-800">
                                Catatan Admin
                            </h3>

                            <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600">
                                {{ $application->notes }}
                            </p>

                        </div>

                    </div>

                </div>
            @endif


            {{-- SURAT PENGAJUAN --}}
            <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <h3 class="text-sm font-bold text-slate-800">
                    Dokumen Pengajuan
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Dokumen yang kamu upload saat melakukan pengajuan.
                </p>


                <div class="mt-5 grid gap-3 sm:grid-cols-3">

                    {{-- COMPANY DOCUMENT --}}
                    @if ($application->company_document)
                        <a href="{{ Storage::url($application->company_document) }}" target="_blank"
                            class="rounded-xl border border-slate-200 p-4 transition hover:border-[#29459b] hover:bg-[#f8f9ff]">

                            <p class="text-sm font-bold text-slate-800">
                                Dokumen Perusahaan
                            </p>

                            <p class="mt-1 text-xs text-[#29459b]">
                                Lihat dokumen →
                            </p>

                        </a>
                    @endif


                    {{-- PERMISSION LETTER --}}
                    @if ($application->permission_letter)
                        <a href="{{ Storage::url($application->permission_letter) }}" target="_blank"
                            class="rounded-xl border border-slate-200 p-4 transition hover:border-[#29459b] hover:bg-[#f8f9ff]">

                            <p class="text-sm font-bold text-slate-800">
                                Surat Izin
                            </p>

                            <p class="mt-1 text-xs text-[#29459b]">
                                Lihat dokumen →
                            </p>

                        </a>
                    @endif


                    {{-- PORTFOLIO --}}
                    @if ($application->portfolio)
                        <a href="{{ Storage::url($application->portfolio) }}" target="_blank"
                            class="rounded-xl border border-slate-200 p-4 transition hover:border-[#29459b] hover:bg-[#f8f9ff]">

                            <p class="text-sm font-bold text-slate-800">
                                Portfolio
                            </p>

                            <p class="mt-1 text-xs text-[#29459b]">
                                Lihat dokumen →
                            </p>

                        </a>
                    @endif

                </div>

            </div>


            {{-- FOOTER INFO --}}
            <div class="mt-6 rounded-2xl border border-[#dce5ff] bg-[#f0f4ff] p-5">

                <div class="flex gap-3">

                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#29459b]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z" />
                    </svg>

                    <p class="text-xs leading-5 text-slate-600">
                        Simpan nomor pendaftaran kamu untuk mempermudah pengecekan
                        status pengajuan magang di kemudian hari.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <script>
        function copyRegistrationNumber() {

            const number = document.getElementById('registration-number').innerText.trim();
            const button = document.getElementById('copy-registration-button');
            const text = document.getElementById('copy-text');
            const icon = document.getElementById('copy-icon');

            navigator.clipboard.writeText(number).then(() => {

                text.innerText = 'Tersalin!';

                icon.innerHTML = `
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                />
            `;

                button.classList.remove('bg-[#29459b]');
                button.classList.add('bg-emerald-600');

                setTimeout(() => {

                    text.innerText = 'Copy';

                    icon.innerHTML = `
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                    />
                `;

                    button.classList.remove('bg-emerald-600');
                    button.classList.add('bg-[#29459b]');

                }, 1500);

            });

        }
    </script>
</x-app-layout>
