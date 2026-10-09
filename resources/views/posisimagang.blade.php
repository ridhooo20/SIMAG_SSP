{{-- resources/views/posisimagang.blade.php --}}

<section id="program" class="w-full bg-[#f8f9ff] py-16 lg:py-20">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-10 text-center">

            <span
                class="inline-flex items-center rounded-full bg-[#e8edff] px-4 py-1.5 text-xs font-bold text-[#29459b]">
                POSISI MAGANG
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Temukan Posisi Magangmu
            </h2>

            <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                Pilih posisi magang yang sesuai dengan minat dan bidang yang ingin
                kamu kembangkan bersama SSP.
            </p>

        </div>


        {{-- CARDS --}}
        @if ($positions->count())

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($positions as $position)
                    <div
                        class="group flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                        {{-- ICON --}}
                        {{-- <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#e8edff] text-[#29459b]">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2ZM8 7h8" />

                            </svg>

                        </div> --}}


                        {{-- CONTENT --}}
                        <div class="flex flex-1 flex-col">

                            {{-- Department --}}
                            @if ($position->department)
                                <span class="mb-2 text-[11px] font-bold uppercase tracking-wide text-[#29459b]">
                                    {{ $position->department }}
                                </span>
                            @endif


                            {{-- Position Name --}}
                            <h3
                                class="text-lg font-extrabold leading-tight text-slate-900 transition group-hover:text-[#29459b]">
                                {{ $position->name }}
                            </h3>


                            {{-- Description --}}
                            @if ($position->description)
                                <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-500">
                                    {{ $position->description }}
                                </p>
                            @else
                                <p class="mt-3 text-sm leading-6 text-slate-400">
                                    Informasi mengenai posisi magang akan tersedia
                                    setelah posisi dibuka.
                                </p>
                            @endif


                            {{-- Bottom --}}
                            <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">

                                {{-- Quota --}}
                                <div class="flex items-center gap-2">

                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100">

                                        <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm11 10v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />

                                        </svg>

                                    </div>

                                    <div>
                                        <p class="text-[10px] text-slate-400">
                                            Kuota
                                        </p>

                                        <p class="text-xs font-bold text-slate-700">
                                            {{ $position->quota }} orang
                                        </p>
                                    </div>

                                </div>


                                {{-- Status --}}
                                <span
                                    class="rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-bold text-emerald-700">
                                    Tersedia
                                </span>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @else
            {{-- EMPTY STATE --}}
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center">

                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">

                    <svg class="h-7 w-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M20 7h-4V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Z" />

                    </svg>

                </div>

                <h3 class="mt-4 text-base font-bold text-slate-800">
                    Belum Ada Posisi Magang
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm text-slate-500">
                    Saat ini belum ada posisi magang yang tersedia.
                    Silakan cek kembali secara berkala.
                </p>

            </div>

        @endif

    </div>

</section>
