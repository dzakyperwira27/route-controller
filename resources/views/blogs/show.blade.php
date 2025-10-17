@extends('layouts.app') 

{{-- Transitional: Pertama, kita gunakan judul artikel sebagai judul halaman spesifik ini. --}}
@section('title', $blogs->judul) 

{{-- Selanjutnya, letakkan detail lengkap artikel dalam section 'content' untuk ditampilkan di layout utama. --}}
@section('content')

    <div class="article-detail-container my-5">
        
        {{-- Active voice: Tampilkan judul utama artikel yang dipilih. --}}
        <h1>{{ $blogs->judul }}</h1>

        {{-- Transitional: Detail artikel memberikan konteks lebih lanjut. --}}
        <p class="article-meta">
            <strong>Author:</strong> {{ $blogs->author }} | 
            <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($blogs->tanggal)->translatedFormat('d F Y') }} |
            <strong>Kategori:</strong> {{ $blogs->kategori }}
        </p>

        @if($blogs->gambar)
            {{-- Active voice: Tampilkan gambar ilustrasi artikel jika tersedia. --}}
            <div class="article-image-wrapper mb-4">
                <img src="{{ asset('storage/'.$blogs->gambar) }}" alt="{{ $blogs->judul }}" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
        @endif

        <div class="article-body mb-5">
            {{-- Active voice: Pembaca menemukan isi artikel di bagian ini. --}}
            <p>{!! nl2br(e($blogs->isi)) !!}</p> {{-- Menggunakan nl2br untuk memformat baris baru --}}
        </div>

        {{-- Transitional: Setelah selesai membaca, tautan ini mengarahkan pengguna kembali. --}}
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Kembali ke Daftar Artikel</a>
        
    </div>

@endsection