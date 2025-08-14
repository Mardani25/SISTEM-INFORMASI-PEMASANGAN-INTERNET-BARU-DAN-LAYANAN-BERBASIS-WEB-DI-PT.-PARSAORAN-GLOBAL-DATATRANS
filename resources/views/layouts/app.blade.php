<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])

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
    <nav x-data="{ open: false }" class="flex justify-between items-center h-16 max-w-7xl mx-auto">
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

        <!-- Logout (desktop) -->
        @auth
        <div class="desktop-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Log Out</button>
            </form>
        </div>
        @endauth

        <!-- Hamburger (mobile) -->
        <div class="sm:hidden">
            <button @click="open = !open" class="hamburger p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition">
                <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Logout Menu -->
    @auth
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden px-4 py-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 transition">
                Log Out
            </button>
        </form>
    </div>
    @endauth

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
