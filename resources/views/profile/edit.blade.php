<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    {{-- CSS khusus halaman ini --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            max-width: 600px;
        }

        .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 12px;
            color: #111827;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 30px 15px;
        }
    </style>

    <div class="container">
        <div class="card">
            <h3>Update Profile</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="card">
            <h3>Update Password</h3>
            @include('profile.partials.update-password-form')
        </div>

        <div class="card">
            <h3>Hapus Akun</h3>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
