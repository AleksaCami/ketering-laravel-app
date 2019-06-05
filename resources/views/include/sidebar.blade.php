{{-- Sidebar --}}
<nav id="sidebar">
    <div class="sidebar-header">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/storage/img/catering_logo.png" style="max-height: 100px; display: block; margin: auto;">
        </a>
    </div>
    <ul class="list-unstyled components">
        <p>Korisnik: <b>{{ Auth::user()->name }}</b></p>
        @switch(Auth::user()->tip_korisnika)

            @case('magacin')
            {{--  MAGACIN SIDEBAR --}}

            <li>
                <a href="/magacin"><i class="fas fa-home mr-2"></i>Dashboard</a>
            </li>
            <li>
                <a href="/inventory"><i class="fas fa-warehouse mr-2"></i>Stanje inventara</a>
            </li>
{{--            <li>--}}
{{--                <a href="#">Povrat inventara</a>--}}
{{--            </li>--}}
            <li>
                <a href="/orders/magacin"><i class="fas fa-clipboard-check mr-2"></i>Kompletirane narudžbine</a>
            </li>
            @break


            @case('kuhinja')
            {{--  KUHINJA SIDEBAR --}}
                <li>
                    <a href="/kuhinja"><i class="fas fa-home mr-2"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/orders/kuhinja"><i class="fas fa-clipboard-list mr-2"></i>Pristigle narudžbine</a>
                </li>
                <li>
                    <a href="/orders/kuhinja/prihvacene"><i class="fas fa-list mr-2"></i>Aktivne narudžbine</a>
                </li>
            @break


            @case('vozac')
            {{--  VOZAC SIDEBAR --}}
            <li>
                <a href="/vozac"><i class="fas fa-home mr-2"></i>Dashboard</a>
            </li>
            <li>
                <a href="/orders/vozac"><i class="fas fa-truck-loading mr-2"></i>Spremno za dostavu</a>
            </li>
{{--            <li>--}}
{{--                <a href="#">Narudžbine koje nisu vraćene</a>--}}
{{--            </li>--}}
            @break


            @case('prodaja')
            {{--  PRODAJA SIDEBAR --}}
            <li class="active">
            <li>
                <a href="/klijenti"><i class="fas fa-user-tie mr-2"></i>Klijenti</a>
            </li>
            <li>
                <a href="/eventi"><i class="fas fa-calendar mr-2"></i>Eventi</a>
            </li>
            <li>
                <a href="/kuhinje"><i class="fas fa-utensils mr-2"></i>Kuhinje</a>
            </li>
            <li>
                <a href="/products"><i class="fas fa-shopping-cart mr-2"></i>Proizvodi</a>
            </li>
            <li>
                <a href="/inventory"><i class="fas fa-warehouse mr-2"></i>Stanje inventara</a>
            </li>
            <li>
                <a href="/orders"><i class="fas fa-clipboard-list mr-2"></i>Porudzbenice</a>
            </li>
            </li>
            @break

            @case('admin')
            {{--  ADMIN SIDEBAR --}}
            <li>
                <a href="/admin"><i class="fas fa-home mr-2"></i>Dashboard</a>
            </li>
            <li>
{{--                    <li>--}}
{{--                        <a href="{{route('register')}}">Dodaj korisnika</a>--}}
{{--                    </li>--}}
                <a href="/korisnici" id="pregledSvihKorisnika"><i class="fas fa-users mr-2"></i>Korisnici</a>
            </li>
            <li>
                <a href="/klijenti"><i class="fas fa-user-tie mr-2"></i>Klijenti</a>
            </li>
            <li>
                <a href="/eventi"><i class="fas fa-calendar mr-2"></i>Eventi</a>
            </li>
            <li>
                <a href="/kuhinje"><i class="fas fa-utensils mr-2"></i>Kuhinje</a>
            </li>
            <li>
                <a href="/products"><i class="fas fa-shopping-cart mr-2"></i>Proizvodi</a>
            </li>
            <li>
                <a href="/inventory"><i class="fas fa-warehouse mr-2"></i>Stanje inventara</a>
            </li>
            <li>
                <a href="/orders"><i class="fas fa-clipboard-list mr-2"></i>Porudzbenice</a>
            </li>
            @break
        @endswitch


        {{-- Zajdenicko za sve korisnike --}}
        @include('include.footer')
    </ul>
</nav>
