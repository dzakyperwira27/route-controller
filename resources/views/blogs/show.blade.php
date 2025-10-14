<h1>{{ $blog->title }}</h1>
<p>{{ $blog->content }}</p>
<p>Author: {{ $blog->author }}</p>
<a href="{{ route('blogs.index') }}">Kembali</a>
