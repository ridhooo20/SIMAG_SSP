{{-- resources/views/cta-magang.blade.php --}}

<section class="w-full bg-[#f8f9ff] px-5 py-14 lg:px-8">

    <div class="mx-auto max-w-7xl">

        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#06266f] via-[#07358d] to-[#063b9d] px-7 py-8 shadow-xl shadow-[#082d78]/15 sm:px-9 sm:py-9 lg:px-10 lg:py-10">

            {{-- Decorative glow --}}
            <div class="pointer-events-none absolute -right-20 -top-32 h-72 w-72 rounded-full bg-blue-400/10 blur-3xl">
            </div>

            <div
                class="pointer-events-none absolute -bottom-32 right-1/4 h-64 w-64 rounded-full bg-indigo-400/10 blur-3xl">
            </div>


            {{-- Content --}}
            <div class="relative max-w-2xl">

                {{-- Badge --}}
                <div
                    class="mb-4 inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-[8px] font-bold uppercase tracking-wide text-blue-100 ring-1 ring-white/10">
                    Bergabung Bersama SUMBAGSELENERGI SAKTI PEWALI
                </div>


                {{-- Heading --}}
                <h2
                    class="max-w-xl text-2xl font-extrabold leading-[1.15] tracking-[-0.02em] text-white sm:text-3xl lg:text-[26px]">

                    Siap Melangkah Menuju Standar Industri
                    <br class="hidden sm:block">
                    Nasional?

                </h2>


                {{-- Description --}}
                <p class="mt-3 max-w-xl text-[10px] leading-[1.55] text-blue-100/80 sm:text-[11px]">

                    Daftarkan dirimu hari ini, unggah kelengkapan berkas,
                    dan amankan kursi magang di unit terbaik
                    di SIMAG SSP sebelum batas kuota terpenuhi.

                </p>


                {{-- Buttons --}}
                <div class="mt-5 flex flex-col gap-2.5 sm:flex-row">

                    {{-- Primary --}}
                    <a href="{{ route('register') }}"
                        class="inline-flex h-10 items-center justify-center rounded-lg bg-[#dce7ff] px-5 text-[10px] font-bold text-[#123477] shadow-sm transition duration-200 hover:bg-white">

                        Eksplorasi Pengalaman

                        <svg class="ml-2 h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-6-6 6 6-6 6" />

                        </svg>

                    </a>


                    {{-- Secondary --}}
                    <a href="https://wa.me/6282282816854"
                        class="inline-flex h-10 items-center justify-center rounded-lg bg-white/15 px-5 text-[10px] font-semibold text-white ring-1 ring-white/10 transition duration-200 hover:bg-white/20">

                        Hubungi Kami

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>
