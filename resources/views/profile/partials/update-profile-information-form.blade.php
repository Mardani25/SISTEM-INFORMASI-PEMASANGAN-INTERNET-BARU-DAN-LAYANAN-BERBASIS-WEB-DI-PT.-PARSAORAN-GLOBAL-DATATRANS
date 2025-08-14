<section class="max-w-3xl mx-auto mt-6 bg-white rounded-xl shadow-lg p-8">
    <header class="mb-6 border-b pb-4">
        <h2 class="text-2xl font-semibold text-gray-800">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="font-medium text-gray-700" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('name')" />
        </div>

        <!-- Telepon -->
        <div>
            <x-input-label for="telepon" :value="__('Telepon')" class="font-medium text-gray-700" />
            <x-text-input id="telepon" name="telepon" type="text" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" :value="old('telepon', auth()->user()->telepon)" autocomplete="tel" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('telepon')" />
        </div>

        <!-- Alamat -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" class="font-medium text-gray-700" />
            <textarea id="alamat" name="alamat" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">{{ old('alamat', auth()->user()->alamat) }}</textarea>
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('alamat')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-sm text-gray-800">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="underline text-sm text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
            @endif
        </div>

        <!-- Buttons -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2 transition">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
