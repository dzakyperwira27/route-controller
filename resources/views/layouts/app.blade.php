<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rumah Artikel | Portfolio')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- 🔹 Navbar --}}
    @include('sections.navbar')

    {{-- 🔹 Konten Dinamis --}}
    <main>
        @yield('content')
    </main>

    {{-- 🔹 Footer --}}
    @include('sections.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
