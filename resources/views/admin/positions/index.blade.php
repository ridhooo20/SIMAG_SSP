<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Posisi Magang
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola posisi magang yang tersedia di SSP.
                </p>
            </div>

            <a href="{{ route('admin.positions.create') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-[#29459b] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#20377d]">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14" />

                </svg>

                Tambah Posisi

            </a>

        </div>
    </x-slot>


    <div class="py-10">

        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

            {{-- Success --}}
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

                    {{ session('success') }}

                </div>
            @endif


            {{-- Error --}}
            @if ($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

                    <ul class="list-inside list-disc">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Table --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-50">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Posisi
                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Departemen
                                </th>

                                <th
                                    class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Kuota
                                </th>

                                <th
                                    class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse ($positions as $position)
                                <tr class="transition hover:bg-slate-50">

                                    {{-- Position --}}
                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-slate-800">
                                            {{ $position->name }}
                                        </div>

                                        @if ($position->description)
                                            <div class="mt-1 max-w-md truncate text-xs text-slate-500">
                                                {{ $position->description }}
                                            </div>
                                        @endif

                                    </td>


                                    {{-- Department --}}
                                    <td class="px-6 py-4 text-sm text-slate-600">

                                        {{ $position->department }}

                                    </td>


                                    {{-- Quota --}}
                                    <td class="px-6 py-4 text-center text-sm font-semibold text-slate-700">

                                        {{ $position->quota }}

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-6 py-4 text-center">

                                        @if ($position->is_active)
                                            <span
                                                class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                                Tidak Aktif
                                            </span>
                                        @endif

                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-end gap-2">

                                            {{-- Detail --}}
                                            <a href="{{ route('admin.positions.show', $position) }}"
                                                class="rounded-lg px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-100">

                                                Detail

                                            </a>


                                            {{-- Edit --}}
                                            <a href="{{ route('admin.positions.edit', $position) }}"
                                                class="rounded-lg bg-[#e8edff] px-3 py-2 text-xs font-semibold text-[#29459b] transition hover:bg-[#dce4ff]">

                                                Edit

                                            </a>


                                            {{-- Delete --}}
                                            <form action="{{ route('admin.positions.destroy', $position) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus posisi ini?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                                    Hapus

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-12 text-center">

                                        <div class="text-sm font-semibold text-slate-700">
                                            Belum ada posisi magang.
                                        </div>

                                        <p class="mt-1 text-xs text-slate-500">
                                            Silakan tambahkan posisi magang pertama.
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
