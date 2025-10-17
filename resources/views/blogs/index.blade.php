@extends('layouts.app') 

{{-- Transitional: Pertama, tentukan judul halaman ini agar tampil di tag <title> browser. --}}
@section('title', 'Daftar Semua Blog') 

{{-- Selanjutnya, tempatkan semua konten utama halaman, yaitu daftar blog, dalam section 'content'. --}}
@section('content')

    <div class="container my-5">
        <h1>Daftar Blog</h1>
        
        {{-- Active voice: Tautan ini memungkinkan pengguna untuk menambahkan artikel baru. --}}
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4">➕ Tambah Artikel Baru</a>

        <div class="blogs-container">
            @foreach($blogs as $blog)
            <div class="blog-item card p-3 mb-3">
                
                {{-- Active voice: Tampilkan judul dan detail penting artikel. --}}
                <h2>{{ $blog->judul }}</h2>
                <p><strong>Author:</strong> {{ $blog->author }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($blog->tanggal)->translatedFormat('d F Y') }}</p>
                <p><strong>Kategori:</strong> {{ $blog->kategori }}</p>
                <p>{{ Str::limit($blog->isi, 200) }}...</p> {{-- Batasi isi untuk tampilan daftar --}}
                
                @if($blog->gambar)
                    {{-- Transitional: Jika tersedia, tampilkan gambar yang mewakili artikel. --}}
                    <img src="{{ asset($blog->gambar) }}" alt="{{ $blog->judul }}" width="200" class="img-fluid my-2">
                @endif

                <div class="blog-actions mt-3">
                    {{-- Active voice: Berikan opsi kepada pengguna untuk berinteraksi dengan artikel. --}}
                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    {{-- Active voice: Formulir ini menjalankan permintaan DELETE untuk menghapus artikel. --}}
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
            @endforeach
        </div>
    </div>

{{-- Skrip spesifik tidak lagi diperlukan di sini karena sudah dipindahkan ke layouts/app.blade.php (atau dihapus jika hanya untuk halaman ini). --}}
@endsection