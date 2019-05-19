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
            <a href="#">Pregled narudžbenica spreminh za dostavu</a>
        </li>
        <li>
            <a href="#">Pregled narudžbina koji nisu vrećene</a>
        </li>

    </ul>
</nav>
