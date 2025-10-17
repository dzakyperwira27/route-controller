<section id="articles" class="articles-section">
    <h2>Artikel Terbaru</h2>

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

    <div class="pagination"></div>
</section>
