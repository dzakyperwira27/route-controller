<nav class="navbar">
    <div class="logo">RA</div>
    <ul class="nav-links">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#articles">Artikel</a></li>
        <li><a href="#about">Tentang Perusahaan</a></li>
        <li>
            <a href="{{ route('blogs.create') }}"
                class="nav-link {{ request()->routeIs('blogs.create') ? 'active' : '' }}">
                ➕ Add Article
            </a>
        </li>
    </ul>
    <button class="theme-toggle" id="theme-toggle">🌙</button>
</nav>
