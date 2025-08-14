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
    }

    /* Navbar */
    nav {
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    nav a {
        color: #2563eb;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s;
    }

    nav a:hover {
        color: #1d4ed8;
        text-decoration: underline;
    }

    /* Buttons */
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
        background: #ffffff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    header h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #111827;
    }

    /* Main content card */
    main > .card {
        background: #ffffff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    /* Hamburger animation */
    .hamburger svg {
        width: 24px;
        height: 24px;
    }

    /* Responsive tweaks */
    @media (max-width: 640px) {
        .desktop-menu { display: none; }
    }
</style>
</head>

<body>
<div class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- Dashboard Link -->
                <div class="flex-shrink-0">
                    <a href="
                        @switch(auth()->user()->role)
                            @case('admin') {{ route('admin.dashboard') }} @break
                            @case('teknisi') {{ route('teknisi.dashboard') }} @break
                            @case('pelanggan') {{ route('pelanggan.dashboard') }} @break
                            @default {{ route('welcome') }}
                        @endswitch
                    ">
                        ← Kembali ke Dashboard
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="desktop-menu">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">Log Out</button>
                    </form>
                    @endauth
                </div>

                <!-- Hamburger -->
                <div class="sm:hidden flex items-center">
                    <button @click="open = !open" class="hamburger p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition">
                        <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu -->
        <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
            @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Log Out</button>
                </form>
            </div>
            @endauth
        </div>
    </nav>

    <!-- Header -->
    @if(isset($header))
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2>{{ $header }}</h2>
        </div>
    </header>
    @endif

    <!-- Main Content -->
    <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="card">
