<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        {{-- @csrf --}}

        <!-- Email Address -->
        <div>
            <x-inputs.label for="email" :value="__('Email')" />
            <x-inputs.text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-inputs.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-inputs.label for="password" :value="__('Password')" />

            <x-inputs.text id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-inputs.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <span class="ml-2 text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-buttons.primary class="ml-3">
                {{ __('Log in') }}
            </x-buttons.primary>
        </div>
    </form>

</x-guest-layout>
