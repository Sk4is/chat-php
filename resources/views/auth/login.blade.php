<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form id="loginForm" method="POST" action="{{ route('login') }}" onsubmit="return validateForm('login')">
        @csrf
        <div class="selection:bg-blue-1 selection:text-blue-10 dark:selection:bg-blue-10 dark:selection:text-blue-1">

            <!-- Email Address -->
            <div>
                <label for="email" :value="__('Email')" class="text-blue-1 dark:text-blue-10">Email</label>
                <input id="email"
                    class="block mt-1 w-full bg-light border-2 border-primary rounded-md p-2 text-blue-10" type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" :value="__('Password')" class="text-blue-1 dark:text-blue-10">Password</label>

                <input id="password"
                    class="block mt-1 w-full bg-light border-2 border-primary rounded-md p-2 text-blue-10"
                    type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-blue-1 dark:text-blue-10">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-blue-1 dark:text-blue-10 hover:text-blue-2 dark:hover:text-blue-5 rounded-md"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button
                    class="ms-3 bg-blue-1 dark:bg-blue-10 dark:text-white py-2 px-4 rounded-lg hover:bg-blue-2 dark:hover:bg-blue-7 focus:outline-none focus:ring-2 focus:ring-primary-dark">
                    {{ __('Log in') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
