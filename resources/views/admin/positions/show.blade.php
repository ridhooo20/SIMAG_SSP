<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Detail Posisi Magang
            </h2>
        </div>

    </x-slot>


    <div class="py-10">

        <div class="mx-auto max-w-3xl px-5 sm:px-6 lg:px-8">

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                {{-- Header --}}
                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h1 class="text-2xl font-bold text-slate-800">
                            {{ $position->name }}
                        </h1>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ $position->department }}
                        </p>

                    </div>


                    @if ($position->is_active)
                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                            Aktif
                        </span>
                    @else
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                            Nonaktif
                        </span>
                    @endif

                </div>


                {{-- Information --}}
                <div class="mt-8 grid gap-5 sm:grid-cols-2">

                    <div class="rounded-xl bg-slate-50 p-4">

                        <p class="text-xs font-medium text-slate-500">
                            Departemen
                        </p>

                        <p class="mt-1 font-semibold text-slate-800">
                            {{ $position->department }}
                        </p>

                    </div>


                    <div class="rounded-xl bg-slate-50 p-4">

                        <p class="text-xs font-medium text-slate-500">
                            Kuota
                        </p>

                        <p class="mt-1 font-semibold text-slate-800">
                            {{ $position->quota }} orang
                        </p>

                    </div>

                </div>


                {{-- Description --}}
                <div class="mt-6">

                    <h3 class="text-sm font-semibold text-slate-800">
                        Deskripsi
                    </h3>

                    <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600">
                        {{ $position->description ?: 'Belum ada deskripsi.' }}
                    </p>

                </div>


                {{-- Buttons --}}
                <div class="mt-8 flex items-center justify-end gap-3">

                    <a href="{{ route('admin.positions.index') }}"
                        class="rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">

                        Kembali

                    </a>

                    <a href="{{ route('admin.positions.edit', $position) }}"
                        class="rounded-xl bg-[#29459b] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#20377d]">

                        Edit Posisi

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
