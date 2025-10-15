<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Tambah Blog</h1>
<li><a href="{{ route('blogs.index') }}">Lihat Artikel</a></li>
<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul:</label>
    <input type="text" name="judul" required><br>

    <label>Author:</label>
    <input type="text" name="author" required><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" required><br>

    <label>Isi:</label>
    <textarea name="isi" required></textarea><br>

    <label>Kategori:</label>
    <input type="text" name="kategori"  required><br>

    <label>Gambar:</label>
    <input type="file" name="gambar" accept="image/*"><br>
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">

    <button type="submit">Simpan</button>
</form>
<a href="{{ route('blogs.index') }}">Kembali</a>
</body>
</html>
