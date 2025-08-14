<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    /* Body */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    /* Navbar */
    nav {
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        padding: 0.5rem 1rem;
    }

    nav a {
        font-weight: 500;
        color: #2563eb;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    nav a:hover {
        color: #1d4ed8;
        text-decoration: underline;
    }

    /* Logout button */
    .btn-logout {
        background-color: #2563eb;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-logout:hover {
        background-color: #1d4ed8;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    /* Header */
    header {
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        margin-bottom: 1rem;
    }

    header h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #111827;
    }

    /* Main Content */
    main {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    /* Responsive */
    @media (max-width: 640px) {
        .desktop-logout { display: none; }
    }

    /* Mobile hamburger menu */
    .hamburger svg {
        width: 24px;
        height: 24px;
    }
</style>
</head>
<body>
<div class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav x-data="{ open: false }" class="flex justify-between items-center max-w-7xl mx-auto">
        <div>
            <a href="
                @switch(auth()->user()->role)
                    @case('admin') {{ route('admin.dashboard') }} @break
                    @case('teknisi') {{ route('teknisi.dashboard') }} @break
                    @case('pelanggan') {{ route('pelanggan.dashboard') }} @break
                    @default {{ route('welcome') }}
                @endswitch
            ">← Kembali ke Dashboard</a>
        </div>

        <!-- Logout button -->
        @auth
        <div class="desktop-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Log Out</button>
            </form>
        </div>
        @endauth
    </nav>

    <!-- Page Header -->
    @if (isset($header))
    <header class="mt-4 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
        <h2>{{ $header }}</h2>
    </header>
    @endif

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
