<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rumah Artikel') | Portfolio</title> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>

<body>
    <nav class="navbar">
        <div class="logo">RA</div>
        <button class="theme-toggle" id="theme-toggle">🌙</button>
    </nav>

    <main>
        @yield('content')
    </main>

    <div id="article-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal" class="close-btn">&times;</span>
            <img id="modal-img" src="" alt="Gambar Artikel">
            <h3 id="modal-title"></h3>
            <p id="modal-meta"></p>
            <p id="modal-body"></p>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-main">
                <div class="footer-brand">
                    <h2 class="footer-logo">Rumah Artikel</h2>
                    <p class="footer-desc">Berbagi wawasan dan inspirasi setiap hari ✨</p>

                    <div class="social-links">
                        <a href="https://instagram.com/perwira.yasig" target="_blank" class="social-icon"
                            aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z" />
                            </svg>
                        </a>
                        <a href="mailto:sebas@example.com" class="social-icon" aria-label="Email">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zM12 15.287l-12-9.725V21h24V5.562l-12 9.725z" />
                            </svg>
                        </a>
                        <a href="#" class="social-icon" aria-label="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>

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

            <div class="footer-bottom">
                <p class="footer-copy">© 2025 Rumah Artikel — All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function scrollToArticles() {
            document.getElementById('articles').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    @stack('scripts')
</body>

</html>