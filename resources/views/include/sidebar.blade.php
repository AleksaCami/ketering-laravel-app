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
                        <a href="#">Pregled stanja inventara</a>
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
                        <a href="#">Pregled svih pristiglih narudžbina</a>
                    </li>
                    <li>
                        <a href="#">Pregled svhih prihvacenih narudžbina</a>
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
                <a href="#">Pregled narudžbenica spreminh za dostavu</a>
            </li>
            <li>
                <a href="#">Pregled narudžbina koji nisu vrećene</a>
            </li>
            @break


            @case('prodaja')
            {{--  PRODAJA SIDEBAR --}}
            <li class="active">
                <a href="#klijentiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Klijenti</a>
                <ul class="collapse list-unstyled" id="klijentiSubmenu">
                    <li>
                        <a href="/klijenti/create">Dodaj novog klijenta</a>
                    </li>
                    <li>
                        <a href="/klijenti">Pregled svih klijenata</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#eventiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventi</a>
                <ul class="collapse list-unstyled" id="eventiSubmenu">
                    <li>
                        <a href="#">Dodaj novi event</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih eveneta</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#kuhinjaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Kuhinja</a>
                <ul class="collapse list-unstyled" id="kuhinjaSubmenu">
                    <li>
                        <a href="#">Dodaj novu kuhinju</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih kuhinja</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#prozivodiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proizvodi</a>
                <ul class="collapse list-unstyled" id="prozivodiSubmenu">
                    <li>
                        <a href="#">Dodaj novi proizvod</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih prodizvoda</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#inventarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Inventar</a>
                <ul class="collapse list-unstyled" id="inventarSubmenu">
                    <li>
                        <a href="#">Pregled stanja inventara</a>
                    </li>
                    <li>
                        <a href="#">Pregled izgubljenog inventara</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#narudzbineKlijentaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Narudžbine klijenata</a>
                <ul class="collapse list-unstyled" id="narudzbineKlijentaSubmenu">
                    <li>
                        <a href="#">Dodaj novu narudžbinu</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih narudžbina</a>
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
                        <a href="/prikaz-korisnika" id="pregledSvihKorisnika">Pregled korisnika</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#klijentiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Klijenti</a>
                <ul class="collapse list-unstyled" id="klijentiSubmenu">
                    <li>
                        <a href="/klijenti/create">Dodaj novog klijenta</a>
                    </li>
                    <li>
                        <a href="/klijenti">Pregled svih klijenata</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#eventiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventi</a>
                <ul class="collapse list-unstyled" id="eventiSubmenu">
                    <li>
                        <a href="#">Dodaj novi event</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih eveneta</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#kuhinjaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Kuhinja</a>
                <ul class="collapse list-unstyled" id="kuhinjaSubmenu">
                    <li>
                        <a href="#">Dodaj novu kuhinju</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih kuhinja</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#prozivodiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Proizvodi</a>
                <ul class="collapse list-unstyled" id="prozivodiSubmenu">
                    <li>
                        <a href="#">Dodaj novi proizvod</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih prodizvoda</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#inventarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Inventar</a>
                <ul class="collapse list-unstyled" id="inventarSubmenu">
                    <li>
                        <a href="#">Pregled stanja inventara</a>
                    </li>
                    <li>
                        <a href="#">Pregled izgubljenog inventara</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#narudzbineKlijentaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Narudžbine klijenata</a>
                <ul class="collapse list-unstyled" id="narudzbineKlijentaSubmenu">
                    <li>
                        <a href="#">Dodaj novu narudžbinu</a>
                    </li>
                    <li>
                        <a href="#">Pregled svih narudžbina</a>
                    </li>
                </ul>
            </li>
            @break
        @endswitch


        {{-- Zajdenicko za sve korisnike --}}
        @include('include.footer')
    </ul>
</nav>
