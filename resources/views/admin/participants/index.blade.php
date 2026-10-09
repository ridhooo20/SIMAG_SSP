<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-bold text-slate-800">
                Data Peserta Magang
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Kelola dan pantau peserta magang yang terdaftar di SSP.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Header halaman --}}
            <div class="mb-7 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                        Daftar Peserta
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Lihat informasi peserta dan riwayat pengajuan magang.
                    </p>
                </div>

                <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e8edff] text-[#29459b]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m10-10a4 4 0 1 0-8 0 4 4 0 0 0 8 0Zm6 10v-2a4 4 0 0 0-3-3.87m0-8.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-500">Total hasil</p>
                        <p class="text-lg font-bold text-slate-800">
                            {{ $participants->total() }} peserta
                        </p>
                    </div>
                </div>
            </div>

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Pencarian dan filter --}}
            <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-4">
                    <h3 class="font-bold text-slate-800">Pencarian Peserta</h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Cari berdasarkan nama, email, institusi, atau nomor registrasi.
                    </p>
                </div>

                <form method="GET" action="{{ route('admin.participants.index') }}"
                    class="grid grid-cols-1 gap-4 md:grid-cols-12">

                    <div class="md:col-span-6">
                        <label for="search" class="mb-2 block text-sm font-medium text-slate-700">
                            Kata kunci
                        </label>
                        <input id="search" type="text" name="search" value="{{ request('search') }}"
                            placeholder="Masukkan kata kunci..."
                            class="w-full rounded-xl border-slate-200 text-sm shadow-sm placeholder:text-slate-400 focus:border-[#29459b] focus:ring-[#29459b]">
                    </div>

                    <div class="md:col-span-3">
                        <label for="status" class="mb-2 block text-sm font-medium text-slate-700">
                            Status pengajuan
                        </label>
                        <select id="status" name="status"
                            class="w-full rounded-xl border-slate-200 text-sm shadow-sm focus:border-[#29459b] focus:ring-[#29459b]">
                            <option value="">Semua Status</option>
                            <option value="pending" @selected(request('status') === 'pending')>
                                Pending
                            </option>
                            <option value="approved" @selected(request('status') === 'approved')>
                                Diterima
                            </option>
                            <option value="rejected" @selected(request('status') === 'rejected')>
                                Ditolak
                            </option>
                        </select>
                    </div>

                    <div class="flex items-end gap-2 md:col-span-3">
                        <button type="submit"
                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-[#29459b] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#20377c]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7" stroke-width="2" />
                                <path stroke-linecap="round" stroke-width="2" d="m16 16 4 4" />
                            </svg>
                            Cari
                        </button>

                        <a href="{{ route('admin.participants.index') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            {{-- Tabel peserta --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex flex-col gap-1 border-b border-slate-100 px-5 py-5 sm:px-6">
                    <h3 class="font-bold text-slate-800">Informasi Peserta</h3>
                    <p class="text-sm text-slate-500">
                        Data peserta berdasarkan pengajuan magang yang tersedia.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[850px] text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4 font-semibold">No.</th>
                                <th class="px-6 py-4 font-semibold">Peserta</th>
                                <th class="px-6 py-4 font-semibold">Institusi</th>
                                <th class="px-6 py-4 font-semibold">Posisi Magang</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 text-right font-semibold">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse($participants as $participant)
                                @php
                                    $application = $participant->applications->sortByDesc('created_at')->first();

                                    $status = $application?->status;
                                @endphp

                                <tr class="transition hover:bg-slate-50/80">
                                    <td class="whitespace-nowrap px-6 py-5 text-slate-500">
                                        {{ $participants->firstItem() + $loop->index }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#e8edff] font-bold text-[#29459b]">
                                                {{ strtoupper(substr($participant->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-800">
                                                    {{ $participant->name }}
                                                </p>
                                                <p class="mt-1 text-xs text-slate-500">
                                                    {{ $participant->email }}
                                                </p>
                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ ucfirst($participant->role) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-5 text-slate-600">
                                        {{ $application->institution ?? '-' }}
                                    </td>

                                    <td class="px-6 py-5 text-slate-600">
                                        {{ $application?->position?->name ?? '-' }}
                                    </td>

                                    <td class="px-6 py-5">
                                        @if ($status === 'approved')
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Diterima
                                            </span>
                                        @elseif($status === 'rejected')
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                                Ditolak
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                Pending
                                            </span>
                                        @endif
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-5 text-right">
                                        <a href="{{ route('admin.participants.show', $participant->id) }}"
                                            class="inline-flex items-center gap-2 rounded-lg border border-[#dbe4ff] bg-[#f5f7ff] px-3 py-2 text-xs font-semibold text-[#29459b] transition hover:bg-[#e8edff]">
                                            Detail
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                    d="m9 18 6-6-6-6" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div
                                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                            <svg class="h-7 w-7" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2m10-10a4 4 0 1 0-8 0 4 4 0 0 0 8 0" />
                                            </svg>
                                        </div>
                                        <p class="mt-4 font-semibold text-slate-700">
                                            Peserta tidak ditemukan
                                        </p>
                                        <p class="mt-1 text-sm text-slate-500">
                                            Coba ubah kata kunci atau filter status.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($participants->hasPages())
                    <div class="border-t border-slate-100 px-5 py-4 sm:px-6">
                        {{ $participants->links() }}
                    </div>
                @endif

                <div class="border-t border-slate-100 bg-slate-50/70 px-5 py-3 sm:px-6">
                    <p class="text-xs text-slate-500">
                        Menampilkan {{ $participants->firstItem() ?? 0 }}
                        – {{ $participants->lastItem() ?? 0 }}
                        dari {{ $participants->total() }} peserta.
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
