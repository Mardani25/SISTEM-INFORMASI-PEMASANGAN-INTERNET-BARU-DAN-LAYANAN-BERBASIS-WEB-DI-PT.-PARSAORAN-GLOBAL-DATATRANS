<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-indigo-600 leading-tight tracking-wide">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Update Profile Information -->
            <div class="p-6 sm:p-8 bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-transform transform hover:-translate-y-1 duration-300 border-l-4 border-indigo-500">
                <div class="max-w-xl space-y-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-transform transform hover:-translate-y-1 duration-300 border-l-4 border-green-500">
                <div class="max-w-xl space-y-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 sm:p-8 bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-transform transform hover:-translate-y-1 duration-300 border-l-4 border-red-500">
                <div class="max-w-xl space-y-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
