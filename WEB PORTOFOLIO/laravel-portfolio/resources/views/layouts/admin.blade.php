<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

    <!-- SIDEBAR NAVIGASI KHUSUS ADMIN -->
    <header>
        <nav class="navbar">
            <div class="logo">Admin Panel</div>

            <div style="background: rgba(14, 165, 233, 0.1); padding: 15px; border-radius: 8px; width: 80%; text-align: center; margin-bottom: 30px; border: 1px solid rgba(14, 165, 233, 0.3);">
                <p style="margin:0; font-size:0.8rem; color: #94a3b8;">Logged in as:</p>
                <p style="margin:0; font-weight:700; color: #0ea5e9;">{{ Auth::user()->username }}</p>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard CRUD</a></li>
                <li><a href="{{ route('home') }}" target="_blank">Lihat Website</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit" style="background: none; border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; padding: 12px 15px; border-radius: 8px; cursor: pointer; width: 100%; font-size: 16px; font-weight: 500; font-family: inherit;">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="content" style="padding: 40px; padding-left: 290px;">
        @if(session('success'))
            <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.4); color: #34d399; padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
                ✅ {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
