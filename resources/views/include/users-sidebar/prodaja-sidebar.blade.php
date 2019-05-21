<!-- Sidebar Holder -->
<nav id="sidebar">
    <div class="sidebar-header">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/storage/img/catering_logo.png" style="max-height: 100px; display: block; margin: auto;">
        </a>
    </div>

    <ul class="list-unstyled components">
        <p>Korisnik: <b>{{ Auth::user()->name }}</b></p>
        <li class="active">
            <a href="#klijentiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Klijenti</a>
            <ul class="collapse list-unstyled" id="klijentiSubmenu">
                <li>
                    <a href="#">Dodaj novog klijenta</a>
                </li>
                <li>
                    <a href="#">Pregled svih klijenata</a>
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
        @include('include.footer')

    </ul>
</nav>
