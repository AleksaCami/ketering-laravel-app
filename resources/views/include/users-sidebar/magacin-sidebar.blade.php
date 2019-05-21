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
    </ul>
</nav>
