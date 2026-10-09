<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-bold text-slate-800">
                Detail Peserta Magang
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Informasi akun, pengajuan, dan dokumen peserta.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Navigasi dan judul --}}
            <div class="mb-7 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">
                        {{ $user->name }}
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Detail informasi peserta dan seluruh pengajuan magangnya.
                    </p>
                </div>

                <a href="{{ route('admin.participants.index') }}"
                    class="inline-flex items-center justify-center gap-2 self-start rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 sm:self-auto">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m15 18-6-6 6-6" />
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            {{-- Profil peserta --}}
            <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-6 py-5">
                    <h3 class="font-bold text-slate-800">Informasi Akun</h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Identitas akun peserta yang terdaftar.
                    </p>
                </div>

                <div class="p-6">
                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center">
                        <div
                            class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl bg-[#e8edff] text-3xl font-bold text-[#29459b]">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <h4 class="text-xl font-bold text-slate-800">
                                {{ $user->name }}
                            </h4>
                            <p class="mt-1 break-all text-sm text-slate-500">
                                {{ $user->email }}
                            </p>
                            <div class="mt-3">
                                <span
                                    class="inline-flex rounded-full bg-[#eef2ff] px-3 py-1 text-xs font-semibold text-[#29459b]">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>

                        <div class="rounded-xl border border-slate-100 bg-slate-50 px-5 py-4">
                            <p class="text-xs font-medium text-slate-500">
                                Total Pengajuan
                            </p>
                            <p class="mt-1 text-2xl font-bold text-slate-800">
                                {{ $user->applications->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Riwayat pengajuan --}}
            <div class="mb-6">
                <h3 class="text-lg font-bold text-slate-800">
                    Riwayat Pengajuan
                </h3>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi lengkap setiap pengajuan magang peserta.
                </p>
            </div>

            @forelse($user->applications as $application)
                <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div
                        class="flex flex-col justify-between gap-3 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                                Pengajuan {{ $loop->iteration }}
                            </p>
                            <h4 class="mt-1 font-bold text-slate-800">
                                {{ $application->registration_number }}
                            </h4>
                        </div>

                        @if ($application->status === 'approved')
                            <span
                                class="inline-flex w-fit rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                Diterima
                            </span>
                        @elseif($application->status === 'rejected')
                            <span
                                class="inline-flex w-fit rounded-full bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700">
                                Ditolak
                            </span>
                        @else
                            <span
                                class="inline-flex w-fit rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                Pending
                            </span>
                        @endif
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 lg:grid-cols-3">

                            <div>
                                <p class="text-xs font-medium text-slate-400">Nomor HP</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->phone ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-medium text-slate-400">Institusi</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->institution ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-medium text-slate-400">Program Studi</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->study_program ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-medium text-slate-400">Posisi Magang</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->position?->name ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-medium text-slate-400">Tanggal Mulai</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->start_date?->format('d M Y') ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-medium text-slate-400">Tanggal Selesai</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->end_date?->format('d M Y') ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-medium text-slate-400">Tanggal Pengajuan</p>
                                <p class="mt-2 text-sm font-medium text-slate-700">
                                    {{ $application->created_at?->format('d M Y, H:i') ?? '-' }}
                                </p>
                            </div>

                            <div class="sm:col-span-2">
                                <p class="text-xs font-medium text-slate-400">Catatan Admin</p>
                                <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-700">
                                    {{ $application->notes ?: '-' }}
                                </p>
                            </div>

                            <div class="sm:col-span-2 lg:col-span-3">
                                <p class="text-xs font-medium text-slate-400">Surat Lamaran</p>
                                <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-700">
                                    {{ $application->cover_letter ?: '-' }}
                                </p>
                            </div>
                        </div>

                        {{-- Dokumen --}}
                        <div class="mt-7 border-t border-slate-100 pt-6">
                            <h5 class="font-bold text-slate-800">
                                Dokumen Peserta
                            </h5>
                            <p class="mt-1 text-sm text-slate-500">
                                Buka dokumen yang telah diunggah peserta.
                            </p>

                            <div class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                @php
                                    $documents = [
                                        'company_document' => 'Dokumen Perusahaan',
                                        'permission_letter' => 'Surat Izin',
                                        'portfolio' => 'Portofolio',
                                    ];
                                @endphp

                                @foreach ($documents as $field => $label)
                                    <div
                                        class="flex items-center justify-between gap-3 rounded-xl border border-slate-200 p-4">
                                        <div class="flex min-w-0 items-center gap-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#eef2ff] text-[#29459b]">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.8"
                                                        d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Zm7 0v5h5M9 13h6m-6 4h6" />
                                                </svg>
                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-sm font-semibold text-slate-700">
                                                    {{ $label }}
                                                </p>
                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ $application->$field ? 'Dokumen tersedia' : 'Belum diunggah' }}
                                                </p>
                                            </div>
                                        </div>

                                        @if ($application->$field)
                                            <a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($application->$field) }}"
                                                target="_blank" rel="noopener noreferrer"
                                                class="shrink-0 rounded-lg bg-[#29459b] px-3 py-2 text-xs font-semibold text-white transition hover:bg-[#20377c]">
                                                Buka
                                            </a>
                                        @else
                                            <span class="shrink-0 text-xs text-slate-400">—</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center shadow-sm">
                    <h4 class="font-semibold text-slate-700">
                        Belum ada pengajuan
                    </h4>
                    <p class="mt-1 text-sm text-slate-500">
                        Peserta ini belum memiliki riwayat pengajuan magang.
                    </p>
                </div>
            @endforelse

            <div class="mt-6">
                <a href="{{ route('admin.participants.index') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m15 18-6-6 6-6" />
                    </svg>
                    Kembali ke Data Peserta
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
