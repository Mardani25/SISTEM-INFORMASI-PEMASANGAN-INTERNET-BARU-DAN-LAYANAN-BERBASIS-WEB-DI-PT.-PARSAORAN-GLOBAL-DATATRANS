<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-600 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Update Profile Information -->
            <div class="p-6 sm:p-8 bg-white shadow-lg rounded-xl hover:shadow-2xl transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 bg-white shadow-lg rounded-xl hover:shadow-2xl transition duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 sm:p-8 bg-white shadow-lg rounded-xl hover:shadow-2xl transition duration-300 border border-red-200">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
