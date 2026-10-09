<nav class="sticky top-0 z-50 border-b border-slate-100 bg-white/95 backdrop-blur">

    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-5 lg:px-8">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-3">

            <div class="flex h-8 w-12 items-center justify-center rounded-md">
                <img src="{{ asset('/logo/logossp.jpeg') }}" alt="SSP" class="h-full w-auto" />
            </div>

            <div class="leading-tight">

                <div class="text-[15px] font-bold tracking-tight text-[#0f2f8f]">
                    SIMAG SSP
                </div>

                <div class="text-[8px] font-medium uppercase tracking-wide text-slate-600">
                    Sistem Informasi Magang SSP
                </div>

            </div>

        </a>


        {{-- ================= DESKTOP NAVIGATION ================= --}}
        <div class="hidden items-center gap-1 lg:flex">

            {{-- Beranda --}}
            <a href="#beranda" data-nav="beranda"
                class="nav-link rounded-lg bg-[#29459b] px-4 py-2 text-sm font-medium text-white shadow-sm">
                Beranda
            </a>


            {{-- Posisi Magang --}}
            <a href="#program" data-nav="program"
                class="nav-link rounded-lg px-4 py-2 text-sm font-medium text-slate-700 transition duration-200 hover:bg-slate-100">
                Posisi Magang
            </a>


            {{-- Alur Seleksi --}}
            <a href="#syarat" data-nav="syarat"
                class="nav-link rounded-lg px-4 py-2 text-sm font-medium text-slate-700 transition duration-200 hover:bg-slate-100">
                Alur Seleksi
            </a>

            <a href="#gallery" data-mobile-nav="gallery"
                class="mobile-nav-link block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                Gallery
            </a>

            <a href="#faq" data-mobile-nav="gallery"
                class="mobile-nav-link block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                FAQ
            </a>

            {{-- Pendaftaran --}}
            <a href="{{ route('register') }}" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-700">
                Pendaftaran
            </a>


            {{-- Cek Status --}}
            <a href="#tracking" data-nav="program" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-700">
                Cek Status
            </a>

            <a href="https://sspewali.com" class="rounded-lg px-4 py-2 text-sm font-medium text-slate-700">
                SSP
            </a>


            {{-- Portal Peran --}}
            <details class="relative ml-1">

                <summary
                    class="flex cursor-pointer list-none items-center gap-2 rounded-lg bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">

                    Portal Peran

                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />

                    </svg>

                </summary>


                <div
                    class="absolute right-0 mt-2 w-44 overflow-hidden rounded-xl border border-slate-200 bg-white p-1 shadow-xl">

                    @auth

                        <a href="{{ route('dashboard') }}"
                            class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
                            Dashboard
                        </a>


                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="w-full rounded-lg px-3 py-2 text-left text-sm text-red-600 hover:bg-red-50">
                                Logout
                            </button>

                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
                            Login
                        </a>


                        <a href="{{ route('register') }}"
                            class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
                            Register
                        </a>

                    @endauth

                </div>

            </details>

        </div>


        {{-- ================= MOBILE MENU BUTTON ================= --}}
        <button id="mobile-menu-button" type="button" aria-label="Buka menu" aria-expanded="false"
            class="flex h-10 w-10 items-center justify-center rounded-lg text-slate-700 transition hover:bg-slate-100 lg:hidden">

            <svg id="menu-open-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

            </svg>


            <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M6 18L18 6" />

            </svg>

        </button>

    </div>


    {{-- ================= MOBILE MENU ================= --}}
    <div id="mobile-menu" class="hidden border-t border-slate-100 bg-white lg:hidden">

        <div class="mx-auto max-w-7xl space-y-1 px-5 py-3">


            {{-- Beranda --}}
            <a href="#beranda" data-mobile-nav="beranda"
                class="mobile-nav-link block rounded-lg bg-[#29459b] px-4 py-3 text-sm font-medium text-white">
                Beranda
            </a>


            {{-- Posisi Magang --}}
            <a href="#program" data-mobile-nav="program"
                class="mobile-nav-link block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                Posisi Magang
            </a>


            {{-- Alur Seleksi --}}
            <a href="#syarat" data-mobile-nav="syarat"
                class="mobile-nav-link block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                Alur Seleksi
            </a>

            <a href="#gallery" data-mobile-nav="syarat"
                class="mobile-nav-link block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                Gallery
            </a>

            <a href="#faq" data-mobile-nav="gallery"
                class="mobile-nav-link block rounded-lg px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                FAQ
            </a>

            {{-- Pendaftaran --}}
            <a href="{{ route('register') }}" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700">
                Pendaftaran
            </a>


            {{-- Cek Status --}}
            <a href="#tracking" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700">
                Cek Status
            </a>

            <a href="https://sspewali.com" class="block rounded-lg px-4 py-3 text-sm font-medium text-slate-700">
                SSP
            </a>


            {{-- Portal Peran --}}
            <div class="border-t border-slate-100 pt-2">

                <p class="px-4 py-2 text-[10px] font-bold uppercase tracking-wide text-slate-400">
                    Portal Peran
                </p>


                @auth

                    <a href="{{ route('dashboard') }}"
                        class="block rounded-lg px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                        Dashboard
                    </a>


                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                            class="w-full rounded-lg px-4 py-3 text-left text-sm text-red-600 hover:bg-red-50">
                            Logout
                        </button>

                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="block rounded-lg px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                        Login
                    </a>


                    <a href="{{ route('register') }}"
                        class="block rounded-lg px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                        Register
                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav>


