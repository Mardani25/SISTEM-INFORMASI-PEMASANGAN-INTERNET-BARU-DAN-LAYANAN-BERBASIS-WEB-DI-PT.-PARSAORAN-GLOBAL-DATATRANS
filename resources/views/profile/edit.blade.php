<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .header-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .card {
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
            padding: 25px 30px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 15px;
        }

        /* tombol */
        button {
            background-color: #3b82f6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2563eb;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            transition: border 0.3s, box-shadow 0.3s;
        }

        input:focus, select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
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
