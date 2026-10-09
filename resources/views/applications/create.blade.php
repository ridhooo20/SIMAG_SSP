<x-app-layout>

    <div class="min-h-screen bg-[#f8f9ff] py-10 lg:py-14">

        <div class="mx-auto max-w-6xl px-5 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-8">
                <a href="{{ url()->previous() }}"
                    class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-[#29459b]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>

                    Kembali
                </a>

                <div>
                    <p class="mb-2 text-sm font-semibold text-[#29459b]">
                        PENGAJUAN MAGANG
                    </p>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Ajukan Magang
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                        Lengkapi data dan dokumen berikut untuk mengajukan magang
                        pada posisi yang kamu pilih.
                    </p>
                </div>
            </div>


            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">
                    <div class="flex gap-3">
                        <div class="mt-0.5 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01M10.29 3.86l-7.36 12.75A2 2 0 004.67 19.6h14.66a2 2 0 001.74-2.99L13.71 3.86a2 2 0 00-3.42 0z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-semibold text-red-700">
                                Pengajuan belum dapat dikirim
                            </h3>

                            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif


            {{-- SUCCESS / ERROR SESSION --}}
            @if (session('error'))
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif


            {{-- POSITION SUMMARY --}}
            <div class="mb-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 bg-gradient-to-r from-[#eef2ff] to-white px-6 py-5 sm:px-8">
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#29459b]">
                        Posisi yang dipilih
                    </p>

                    <div class="mt-2 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                        <div>
                            <h2 class="text-xl font-bold text-slate-900">
                                {{ $position->name }}
                            </h2>

                            @if ($position->department)
                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $position->department }}
                                </p>
                            @endif
                        </div>

                        <div
                            class="inline-flex w-fit items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-semibold text-[#29459b] ring-1 ring-[#dce3ff]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm10 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                            </svg>

                            {{ $position->quota }} Kuota
                        </div>

                    </div>
                </div>

                @if ($position->description)
                    <div class="px-6 py-5 sm:px-8">
                        <p class="text-sm leading-7 text-slate-600">
                            {{ $position->description }}
                        </p>
                    </div>
                @endif

            </div>


            {{-- FORM --}}
            <form
                action="{{ auth()->user()->role === 'mahasiswa'
                    ? route('mahasiswa.applications.store', $position)
                    : route('siswa.applications.store', $position) }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-8 lg:grid-cols-3">

                    {{-- LEFT CONTENT --}}
                    <div class="space-y-8 lg:col-span-2">

                        {{-- DATA DIRI --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-6">
                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#eef2ff] text-[#29459b]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2 class="font-bold text-slate-900">
                                            Data Diri
                                        </h2>

                                        <p class="text-sm text-slate-500">
                                            Lengkapi informasi dasar kamu.
                                        </p>
                                    </div>

                                </div>
                            </div>


                            <div class="grid gap-5 sm:grid-cols-2">

                                {{-- NAMA --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                                        Nama Lengkap
                                    </label>

                                    <input type="text" value="{{ auth()->user()->name }}" disabled
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-500 outline-none">

                                    <p class="mt-1.5 text-xs text-slate-400">
                                        Nama diambil dari akun kamu.
                                    </p>
                                </div>


                                {{-- EMAIL --}}
                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                                        Email
                                    </label>

                                    <input type="text" value="{{ auth()->user()->email }}" disabled
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-500 outline-none">

                                    <p class="mt-1.5 text-xs text-slate-400">
                                        Email diambil dari akun kamu.
                                    </p>
                                </div>


                                {{-- PHONE --}}
                                <div class="sm:col-span-2">

                                    <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Nomor HP / WhatsApp
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                                        placeholder="Contoh: 081234567890" maxlength="20" required
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#29459b] focus:ring-4 focus:ring-[#29459b]/10">

                                </div>


                                {{-- INSTITUTION --}}
                                <div>

                                    <label for="institution" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Institusi / Sekolah / Universitas
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input id="institution" name="institution" type="text"
                                        value="{{ old('institution') }}" placeholder="Contoh: Universitas Sriwijaya"
                                        required
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#29459b] focus:ring-4 focus:ring-[#29459b]/10">

                                </div>


                                {{-- STUDY PROGRAM --}}
                                <div>

                                    <label for="study_program" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Program Studi
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input id="study_program" name="study_program" type="text"
                                        value="{{ old('study_program') }}" placeholder="Contoh: Teknik Komputer"
                                        required
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#29459b] focus:ring-4 focus:ring-[#29459b]/10">

                                </div>

                            </div>

                        </div>


                        {{-- PERIODE MAGANG --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-6">
                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#eef2ff] text-[#29459b]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2 class="font-bold text-slate-900">
                                            Periode Magang
                                        </h2>

                                        <p class="text-sm text-slate-500">
                                            Tentukan periode magang yang kamu ajukan.
                                        </p>
                                    </div>

                                </div>
                            </div>


                            <div class="grid gap-5 sm:grid-cols-2">

                                {{-- START DATE --}}
                                <div>

                                    <label for="start_date" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Tanggal Mulai
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input id="start_date" name="start_date" type="date"
                                        value="{{ old('start_date') }}" required
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#29459b] focus:ring-4 focus:ring-[#29459b]/10">

                                </div>


                                {{-- END DATE --}}
                                <div>

                                    <label for="end_date" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Tanggal Selesai
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input id="end_date" name="end_date" type="date"
                                        value="{{ old('end_date') }}" required
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#29459b] focus:ring-4 focus:ring-[#29459b]/10">

                                </div>

                            </div>

                        </div>


                        {{-- SURAT PENGANTAR --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-6">
                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#eef2ff] text-[#29459b]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a2 2 0 011.414.586l4.414 4.414A2 2 0 0119 9v10a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2 class="font-bold text-slate-900">
                                            Keterangan
                                        </h2>

                                        <p class="text-sm text-slate-500">
                                            Jelaskan tujuan dan informasi pengajuan magang.
                                        </p>
                                    </div>

                                </div>
                            </div>


                            <div>

                                <label for="cover_letter" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Keterangan
                                    <span class="text-red-500">*</span>
                                </label>

                                <textarea id="cover_letter" name="cover_letter" rows="7" maxlength="5000" required
                                    placeholder="Tuliskan tujuan pengajuan magang, periode magang, atau informasi lain yang perlu diketahui..."
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#29459b] focus:ring-4 focus:ring-[#29459b]/10">{{ old('cover_letter') }}</textarea>

                                <p class="mt-2 text-xs text-slate-400">
                                    Maksimal 5000 karakter.
                                </p>

                            </div>

                        </div>


                        {{-- DOKUMEN --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                            <div class="mb-6">
                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#eef2ff] text-[#29459b]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 18a4.6 4.6 0 01-.88-9.11A5.5 5.5 0 0116.5 7.5 4.5 4.5 0 0118 16h-1m-6-3l-3 3m0 0l3 3m-3-3h12" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2 class="font-bold text-slate-900">
                                            Dokumen Pengajuan
                                        </h2>

                                        <p class="text-sm text-slate-500">
                                            Upload dokumen yang dibutuhkan untuk proses seleksi.
                                        </p>
                                    </div>

                                </div>
                            </div>


                            <div class="space-y-5">

                                {{-- COMPANY DOCUMENT --}}
                                <div>

                                    <label for="company_document"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Dokumen Penting dari Perusahaan
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <div
                                        class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-5 transition hover:border-[#29459b] hover:bg-[#f8f9ff]">

                                        <input id="company_document" name="company_document" type="file"
                                            accept=".pdf,.doc,.docx" required
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-[#29459b] file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-white hover:file:bg-[#20377d]">

                                        <p class="mt-2 text-xs text-slate-400">
                                            PDF, DOC, atau DOCX. Maksimal 5 MB.
                                        </p>

                                    </div>

                                </div>


                                {{-- PERMISSION LETTER --}}
                                <div>

                                    <label for="permission_letter"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Surat Izin Resmi
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <div
                                        class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-5 transition hover:border-[#29459b] hover:bg-[#f8f9ff]">

                                        <input id="permission_letter" name="permission_letter" type="file"
                                            accept=".pdf,.doc,.docx" required
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-[#29459b] file:px-4 file:py-2.5 file:font-semibold file:text-white hover:file:bg-[#20377d]">

                                        <p class="mt-2 text-xs text-slate-400">
                                            PDF, DOC, atau DOCX. Maksimal 5 MB.
                                        </p>

                                    </div>

                                </div>


                                {{-- PORTFOLIO --}}
                                <div>

                                    <label for="portfolio" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Portofolio
                                        <span
                                            class="ml-1 rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-500">
                                            Opsional
                                        </span>
                                    </label>

                                    <div
                                        class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-5 transition hover:border-[#29459b] hover:bg-[#f8f9ff]">

                                        <input id="portfolio" name="portfolio" type="file"
                                            accept=".pdf,.doc,.docx"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-slate-700 file:px-4 file:py-2.5 file:font-semibold file:text-white hover:file:bg-slate-800">

                                        <p class="mt-2 text-xs text-slate-400">
                                            PDF, DOC, atau DOCX. Maksimal 5 MB. Boleh dikosongkan.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- RIGHT SIDEBAR --}}
                    <div class="lg:col-span-1">

                        <div class="space-y-5 lg:sticky lg:top-24">

                            {{-- SUMMARY --}}
                            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                                <h3 class="font-bold text-slate-900">
                                    Ringkasan Pengajuan
                                </h3>

                                <div class="mt-5 space-y-4">

                                    <div>
                                        <p class="text-xs font-medium text-slate-400">
                                            Posisi
                                        </p>

                                        <p class="mt-1 text-sm font-semibold text-slate-700">
                                            {{ $position->name }}
                                        </p>
                                    </div>


                                    @if ($position->department)
                                        <div>
                                            <p class="text-xs font-medium text-slate-400">
                                                Departemen
                                            </p>

                                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                                {{ $position->department }}
                                            </p>
                                        </div>
                                    @endif


                                    <div>
                                        <p class="text-xs font-medium text-slate-400">
                                            Kuota Tersedia
                                        </p>

                                        <p class="mt-1 text-sm font-semibold text-[#29459b]">
                                            {{ $position->quota }} peserta
                                        </p>
                                    </div>

                                </div>

                            </div>


                            {{-- IMPORTANT INFO --}}
                            <div class="rounded-3xl border border-[#dce3ff] bg-[#eef2ff] p-6">

                                <div class="flex gap-3">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="mt-0.5 h-5 w-5 shrink-0 text-[#29459b]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z" />
                                    </svg>

                                    <div>
                                        <h3 class="text-sm font-bold text-[#20377d]">
                                            Perhatikan sebelum mengirim
                                        </h3>

                                        <ul class="mt-3 space-y-2 text-xs leading-5 text-[#40518a]">
                                            <li>
                                                • Pastikan semua data yang diisi sudah benar.
                                            </li>

                                            <li>
                                                • Dokumen wajib harus sudah disiapkan.
                                            </li>

                                            <li>
                                                • Pastikan file dapat dibuka dengan baik.
                                            </li>

                                            <li>
                                                • Pengajuan akan berstatus <strong>Pending</strong> setelah dikirim.
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>


                            {{-- SUBMIT --}}
                            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                                <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#29459b] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#20377d] focus:outline-none focus:ring-4 focus:ring-[#29459b]/20">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 19V5m0 0l-5 5m5-5l5 5" />
                                    </svg>

                                    Kirim Pengajuan
                                </button>

                                <p class="mt-3 text-center text-xs leading-5 text-slate-400">
                                    Dengan mengirim pengajuan, kamu menyatakan bahwa
                                    data yang diberikan sudah benar.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
