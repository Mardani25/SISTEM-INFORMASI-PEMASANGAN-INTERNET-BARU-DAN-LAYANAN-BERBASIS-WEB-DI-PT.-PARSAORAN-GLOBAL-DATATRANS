<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="stylesheet" href="{{ asset('build/assets/app-BVDl6rg7.css') }}">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    nav {
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        padding: 0 1rem;
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

    header {
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    header h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #111827;
    }

    main {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .hamburger svg {
        width: 24px;
        height: 24px;
    }

    /* Responsive tweaks */
    @media (max-width: 640px) {
        .desktop-logout { display: none; }
    }
</style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen flex flex-col">

<!-- Navbar -->
<nav x-data="{ open: false }" class="bg-white shadow-md rounded-b-lg py-3 px-6 max-w-7xl mx-auto flex justify-between items-center">
    <div>
        <a href="
            @switch(auth()->user()->role)
                @case('admin') {{ route('admin.dashboard') }} @break
                @case('teknisi') {{ route('teknisi.dashboard') }} @break
                @case('pelanggan') {{ route('pelanggan.dashboard') }} @break
                @default {{ route('welcome') }}
            @endswitch
        "
           class="text-blue-600 font-semibold px-4 py-2 rounded-md hover:bg-blue-100 transition duration-200">
           ← Kembali ke Dashboard
        </a>
    </div>
</nav>


    <!-- Header -->
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
