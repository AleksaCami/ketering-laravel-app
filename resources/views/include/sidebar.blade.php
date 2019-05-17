<!-- Sidebar Holder -->
<nav id="sidebar">
    <div class="sidebar-header">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/storage/img/catering_logo.png" style="max-height: 100px; display: block; margin: auto;">
        </a>
    </div>

    <ul class="list-unstyled components">
        <p>Korisnik: <b>{{ Auth::user()->name }}</b></p>
        <hr>
        <li>
            <a href="/">Dashboard</a>
        </li>
        <li>
            <a href="/prodaja">Prodaja</a>
{{--            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>--}}
        </li>
        <li>
            <a href="/kuhinja">Kuhinja</a>
        </li>
        <li>
            <a href="/magacin">Magacin</a>
        </li>
        <li>
            <a href="/vozac">Vozac</a>
        </li>
        <li>
            <a href="/office">Office</a>
        </li>
        <hr>
{{--        <li>--}}
{{--            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>--}}
{{--            <ul class="collapse list-unstyled" id="homeSubmenu">--}}
{{--                <li>--}}
{{--                    <a href="#">Home 1</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Home 2</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Home 3</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li>
            <a href="/kontakt">Kontakt</a>
        </li>
    </ul>
</nav>