{{-- ================= NAVIGATION SCRIPT ================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        /*
        |--------------------------------------------------------------------------
        | Desktop Active Navigation
        |--------------------------------------------------------------------------
        */

        const navLinks = document.querySelectorAll('.nav-link');

        const sections = [
            document.getElementById('beranda'),
            document.getElementById('program'),
            document.getElementById('syarat'),
        ].filter(Boolean);


        function setActive(id) {

            navLinks.forEach(link => {

                const isActive = link.dataset.nav === id;

                if (isActive) {

                    link.classList.add(
                        'bg-[#29459b]',
                        'text-white',
                        'shadow-sm'
                    );

                    link.classList.remove(
                        'text-slate-700',
                        'hover:bg-slate-100'
                    );

                } else {

                    link.classList.remove(
                        'bg-[#29459b]',
                        'text-white',
                        'shadow-sm'
                    );

                    link.classList.add(
                        'text-slate-700'
                    );

                }

            });


            /*
            |--------------------------------------------------------------------------
            | Mobile Active Navigation
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll('.mobile-nav-link').forEach(link => {

                const isActive = link.dataset.mobileNav === id;

                if (isActive) {

                    link.classList.add(
                        'bg-[#29459b]',
                        'text-white'
                    );

                    link.classList.remove(
                        'text-slate-700',
                        'hover:bg-slate-100'
                    );

                } else {

                    link.classList.remove(
                        'bg-[#29459b]',
                        'text-white'
                    );

                    link.classList.add(
                        'text-slate-700'
                    );

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Detect Section Saat Scroll
        |--------------------------------------------------------------------------
        */

        const observer = new IntersectionObserver((entries) => {

            const visibleSections = entries
                .filter(entry => entry.isIntersecting)
                .sort(
                    (a, b) =>
                    b.intersectionRatio - a.intersectionRatio
                );


            if (visibleSections.length > 0) {

                setActive(
                    visibleSections[0].target.id
                );

            }

        }, {
            root: null,
            rootMargin: '-20% 0px -60% 0px',
            threshold: [0, 0.2, 0.4, 0.6, 0.8]
        });


        sections.forEach(section => {
            observer.observe(section);
        });


        /*
        |--------------------------------------------------------------------------
        | Mobile Hamburger
        |--------------------------------------------------------------------------
        */

        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');


        function closeMobileMenu() {

            mobileMenu.classList.add('hidden');

            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');

            menuButton.setAttribute('aria-expanded', 'false');

        }


        function openMobileMenu() {

            mobileMenu.classList.remove('hidden');

            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');

            menuButton.setAttribute('aria-expanded', 'true');

        }


        menuButton.addEventListener('click', function() {

            const isOpen = !mobileMenu.classList.contains('hidden');


            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }

        });


        /*
        |--------------------------------------------------------------------------
        | Tutup menu setelah klik menu mobile
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('#mobile-menu a').forEach(link => {

            link.addEventListener('click', function() {
                closeMobileMenu();
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Default
        |--------------------------------------------------------------------------
        */

        setActive('beranda');

    });
</script>
