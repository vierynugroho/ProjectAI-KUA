<nav class="navbar navbar-expand-sm">
    <div class="container">
        <a class="navbar-brand"
           href="#">LOGO</a>
        <button class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-lg-flex my-2 my-lg-0">
            <ul class="navbar-nav me-auto collapse navbar-collapse"
                id="collapsibleNavId">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}""
                       href="
                       /"
                       aria-current="page">Beranda <span class="visually-hidden">(current)</span></a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('data*') ? 'active' : '' }}""
                    href="
                       /data">Data</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('akurasi-data') ? 'active' : '' }}""
                    href="
                       /akurasi-data">Akurasi Data</a>
                </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentang-kami') ? 'active' : '' }}""
                       href="
                       /tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('hubungi-kami') ? 'active' : '' }}""
                       href="
                       /hubungi-kami">Hubungi Kami</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="/login"
                       class="btn">Login</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                    <a href="{{ route('actionlogout') }}"
                       class="btn">Logout</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
    </div>
</nav>