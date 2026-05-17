<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio Pribadi')</title>
    <meta name="description" content="@yield('description', 'Website Portofolio Pribadi Filino')">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Bersama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

    <!-- SIDEBAR NAVIGASI KIRI -->
    <header>
        <nav class="navbar">
            <div class="logo">MyPortofolio</div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact*') ? 'active' : '' }}">Contact</a></li>
                <li><a href="{{ route('login') }}" style="color: #0ea5e9; font-weight: 700;">Login Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- KONTEN UTAMA -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} Filino. Dibuat dengan Laravel.</p>
    </footer>

    @stack('scripts')
</body>
</html>
