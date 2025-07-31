<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8 border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">
            🔐 Reset Password
        </h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">📧 Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                    required autofocus autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">🔑 New Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">🔁 Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
