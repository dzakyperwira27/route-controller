<h1>Daftar Blog</h1>
<a href="{{ route('blogs.create') }}">Tambah Blog</a>
<ul>
@foreach($blogs as $blog)
    <li>
        {{ $blog->title }} - {{ $blog->author }}
        <a href="{{ route('blogs.show', $blog->id) }}">Lihat</a>
        <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button>Hapus</button>
        </form>
    </li>
@endforeach
</ul>
