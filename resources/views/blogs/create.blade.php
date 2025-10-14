<h1>Tambah Blog</h1>
<form action="{{ route('blogs.store') }}" method="POST">
    @csrf
    <label>Judul:</label>
    <input type="text" name="title" required><br>
    
    <label>Konten:</label>
    <textarea name="content" required></textarea><br>
    
    <label>Author:</label>
    <input type="text" name="author" required><br>
    
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('blogs.index') }}">Kembali</a>
