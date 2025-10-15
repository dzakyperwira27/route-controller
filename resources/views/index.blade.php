<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Artikel | Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <!-- 🔹 NAVBAR -->
    <nav class="navbar">
        <div class="logo">RA</div>
        <ul class="nav-links">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#articles">Artikel</a></li>
            <li><a href="#about">Tentang Perusahaan</a></li>
            <li><a href="{{ route('blogs.create') }}" 
                    class="nav-link {{ request()->routeIs('blogs.create') ? 'active' : '' }}">
                            ➕ Add Article
                        </a>
                    </li>
        </ul>
        <button class="theme-toggle" id="theme-toggle">🌙</button>
    </nav>

    <!-- 🔹 MAIN CONTENT -->
    <main>
        <!-- 🏠 HOME SECTION -->
        <section id="home" class="home-section">
            <div class="intro">
                <h1>Selamat Datang di <span class="highlight">Rumah Artikel</span></h1>
                <p>Kami menyajikan artikel berkualitas untuk menambah wawasan dan pengetahuan pembaca.</p>
                <button onclick="scrollToArticles()">Lihat Artikel Terbaru</button>
            </div>
        </section>

        <!-- 📰 ARTICLES SECTION -->
        <section id="articles" class="articles-section">
            <h2>Artikel Terbaru</h2>


            <!-- 📚 Daftar Artikel -->
            <div id="articles-container" class="articles-container">
    @foreach ($blogs as $blog)
        <div class="article-card">
            <img 
                src="{{ isset($blog['gambar']) ? asset($blog['gambar']) : asset($blog->gambar ?? 'images/default.jpg') }}" 
                alt="{{ $blog['judul'] ?? $blog->judul }}"
            >
            <h3>{{ $blog['judul'] ?? $blog->judul }}</h3>
            <p>{{ Str::limit($blog['isi'] ?? $blog->isi ?? '', 150) }}...</p>
            <p><strong>Author:</strong> {{ $blog['author'] ?? 'Admin' }}</p>
            <p><strong>Kategori:</strong> {{ $blog['kategori'] ?? '-' }}</p>
            
        </div>
    @endforeach
</div>

            <!-- 🔢 Pagination -->
            <div class="pagination"></div>
        </section>
    </main>

    <!-- 🔹 MODAL DETAIL ARTIKEL -->
    <div id="article-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal" class="close-btn">&times;</span>
            <img id="modal-img" src="" alt="Gambar Artikel">
            <h3 id="modal-title"></h3>
            <p id="modal-meta"></p>
            <p id="modal-body"></p>
        </div>
    </div>

    <!-- 🧑‍💻 ABOUT SECTION -->
    <section id="about" class="about-section" style="text-align: center;">
        <h1>Tentang Perusahaan</h1>
        <p>
            Rumah Artikel adalah platform penyedia informasi dan artikel berkualitas dari berbagai topik.
            Kami berfokus pada konten yang edukatif dan bermanfaat untuk masyarakat luas.
        </p>
    </section>

    <!-- 🔹 FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-main">
                <!-- Brand -->
                <div class="footer-brand">
                    <h2 class="footer-logo">Rumah Artikel</h2>
                    <p class="footer-desc">Berbagi wawasan dan inspirasi setiap hari ✨</p>

                    <div class="social-links">
                        <a href="https://instagram.com/perwira.yasig" target="_blank" class="social-icon"
                            aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z" />
                            </svg>
                        </a>
                        <a href="mailto:sebas@example.com" class="social-icon" aria-label="Email">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z" />
                            </svg>
                        </a>
                        <a href="#" class="social-icon" aria-label="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Menu Navigasi -->
                <div class="footer-menus">
                    <div class="footer-menu">
                        <h3 class="menu-title">Navigasi</h3>
                        <ul class="menu-links">
                            <li><a href="#home" class="menu-link">Beranda</a></li>
                            <li><a href="#articles" class="menu-link">Artikel</a></li>
                            <li><a href="#about" class="menu-link">Tentang</a></li>
                            <li><a href="#contact" class="menu-link">Kontak</a></li>
                        </ul>
                    </div>

                    <div class="footer-menu">
                        <h3 class="menu-title">Kategori</h3>
                        <ul class="menu-links">
                            <li><a href="#tech" class="menu-link">Teknologi</a></li>
                            <li><a href="#design" class="menu-link">Desain</a></li>
                            <li><a href="#business" class="menu-link">Bisnis</a></li>
                            <li><a href="#lifestyle" class="menu-link">Gaya Hidup</a></li>
                        </ul>
                    </div>

                    <div class="footer-menu">
                        <h3 class="menu-title">Legal</h3>
                        <ul class="menu-links">
                            <li><a href="#privacy" class="menu-link">Privacy Policy</a></li>
                            <li><a href="#terms" class="menu-link">Terms of Service</a></li>
                            <li><a href="#cookies" class="menu-link">Cookie Policy</a></li>
                            <li><a href="#disclaimer" class="menu-link">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer-bottom">
                <p class="footer-copy">© 2025 Rumah Artikel — All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- 🔹 SCRIPT -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function scrollToArticles() {
            document.getElementById('articles').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>

</html>