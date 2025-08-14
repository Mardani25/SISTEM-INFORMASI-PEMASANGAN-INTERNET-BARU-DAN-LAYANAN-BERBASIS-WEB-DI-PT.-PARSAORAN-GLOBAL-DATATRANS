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
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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

        nav button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        header {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #111827;
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        /* Responsive Hamburger */
        .hamburger svg {
            width: 24px;
            height: 24px;
        }

        /* Buttons */
        .btn-logout {
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #1d4ed8;
        }

        /* Responsive Navigation */
        @media (max-width: 640px) {
            nav .hidden.sm\:flex {
                display: none !important;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center space-x-4">
                        <a href="
                            @switch(auth()->user()->role)
                                @case('admin')
                                    {{ route('admin.dashboard') }}
                                    @break
                                @case('teknisi')
                                    {{ route('teknisi.dashboard') }}
                                    @break
                                @case('pelanggan')
                                    {{ route('pelanggan.dashboard') }}
                                    @break
                                @default
                                    {{ route('welcome') }}
                            @endswitch
                        ">Kembali ke Dashboard</a>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:space-x-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-logout">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        @endauth
                    </div>

                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="hamburger p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                @auth
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
