<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <!-- Navbar -->
        <nav x-data="{ open: false }" class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">

                    <!-- Dashboard Link -->
                    <div class="flex-shrink-0">
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
                        " class="text-blue-600 font-semibold hover:text-blue-800 transition">
                            ← Kembali ke Dashboard
                        </a>
                    </div>

                    <!-- Hamburger -->
                    <div class="sm:hidden flex items-center">
                        <button @click="open = !open" class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Logout Button (Desktop) -->
                    <div class="hidden sm:flex sm:items-center">
                        @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                Log Out
                            </button>
                        </form>
                        @endauth
                    </div>

                </div>
            </div>

            <!-- Mobile Menu with Logout -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                @auth
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            Log Out
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </nav>

        <!-- Header -->
        @if (isset($header))
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
        @endif

        <!-- Main Content -->
        <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                {{ $slot }}
            </div>
        </main>

    </div>
</body>
</html>
