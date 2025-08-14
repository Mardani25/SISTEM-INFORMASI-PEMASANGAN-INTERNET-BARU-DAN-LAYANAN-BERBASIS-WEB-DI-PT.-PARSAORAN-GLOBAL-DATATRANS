<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<script src="{{ asset('build/assets/app-BVDl6rg7.js') }}"></script></head>
<body class="font-sans antialiased bg-gray-100">

    <nav x-data="{ open: false }" class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-4">
                    <a href="@switch(auth()->user()->role)
                                @case('admin') {{ route('admin.dashboard') }} @break
                                @case('teknisi') {{ route('teknisi.dashboard') }} @break
                                @case('pelanggan') {{ route('pelanggan.dashboard') }} @break
                                @default {{ route('welcome') }}
                              @endswitch"
                       class="text-blue-600 font-semibold hover:text-blue-800 transition">
                        Kembali ke Dashboard
                    </a>
                </div>

                @auth
                <div class="hidden sm:flex sm:items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
                @endauth

                <!-- Hamburger (mobile) -->
                <div class="sm:hidden">
                    <button @click="open = !open" class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition">
                        <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                            <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive menu (mobile) -->
        <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
            @auth
            <div class="pt-4 pb-2 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100 transition">
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

    <main class="max-w-7xl mx-auto p-6">
        {{ $slot }}
    </main>

</body>
</html>
