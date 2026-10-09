<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pengajuan Magang
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="mx-auto max-w-6xl px-5 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <h1 class="text-2xl font-bold text-slate-800">
                            Detail Pengajuan Magang
                        </h1>

                        <p class="mt-1 text-sm text-slate-500">
                            Periksa data dan dokumen peserta sebelum memproses pengajuan.
                        </p>
                    </div>

                    <a href="{{ route('admin.applications.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50">

                        ← Kembali

                    </a>

                </div>

            </div>


            {{-- Success --}}
            @if (session('success'))
                <div
                    class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Error --}}
            @if ($errors->any())

                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

                    <ul class="list-disc space-y-1 pl-5">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="grid gap-6 lg:grid-cols-3">


                {{-- ========================= --}}
                {{-- DATA PENGAJU --}}
                {{-- ========================= --}}

                <div class="space-y-6 lg:col-span-2">

                    {{-- Identitas --}}
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h3 class="font-bold text-slate-800">
                                Data Peserta
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Informasi peserta yang mengajukan magang.
                            </p>

                        </div>


                        <div class="grid gap-5 p-6 sm:grid-cols-2">

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Nama
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->user->name }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Email
                                </p>

                                <p class="mt-1 font-semibold text-slate-800 break-all">
                                    {{ $application->user->email }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Nomor Registrasi
                                </p>

                                <p class="mt-1 font-semibold text-[#29459b]">
                                    {{ $application->registration_number }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Nomor Telepon
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->phone }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Institusi
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->institution }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Program Studi
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->study_program }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Posisi & Periode --}}
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h3 class="font-bold text-slate-800">
                                Informasi Magang
                            </h3>

                        </div>


                        <div class="grid gap-5 p-6 sm:grid-cols-2">

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Posisi Magang
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->position->name }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Departemen
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->position->department ?? '-' }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Mulai Magang
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->start_date?->format('d F Y') }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-slate-400">
                                    Selesai Magang
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    {{ $application->end_date?->format('d F Y') }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Surat / Cover Letter --}}
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h3 class="font-bold text-slate-800">
                                Keterangan
                            </h3>

                        </div>

                        <div class="p-6">

                            <div class="rounded-xl bg-slate-50 p-4 text-sm leading-7 text-slate-700">
                                {{ $application->cover_letter }}
                            </div>

                        </div>

                    </div>


                    {{-- Dokumen --}}
                    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-5">

                            <h3 class="font-bold text-slate-800">
                                Dokumen Pengajuan
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Dokumen yang dikirim oleh peserta.
                            </p>

                        </div>


                        <div class="space-y-3 p-6">


                            {{-- Dokumen Perusahaan --}}
                            @if ($application->company_document)
                                <a href="{{ Storage::url($application->company_document) }}" target="_blank"
                                    class="flex items-center justify-between rounded-xl border border-slate-200 p-4 transition hover:border-blue-200 hover:bg-blue-50">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600">

                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-semibold text-slate-800">
                                                Dokumen Penting dari Perusahaan
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                Buka dokumen
                                            </p>

                                        </div>

                                    </div>

                                    <span class="text-sm font-semibold text-[#29459b]">
                                        Lihat →
                                    </span>

                                </a>
                            @endif


                            {{-- Surat Izin --}}
                            @if ($application->permission_letter)
                                <a href="{{ Storage::url($application->permission_letter) }}" target="_blank"
                                    class="flex items-center justify-between rounded-xl border border-slate-200 p-4 transition hover:border-blue-200 hover:bg-blue-50">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600">

                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-semibold text-slate-800">
                                                Surat Izin
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                Buka dokumen
                                            </p>

                                        </div>

                                    </div>

                                    <span class="text-sm font-semibold text-[#29459b]">
                                        Lihat →
                                    </span>

                                </a>
                            @endif


                            {{-- Portfolio --}}
                            @if ($application->portfolio)
                                <a href="{{ Storage::url($application->portfolio) }}" target="_blank"
                                    class="flex items-center justify-between rounded-xl border border-slate-200 p-4 transition hover:border-blue-200 hover:bg-blue-50">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-[#29459b]">

                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6Zm4 2h8m-8 4h8m-8 4h5" />
                                            </svg>

                                        </div>

                                        <div>

                                            <p class="text-sm font-semibold text-slate-800">
                                                Portfolio
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                Buka dokumen
                                            </p>

                                        </div>

                                    </div>

                                    <span class="text-sm font-semibold text-[#29459b]">
                                        Lihat →
                                    </span>

                                </a>
                            @endif

                        </div>

                    </div>

                </div>


                {{-- ========================= --}}
                {{-- STATUS & ACTION --}}
                {{-- ========================= --}}

                <div class="space-y-6">


                    {{-- Status --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Status Pengajuan
                        </p>


                        <div class="mt-3">

                            @if ($application->status === 'pending')
                                <span
                                    class="inline-flex rounded-full bg-amber-50 px-4 py-2 text-sm font-semibold text-amber-700">
                                    Menunggu Review
                                </span>
                            @elseif ($application->status === 'approved')
                                <span
                                    class="inline-flex rounded-full bg-green-50 px-4 py-2 text-sm font-semibold text-green-700">
                                    Disetujui
                                </span>
                            @elseif ($application->status === 'rejected')
                                <span
                                    class="inline-flex rounded-full bg-red-50 px-4 py-2 text-sm font-semibold text-red-700">
                                    Ditolak
                                </span>
                            @endif

                        </div>

                    </div>


                    {{-- Action --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <h3 class="font-bold text-slate-800">
                            Proses Pengajuan
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-slate-500">
                            Atur status pengajuan sesuai hasil proses seleksi.
                        </p>


                        {{-- STATUS SAAT INI --}}
                        <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-4">

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                Status Saat Ini
                            </p>

                            <div class="mt-2">

                                @if ($application->status === 'pending')
                                    <span
                                        class="inline-flex rounded-full bg-amber-100 px-3 py-1.5 text-sm font-semibold text-amber-700">
                                        Pending
                                    </span>
                                @elseif ($application->status === 'approved')
                                    <span
                                        class="inline-flex rounded-full bg-green-100 px-3 py-1.5 text-sm font-semibold text-green-700">
                                        Disetujui
                                    </span>
                                @elseif ($application->status === 'rejected')
                                    <span
                                        class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-sm font-semibold text-red-700">
                                        Ditolak
                                    </span>
                                @endif

                            </div>

                        </div>




                        {{-- TOLAK --}}
                        <form action="{{ route('admin.applications.reject', $application) }}" method="POST"
                            class="mt-3">

                            @csrf
                            @method('PATCH')

                            <textarea name="notes" rows="4" placeholder="Alasan penolakan (opsional)"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm placeholder:text-slate-400 focus:border-[#29459b] focus:ring-[#29459b]">{{ $application->notes }}</textarea>

                            <button type="submit"
                                class="mt-3 flex min-h-[48px] w-full items-center justify-center gap-2 rounded-xl border border-red-600 bg-red-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:border-red-700 hover:bg-red-700">

                                <span class="text-base font-bold">✕</span>

                                <span>
                                    Tolak Pengajuan
                                </span>

                            </button>

                        </form>


                        {{-- KEMBALIKAN KE PENDING --}}
                        <form action="{{ route('admin.applications.pending', $application) }}" method="POST"
                            class="mt-3">

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                style="background-color: #f59e0b !important; color: #ffffff !important; border-color: #f59e0b !important;"
                                class="flex min-h-[48px] w-full items-center justify-center gap-2 rounded-xl border px-4 py-3 text-sm font-semibold shadow-sm transition hover:opacity-90">

                                <span class="text-base font-bold">↻</span>

                                <span>
                                    Kembalikan ke Pending
                                </span>

                            </button>

                        </form>

                        {{-- SETUJUI --}}
                        <form action="{{ route('admin.applications.approve', $application) }}" method="POST"
                            class="mt-4">

                            @csrf
                            @method('PATCH')

                            <div class="rounded-xl border border-green-200 bg-green-50 p-4">

                                <div class="flex items-start gap-3">
                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-green-100">
                                        <span class="text-lg">✓</span>
                                    </div>

                                    <div>
                                        <p class="text-sm font-bold text-green-800">
                                            Setujui Pengajuan
                                        </p>

                                        <p class="mt-1 text-xs leading-5 text-green-700">
                                            Tambahkan pesan atau instruksi yang akan dilihat oleh peserta
                                            setelah pengajuan disetujui.
                                        </p>
                                    </div>
                                </div>

                                {{-- PESAN UNTUK PESERTA --}}
                                <div class="mt-4">

                                    <label for="approval_message"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Pesan untuk Peserta
                                        <span class="font-normal text-slate-400">(opsional)</span>
                                    </label>

                                    <textarea name="notes" id="approval_message" rows="5"
                                        placeholder="Contoh:

Selamat, pengajuan magang Anda telah disetujui.

Silakan menghubungi Bapak Andi di 0812-xxxx-xxxx untuk informasi lebih lanjut.

Peserta dimohon hadir pada:
Tanggal: 10 Oktober 2026
Pukul: 08.00 WIB
Tempat: Ruang HRD SSP"
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm leading-6 text-slate-700 shadow-sm placeholder:text-slate-400 focus:border-[#29459b] focus:ring-[#29459b]">{{ $application->status === 'approved' ? $application->notes : '' }}</textarea>

                                </div>

                                {{-- BUTTON --}}
                                <button type="submit"
                                    style="background-color: #16a34a !important; color: #ffffff !important; border-color: #16a34a !important;"
                                    class="mt-3 flex min-h-[48px] w-full items-center justify-center gap-2 rounded-xl border px-4 py-3 text-sm font-semibold shadow-sm transition hover:opacity-90">

                                    <span class="text-base font-bold">
                                        ✓
                                    </span>

                                    <span>
                                        Setujui Pengajuan
                                    </span>

                                </button>

                            </div>

                        </form>
                    </div>

                    {{-- Catatan --}}
                    @if ($application->notes)
                        <div class="rounded-2xl border border-red-100 bg-red-50 p-6">

                            <p class="text-xs font-semibold uppercase tracking-wide text-red-500">
                                Catatan Admin
                            </p>

                            <p class="mt-2 text-sm leading-6 text-red-700">
                                {{ $application->notes }}
                            </p>

                        </div>
                    @endif


                    {{-- Metadata --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Informasi Pengajuan
                        </p>

                        <div class="mt-4 space-y-3 text-sm">

                            <div class="flex justify-between gap-4">

                                <span class="text-slate-500">
                                    Diajukan
                                </span>

                                <span class="font-medium text-slate-700">
                                    {{ $application->created_at?->format('d M Y, H:i') }}
                                </span>

                            </div>

                            <div class="flex justify-between gap-4">

                                <span class="text-slate-500">
                                    Terakhir diperbarui
                                </span>

                                <span class="font-medium text-slate-700">
                                    {{ $application->updated_at?->format('d M Y, H:i') }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
