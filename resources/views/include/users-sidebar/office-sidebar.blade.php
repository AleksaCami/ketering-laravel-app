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
            <a href="#">Pregled svih narudžbina</a>
        </li>
    </ul>
    @include('include.footer')
</nav>
