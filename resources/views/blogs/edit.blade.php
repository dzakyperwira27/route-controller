<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit artikel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Edit Blog</h1>

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
    <textarea name="isi" required>{{ $blogs->isi }}</textarea><br>

    <label>Kategori:</label>
    <input type="text" name="kategori" value="{{ $blogs->kategori }}" required><br>

    <label>Gambar:</label>
    <input type="file" name="gambar"><br>
    @if($blogs->gambar)
        <img src="{{ asset('storage/'.$blogs->gambar) }}" alt="{{ $blogs->judul }}" width="200">
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @endif

    <button type="submit">Update</button>
</form>

<a href="{{ route('blogs.index') }}">Kembali</a>

</body>
</html>