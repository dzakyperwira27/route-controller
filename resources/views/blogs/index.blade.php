@extends('layouts.app')

@section('title', 'Daftar Semua Blog')

@section('content')
<style>
    /* 🌿 Wrapper utama transparan agar menyatu dengan background asli */
    .blog-wrapper {
        max-width: 900px;
        margin: 60px auto;
        padding: 20px;
        color: #222;
    }

    h1 {
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        color: #1c2833;
    }

    /* 🌈 Tombol utama gradien */
    .btn-primary {
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        border: none;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        filter: brightness(1.1);
    }

    /* ✨ Style tombol kecil */
    .btn-sm {
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    /* 💙 Lihat Detail */
    .btn-info {
        background: linear-gradient(135deg, #36b9cc, #2c9faf);
        border: none;
        color: #fff;
    }

    .btn-info:hover {
        filter: brightness(1.15);
        transform: translateY(-2px);
    }

    /* 🟡 Edit */
    .btn-warning {
        background: linear-gradient(135deg, #f6c23e, #dda20a);
        border: none;
        color: #fff;
    }

    .btn-warning:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
    }

    /* 🔴 Hapus */
    .btn-danger {
        background: linear-gradient(135deg, #e74a3b, #c0392b);
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
    }

    /* 📘 Kartu blog */
    .blog-item {
        background: rgba(255, 255, 255, 0.25);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(6px);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .blog-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .blog-item h2 {
        color: #1c2833;
        font-size: 1.4rem;
        margin-bottom: 10px;
    }

    .blog-item p {
        color: #2f3640;
        line-height: 1.6;
        margin-bottom: 8px;
    }

    /* 📸 Gambar blog — ukuran standar */
    .blog-item img {
        border-radius: 10px;
        display: block;
        margin: 10px auto;
        max-width: 250px; /* Lebar standar */
        height: auto; /* Proporsional */
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* ⚙️ Tombol aksi */
    .blog-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    hr {
        border: 0;
        height: 1px;
        background: rgba(255, 255, 255, 0.3);
        margin: 25px 0;
    }

    /* 📱 Responsif */
    @media (max-width: 576px) {
        .blog-wrapper {
            padding: 15px;
        }

        .blog-item h2 {
            font-size: 1.2rem;
        }

        .btn-primary {
            width: 100%;
        }

        .blog-item img {
            max-width: 100%;
        }
    }
</style>

<div class="blog-wrapper">
    <h1>📰 Daftar Blog</h1>

    <div class="text-center mb-4">
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">
            ➕ Tambah Artikel Baru
        </a>
    </div>

    <div class="blogs-container">
        @forelse($blogs as $blog)
            <div class="blog-item">
                <h2>{{ $blog->judul }}</h2>
                <p><strong>Author:</strong> {{ $blog->author }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($blog->tanggal)->translatedFormat('d F Y') }}</p>
                <p><strong>Kategori:</strong> {{ $blog->kategori }}</p>
                <p>{{ Str::limit($blog->isi, 200) }}...</p>

                @if($blog->gambar)
                    <img src="{{ asset($blog->gambar) }}" alt="{{ $blog->judul }}">
                @endif

                <div class="blog-actions">
                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?');">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            <hr>
        @empty
            <p class="text-center text-light">Belum ada artikel yang dipublikasikan.</p>
        @endforelse
    </div>
</div>
@endsection
