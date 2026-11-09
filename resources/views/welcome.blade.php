{{-- resources/views/welcome.blade.php --}}

{{-- Hero --}}
<main>

    <section id="beranda" class="relative overflow-hidden bg-gradient-to-br from-[#f3f5ff] via-[#f9faff] to-[#eef1ff]">

        {{-- Background decorative --}}
        <div class="pointer-events-none absolute -left-20 top-20 h-72 w-72 rounded-full bg-blue-200/20 blur-3xl"></div>

        <div class="pointer-events-none absolute right-0 top-0 h-96 w-96 rounded-full bg-indigo-200/20 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-5 pb-10 pt-16 lg:px-8 lg:pb-8 lg:pt-24">

            <div class="grid items-center gap-10 lg:grid-cols-[1.08fr_0.92fr]">

                {{-- LEFT --}}
                <div>

                    <div
                        class="mb-4 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-3 py-1.5 shadow-sm">

                        <span class="h-2 w-2 rounded-full bg-blue-600"></span>

                        <span class="text-[10px] font-bold uppercase tracking-wide text-blue-700">
                            Pendaftaran Magang Telah Dibuka!
                        </span>

                    </div>


                    <h1
                        class="max-w-2xl text-4xl font-extrabold leading-[1.08] tracking-[-0.035em] text-slate-900 sm:text-5xl lg:text-[48px]">

                        Langkah

                        <span class="text-[#0c57cc]">
                            Pasti,
                        </span>
                        Hasil Berarti. SSP Beraksi
                    </h1>


                    <p class="mt-5 max-w-xl text-sm leading-6 text-slate-600 sm:text-[15px]">
                        Akselerasi kesiapan profesional bagi Mahasiswa D3/D4/S1 dan Siswa SMK
                        berprestasi. Terjun langsung dalam ekosistem industri strategis dengan
                        kurikulum terpadu dan bimbingan mentor berpengalaman.
                    </p>


                    <div class="mt-6 flex flex-wrap gap-3">

                        <a href="{{ route('register') }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-[#0759d1] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-[#034bb5]">

                            Daftar Sekarang

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-6-6 6 6-6 6" />
                            </svg>

                        </a>


                        <a href="{{ asset('documents/panduan-magang.pdf') }}" target="_blank"
                            class="inline-flex items-center gap-2 rounded-xl bg-[#e8edff] px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-[#dce5ff]">

                            <svg class="h-4 w-4 text-[#29459b]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M4 5.5A2.5 2.5 0 0 1 6.5 3H11v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M20 5.5A2.5 2.5 0 0 0 17.5 3H13v16h4.5A2.5 2.5 0 0 1 20 21V5.5Z" />
                            </svg>

                            Buku Panduan Magang

                        </a>

                    </div>


                    <div class="mt-7 grid grid-cols-3 gap-3">

                        <div class="rounded-xl border border-white bg-white px-4 py-4 shadow-sm">
                            <div class="text-xl font-extrabold text-[#173e96]">
                                1.200+
                            </div>

                            <div class="mt-1 text-[10px] text-slate-500">
                                Peserta Diterima
                            </div>
                        </div>


                        <div class="rounded-xl border border-white bg-white px-4 py-4 shadow-sm">
                            <div class="text-xl font-extrabold text-[#0a58d0]">
                                45+
                            </div>

                            <div class="mt-1 text-[10px] text-slate-500">
                                Divisi Industri
                            </div>
                        </div>


                        <div class="rounded-xl border border-white bg-white px-4 py-4 shadow-sm">
                            <div class="text-xl font-extrabold text-[#08746d]">
                                98%
                            </div>

                            <div class="mt-1 text-[10px] text-slate-500">
                                Tingkat Kepuasan
                            </div>
                        </div>

                    </div>

                </div>


                {{-- RIGHT --}}
                <div class="relative">

                    <div class="overflow-hidden rounded-2xl bg-slate-200 shadow-xl shadow-slate-900/10">

                        <img src="{{ asset('images/hero-magang.jpeg') }}" alt="Peserta magang SSP"
                            class="h-[300px] w-full object-cover sm:h-[370px] lg:h-[390px]" />

                    </div>


                    <div
                        class="absolute bottom-4 left-3 right-3 rounded-xl border border-white/60 bg-white/95 p-3 shadow-xl backdrop-blur sm:left-5 sm:right-5">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#dfe8ff] text-[#193f9c]">

                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">

                                    <path
                                        d="M12 2 15 5h4v4l3 3-3 3v4h-4l-3 3-3-3H5v-4l-3-3 3-3V5h4l3-3Zm0 6.2a3.8 3.8 0 1 0 0 7.6 3.8 3.8 0 0 0 0-7.6Z" />

                                </svg>

                            </div>


                            <div>

                                <p class="text-xs font-bold text-slate-800">
                                    Sertifikasi Kompetensi Resmi
                                </p>

                                <p class="mt-0.5 text-[10px] text-slate-500">
                                    Divalidasi oleh para profesional langsung
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Tracking --}}
    <section id="tracking" class="relative -mt-1 px-5 pb-8 lg:px-8">

        <div class="mx-auto max-w-7xl">

            <div class="rounded-2xl border border-white bg-white p-5 shadow-xl shadow-slate-900/10 lg:p-6">

                <div class="grid items-center gap-5 lg:grid-cols-[1fr_1.5fr]">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#24459a] text-white">

                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <circle cx="12" cy="12" r="9" stroke-width="1.8" />

                                <path stroke-linecap="round" stroke-width="1.8" d="M12 7v5l3 2" />

                            </svg>

                        </div>


                        <div>

                            <h2 class="text-sm font-bold text-slate-800">
                                Lacak Status Pengajuan Magang
                            </h2>

                            <p class="mt-1 max-w-md text-[10px] leading-4 text-slate-500">
                                Ketahui progres seleksi berkas &amp; tes Anda secara real-time
                                langsung tanpa perlu login akun.
                            </p>

                        </div>

                    </div>


                    <form action="{{ route('tracking') }}" method="GET" class="flex flex-col gap-2 sm:flex-row">

                        <div class="relative flex-1">

                            <svg class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 7h6m-7 4h8m-10 7h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z" />
                            </svg>

                            <input type="text" name="registration_number"
                                value="{{ request('registration_number') }}"
                                placeholder="Masukkan No. Registrasi (cth: MAG-20261001-A8F31C)"
                                class="h-12 w-full rounded-xl border-0 bg-[#f1f3fc] pl-11 pr-4 text-xs text-slate-700 outline-none placeholder:text-slate-400 focus:ring-2 focus:ring-blue-100" />

                        </div>

                        <button type="submit"
                            class="h-12 rounded-xl bg-[#063586] px-6 text-xs font-semibold text-white transition hover:bg-[#052d73]">
                            Cek Instan
                        </button>

                    </form>

                    {{-- TRACKING MODAL --}}
                    @if (session('tracking_result') || session('tracking_error'))

                        <div id="tracking-modal"
                            class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/50 px-5 backdrop-blur-sm"
                            onclick="closeTrackingModal(event)">

                            <div class="relative w-full max-w-md overflow-hidden rounded-3xl bg-white shadow-2xl"
                                onclick="event.stopPropagation()">

                                {{-- CLOSE BUTTON --}}
                                <button type="button" onclick="closeTrackingModal()"
                                    class="absolute right-4 top-4 z-10 flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition hover:bg-slate-200 hover:text-slate-800">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 6l12 12M6 18L18 6" />
                                    </svg>
                                </button>


                                @if (session('tracking_result'))

                                    @php
                                        $result = session('tracking_result');
                                    @endphp


                                    {{-- HEADER --}}
                                    <div class="bg-gradient-to-br from-[#eef3ff] to-white px-6 pb-6 pt-8 text-center">

                                        {{-- STATUS ICON --}}
                                        @if ($result['status'] === 'pending')
                                            <div
                                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-amber-100">

                                                <svg class="h-8 w-8 text-amber-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="9" stroke-width="1.8" />

                                                    <path stroke-linecap="round" stroke-width="1.8" d="M12 7v5l3 2" />
                                                </svg>

                                            </div>


                                            <h3 class="mt-4 text-xl font-extrabold text-slate-900">
                                                Menunggu Review
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                Pengajuan kamu sedang diperiksa oleh admin.
                                            </p>
                                        @elseif ($result['status'] === 'approved')
                                            <div
                                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100">

                                                <svg class="h-8 w-8 text-emerald-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>

                                            </div>


                                            <h3 class="mt-4 text-xl font-extrabold text-emerald-700">
                                                Pengajuan Disetujui
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                Selamat! Pengajuan magang kamu telah disetujui.
                                            </p>
                                        @elseif ($result['status'] === 'rejected')
                                            <div
                                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-100">

                                                <svg class="h-8 w-8 text-red-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 6l12 12M6 18L18 6" />
                                                </svg>

                                            </div>


                                            <h3 class="mt-4 text-xl font-extrabold text-red-700">
                                                Pengajuan Ditolak
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                Pengajuan magang kamu belum dapat disetujui.
                                            </p>
                                        @endif

                                    </div>


                                    {{-- DETAIL --}}
                                    <div class="px-6 py-5">

                                        {{-- NOMOR PENDAFTARAN --}}
                                        <div class="rounded-xl bg-slate-50 p-4">

                                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                                Nomor Pendaftaran
                                            </p>

                                            <div class="mt-1 flex items-center justify-between gap-3">

                                                <span class="font-mono text-sm font-bold text-slate-800">
                                                    {{ $result['registration_number'] }}
                                                </span>

                                                <button type="button"
                                                    onclick="copyTrackingNumber('{{ $result['registration_number'] }}')"
                                                    class="shrink-0 rounded-lg bg-white px-3 py-1.5 text-[10px] font-bold text-[#29459b] shadow-sm ring-1 ring-slate-200 transition hover:bg-[#eef3ff]">
                                                    Copy
                                                </button>

                                            </div>

                                        </div>


                                        {{-- INFORMASI --}}
                                        <div class="mt-4 grid grid-cols-2 gap-x-4 gap-y-4">

                                            <div>

                                                <p class="text-[10px] font-semibold text-slate-400">
                                                    Posisi Magang
                                                </p>

                                                <p class="mt-1 text-xs font-bold leading-5 text-slate-800">
                                                    {{ $result['position'] ?? '-' }}
                                                </p>

                                            </div>


                                            <div>

                                                <p class="text-[10px] font-semibold text-slate-400">
                                                    Institusi
                                                </p>

                                                <p class="mt-1 text-xs font-bold leading-5 text-slate-800">
                                                    {{ $result['institution'] ?? '-' }}
                                                </p>

                                            </div>


                                            <div>

                                                <p class="text-[10px] font-semibold text-slate-400">
                                                    Program Studi
                                                </p>

                                                <p class="mt-1 text-xs font-bold leading-5 text-slate-800">
                                                    {{ $result['study_program'] ?? '-' }}
                                                </p>

                                            </div>


                                            <div>

                                                <p class="text-[10px] font-semibold text-slate-400">
                                                    Periode Magang
                                                </p>

                                                <p class="mt-1 text-xs font-bold leading-5 text-slate-800">
                                                    {{ $result['start_date'] ?? '-' }}
                                                    -
                                                    {{ $result['end_date'] ?? '-' }}
                                                </p>

                                            </div>

                                        </div>


                                        {{-- CATATAN --}}
                                        @if (!empty($result['notes']))
                                            <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-4">

                                                <p
                                                    class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                                    Catatan Admin
                                                </p>

                                                <p class="mt-1 text-xs leading-5 text-slate-600">
                                                    {{ $result['notes'] }}
                                                </p>

                                            </div>
                                        @endif


                                        {{-- BUTTON --}}
                                        <button type="button" onclick="closeTrackingModal()"
                                            class="mt-5 w-full rounded-xl bg-[#0759d1] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#034bb5]">
                                            Tutup
                                        </button>

                                    </div>
                                @elseif (session('tracking_error'))
                                    {{-- ERROR MODAL --}}
                                    <div class="px-6 pb-7 pt-10 text-center">

                                        <div
                                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-100">

                                            <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v3m0 4h.01M10.29 3.86l-7.36 12a2 2 0 001.71 3h14.72a2 2 0 001.71-3l-7.36-12a2 2 0 00-3.42 0z" />
                                            </svg>

                                        </div>


                                        <h3 class="mt-4 text-xl font-extrabold text-slate-900">
                                            Nomor Tidak Ditemukan
                                        </h3>


                                        <p class="mt-2 text-sm leading-6 text-slate-500">
                                            {{ session('tracking_error') }}
                                        </p>


                                        <p class="mt-1 text-xs text-slate-400">
                                            Pastikan nomor pendaftaran yang kamu masukkan sudah benar.
                                        </p>


                                        <button type="button" onclick="closeTrackingModal()"
                                            class="mt-6 w-full rounded-xl bg-[#0759d1] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#034bb5]">
                                            Coba Lagi
                                        </button>

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- MODAL SCRIPT --}}
                        <script>
                            function closeTrackingModal() {

                                const modal = document.getElementById('tracking-modal');

                                if (modal) {
                                    modal.remove();
                                }

                            }


                            function copyTrackingNumber(number) {

                                navigator.clipboard.writeText(number).then(() => {

                                    alert('Nomor pendaftaran berhasil disalin.');

                                });

                            }


                            document.addEventListener('keydown', function(event) {

                                if (event.key === 'Escape') {
                                    closeTrackingModal();
                                }

                            });
                        </script>

                    @endif

                </div>

            </div>

        </div>

    </section>

</main>
