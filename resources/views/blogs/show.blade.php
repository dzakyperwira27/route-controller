<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>{{ $blogs->judul }}</h1>

<p><strong>Author:</strong> {{ $blogs->author }}</p>
<p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($blogs->tanggal)->translatedFormat('d F Y') }}</p>
<p><strong>Kategori:</strong> {{ $blogs->kategori }}</p>

<p>{{ $blogs->isi }}</p>

@if($blogs->gambar)
    <img src="{{ asset('storage/'.$blogs->gambar) }}" alt="{{ $blogs->judul }}" width="300">
@endif

<a href="{{ route('blogs.index') }}">Kembali</a>

</body>
</html>