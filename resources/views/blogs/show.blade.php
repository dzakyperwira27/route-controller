@extends('layouts.app')

@section('title', $blogs->judul)

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        font-family: 'Inter', sans-serif;
    }

    .article-container {
        max-width: 800px;
        margin: 60px auto;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    .article-container h1 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 10px;
    }

    .article-meta {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 25px;
    }

    .article-image-wrapper {
        margin-bottom: 25px;
        text-align: center;
    }

    .article-image-wrapper img {
        max-width: 100%;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    }

    .article-body {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #334155;
        margin-bottom: 35px;
    }

    .btn-back {
        display: inline-block;
        padding: 10px 22px;
        background: #1e293b;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .btn-back:hover {
        background: #334155;
    }
</style>

<div class="article-container">
    <h1>{{ $blogs->judul }}</h1>

    <p class="article-meta">
        <strong>Author:</strong> {{ $blogs->author }} |
        <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($blogs->tanggal)->translatedFormat('d F Y') }} |
        <strong>Kategori:</strong> {{ $blogs->kategori }}
    </p>

    @if($blogs->gambar)
        <div class="article-image-wrapper">
            <img src="{{ asset('storage/'.$blogs->gambar) }}" alt="{{ $blogs->judul }}">
        </div>
    @endif

    <div class="article-body">
        {!! nl2br(e($blogs->isi)) !!}
    </div>

    <a href="{{ route('blogs.index') }}" class="btn-back">Kembali ke Daftar Artikel</a>
</div>
@endsection
