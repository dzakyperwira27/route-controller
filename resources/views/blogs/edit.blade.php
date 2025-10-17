@extends('layouts.app') 

{{-- Transitional: Pertama, kita tentukan judul spesifik untuk halaman ini. --}}
@section('title', 'Edit Artikel: ' . $blogs->judul) 

{{-- Selanjutnya, kita letakkan semua elemen formulir edit dalam section 'content' untuk ditampilkan di layout utama. --}}
@section('content')

    <div class="form-container">
        <h1>Edit Blog</h1>

        {{-- Active voice: Formulir ini mengirimkan pembaruan data ke route 'blogs.update'. --}}
        <form action="{{ route('blogs.update', $blogs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Judul:</label>
            <input type="text" name="judul" value="{{ $blogs->judul }}" required><br>

            <label>Author:</label>
            <input type="text" name="author" value="{{ $blogs->author }}" required><br>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="{{ $blogs->tanggal }}" required><br>

            <label>Isi:</label>
            {{-- Active voice: Tampilkan konten artikel yang ada saat ini. --}}
            <textarea name="isi" required>{{ $blogs->isi }}</textarea><br>

            <label>Kategori:</label>
            <input type="text" name="kategori" value="{{ $blogs->kategori }}" required><br>

            <label>Gambar:</label>
            <input type="file" name="gambar"><br>
            
            @if($blogs->gambar)
                {{-- Transitional: Karena gambar sudah ada, tampilkan gambar saat ini. --}}
                <p>Gambar Saat Ini:</p>
                <img src="{{ asset('storage/'.$blogs->gambar) }}" alt="{{ $blogs->judul }}" width="200"><br>
            @endif

            <button type="submit">Update Artikel</button>
        </form>

        {{-- Active voice: Tautan ini membawa pengguna kembali ke daftar artikel. --}}
        <a href="{{ route('blogs.index') }}">Kembali ke Daftar Artikel</a>
    </div>

@endsection

{{-- Catatan: Perhatikan bahwa saya menghilangkan duplikasi tag 
<form> yang ada di sekitar tag @if($blogs->gambar) pada kode asli Anda untuk memastikan formulir berjalan dengan benar. --}}