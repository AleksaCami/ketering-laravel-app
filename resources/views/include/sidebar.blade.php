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
            <li class="active">
                <a href="#inventarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Narudžbine</a>
                <ul class="collapse list-unstyled" id="inventarSubmenu">
                    <li>
                        <a href="/inventory">Pregled stanja inventara</a>
                    </li>
                    <li>
                        <a href="#">Povrat inventara</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Pregled kompletiranih narudžbina</a>
            </li>
            @break


            @case('kuhinja')
            {{--  KUHINJA SIDEBAR --}}
            <li class="active">
                <a href="#narudzbineSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Narudžbine</a>
                <ul class="collapse list-unstyled" id="narudzbineSubmenu">
                    <li>
                        <a href="/orders/kuhinja">Pregled svih pristiglih narudžbina</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih prihvacenih narudžbina</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Dodavanje inventara u narudžbinu</a>
            </li>
            @break


            @case('vozac')
            {{--  VOZAC SIDEBAR --}}
            <li class="active">
                <a href="#">Pregled narudžbenica spreminih za dostavu</a>
            </li>
            <li>
                <a href="#">Pregled narudžbina koje nisu vrećene</a>
            </li>
            @break


            @case('prodaja')
            {{--  PRODAJA SIDEBAR --}}
            <li class="active">
                <a href="#klijentiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Klijenti</a>
                <ul class="collapse list-unstyled" id="klijentiSubmenu">
                    <li>
                        <a href="/klijenti/create">Dodaj klijenta</a>
                    </li>
                    <li>
                        <a href="/klijenti">Pregled klijenata</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#eventiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventi</a>
                <ul class="collapse list-unstyled" id="eventiSubmenu">
                    <li>
                        <a href="/eventi/create">Dodaj event</a>
                    </li>
                    <li>
                        <a href="/eventi">Pregled evenata</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#kuhinjaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Kuhinja</a>
                <ul class="collapse list-unstyled" id="kuhinjaSubmenu">
                    <li>
                        <a href="/kuhinje/create">Dodaj kuhinju</a>
                    </li>
                    <li>
                        <a href="/kuhinje">Pregled kuhinja</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#prozivodiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proizvodi</a>
                <ul class="collapse list-unstyled" id="prozivodiSubmenu">
                    <li>
                        <a href="/products/create">Dodaj proizvod</a>
                    </li>
                    <li>
                        <a href="/products">Pregled prodizvoda</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#inventarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Inventar</a>
                <ul class="collapse list-unstyled" id="inventarSubmenu">
                    <li>
                        <a href="/inventory/create">Dodaj inventar</a>
                    </li>
                    <li>
                        <a href="/inventory">Pregled stanja inventara</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#narudzbineKlijentaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Narudžbine klijenata</a>
                <ul class="collapse list-unstyled" id="narudzbineKlijentaSubmenu">
                    <li>
                        <a href="/orders/create">Dodaj narudžbinu</a>
                    </li>
                    <li>
                        <a href="/orders">Pregled narudžbina</a>
                    </li>
                </ul>
            </li>
            @break


            @case('admin')
            {{--  ADMIN SIDEBAR --}}
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Korisnici</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="{{route('register')}}">Dodaj korisnika</a>
                    </li>
                    <li>
                        <a href="/korisnici" id="pregledSvihKorisnika">Pregled korisnika</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#klijentiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Klijenti</a>
                <ul class="collapse list-unstyled" id="klijentiSubmenu">
                    <li>
                        <a href="/klijenti/create">Dodaj klijenta</a>
                    </li>
                    <li>
                        <a href="/klijenti">Pregled klijenata</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#eventiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventi</a>
                <ul class="collapse list-unstyled" id="eventiSubmenu">
                    <li>
                        <a href="/eventi/create">Dodaj event</a>
                    </li>
                    <li>
                        <a href="/eventi">Pregled evenata</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#magaciniSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Magacini</a>
                <ul class="collapse list-unstyled" id="magaciniSubmenu">
                    <li>
                        <a href="/magacini/create">Dodaj magacin</a>
                    </li>
                    <li>
                        <a href="/magacini">Pregled magacina</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#kuhinjaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Kuhinja</a>
                <ul class="collapse list-unstyled" id="kuhinjaSubmenu">
                    <li>
                        <a href="/kuhinje/create">Dodaj kuhinju</a>
                    </li>
                    <li>
                        <a href="/kuhinje">Pregled kuhinja</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#prozivodiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proizvodi</a>
                <ul class="collapse list-unstyled" id="prozivodiSubmenu">
                    <li>
                        <a href="/products/create">Dodaj proizvod</a>
                    </li>
                    <li>
                        <a href="/products">Pregled prodizvoda</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#inventarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Inventar</a>
                <ul class="collapse list-unstyled" id="inventarSubmenu">
                    <li>
                        <a href="/inventory/create">Dodaj inventar</a>
                    </li>
                    <li>
                        <a href="/inventory">Pregled stanja inventara</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#narudzbineKlijentaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Narudžbine klijenata</a>
                <ul class="collapse list-unstyled" id="narudzbineKlijentaSubmenu">
                    <li>
                        <a href="/orders/create">Dodaj narudžbinu</a>
                    </li>
                    <li>
                        <a href="/orders">Pregled narudžbina</a>
                    </li>
                </ul>
            </li>
            @break
        @endswitch


        {{-- Zajdenicko za sve korisnike --}}
        @include('include.footer')
    </ul>
</nav>
