<x-app-layout>

    <div class="min-h-screen bg-[#f8f9ff] py-10 lg:py-14">

        <div class="mx-auto max-w-7xl px-5 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <p class="mb-2 text-sm font-semibold text-[#29459b]">
                        ADMIN SSP
                    </p>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Pengajuan Magang
                    </h1>

                    <p class="mt-2 text-sm text-slate-500 sm:text-base">
                        Kelola dan periksa pengajuan magang yang masuk.
                    </p>
                </div>

                <div class="rounded-2xl border border-[#dce3ff] bg-white px-5 py-3 shadow-sm">
                    <p class="text-xs text-slate-400">
                        Total Pengajuan
                    </p>

                    <p class="mt-1 text-xl font-bold text-[#29459b]">
                        {{ $applications->count() }}
                    </p>
                </div>

            </div>


            {{-- SUCCESS --}}
            @if (session('success'))
                <div
                    class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            @endif


            {{-- TABLE --}}
            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1000px] text-left">

                        <thead class="border-b border-slate-200 bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    No
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Pendaftar
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Posisi
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Institusi
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Periode
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th
                                    class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse ($applications as $application)
                                <tr class="transition hover:bg-slate-50">

                                    {{-- NO --}}
                                    <td class="px-6 py-5 text-sm font-medium text-slate-500">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- PENDAFTAR --}}
                                    <td class="px-6 py-5">

                                        <div>
                                            <p class="font-semibold text-slate-800">
                                                {{ $application->user->name }}
                                            </p>

                                            <p class="mt-1 text-xs text-slate-400">
                                                {{ $application->user->email }}
                                            </p>
                                        </div>

                                    </td>


                                    {{-- POSISI --}}
                                    <td class="px-6 py-5">

                                        <p class="font-semibold text-slate-700">
                                            {{ $application->position->name }}
                                        </p>

                                        @if ($application->position->department)
                                            <p class="mt-1 text-xs text-slate-400">
                                                {{ $application->position->department }}
                                            </p>
                                        @endif

                                    </td>


                                    {{-- INSTITUSI --}}
                                    <td class="px-6 py-5 text-sm text-slate-600">
                                        {{ $application->institution }}
                                    </td>


                                    {{-- PERIODE --}}
                                    <td class="px-6 py-5 text-sm text-slate-600">

                                        <div>
                                            {{ $application->start_date?->format('d M Y') }}
                                        </div>

                                        <div class="mt-1 text-xs text-slate-400">
                                            s/d {{ $application->end_date?->format('d M Y') }}
                                        </div>

                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-6 py-5">

                                        @if ($application->status === 'pending')
                                            <span
                                                class="inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                                Pending
                                            </span>
                                        @elseif ($application->status === 'approved')
                                            <span
                                                class="inline-flex rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700">
                                                Approved
                                            </span>
                                        @elseif ($application->status === 'rejected')
                                            <span
                                                class="inline-flex rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                                                Rejected
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                                {{ ucfirst($application->status) }}
                                            </span>
                                        @endif

                                    </td>


                                    {{-- AKSI --}}
                                    <td class="px-6 py-5 text-right">

                                        <a href="{{ route('admin.applications.show', $application) }}"
                                            class="inline-flex items-center gap-2 rounded-xl bg-[#29459b] px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-[#20377d]">

                                            Lihat Detail

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="px-6 py-16 text-center">

                                        <div
                                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-slate-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a2 2 0 011.414.586l4.414 4.414A2 2 0 0119 9v10a2 2 0 01-2 2z" />
                                            </svg>

                                        </div>

                                        <h3 class="mt-4 font-semibold text-slate-800">
                                            Belum ada pengajuan
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Pengajuan magang yang masuk akan muncul di sini.
                                        </p>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
