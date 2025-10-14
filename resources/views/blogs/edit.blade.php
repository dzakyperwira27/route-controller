<h1>Edit Blog</h1>
<form action="{{ route('blogs.update', $blog->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label>Judul:</label>
    <input type="text" name="title" value="{{ $blog->title }}" required><br>
    
    <label>Konten:</label>
    <textarea name="content" required>{{ $blog->content }}</textarea><br>
    
    <label>Author:</label>
    <input type="text" name="author" value="{{ $blog->author }}" required><br>
    
    <button type="submit">Update</button>
</form>
<a href="{{ route('blogs.index') }}">Kembali</a>
