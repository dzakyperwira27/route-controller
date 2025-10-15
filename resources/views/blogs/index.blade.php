<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Blog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<h1>Daftar Blog</h1>
<a href="{{ route('blogs.create') }}">Tambah Blog</a>

<div class="blogs-container">
    @foreach($blogs as $blog)
    <div class="blog-item">
        <h2>{{ $blog->judul }}</h2>
        <p><strong>Author:</strong> {{ $blog->author }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($blog->tanggal)->translatedFormat('d F Y') }}</p>
        <p><strong>Kategori:</strong> {{ $blog->kategori }}</p>
        <p>{{ $blog->isi }}</p>
        @if($blog->gambar)
           <img src="{{ asset($blog->gambar) }}" alt="{{ $blog->judul }}" width="200">
        @endif

        <div class="blog-actions">
            <a href="{{ route('blogs.show', $blog->id) }}">Lihat</a>
            <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button>Hapus</button>
            </form>
        </div>
    </div>
    <hr>
    @endforeach
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
