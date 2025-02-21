<x-guest-layout>

    <div class="selection:bg-blue-1 selection:text-blue-10 dark:selection:bg-blue-10 dark:selection:text-blue-1">

    <div class="mb-4 text-blue-5 dark:text-blue-4">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="text-blue-1 dark:text-blue-10" :value="__('Email')">Email</label>
                <input id="email"
                    class="block mt-1 w-full bg-light border-2 border-primary rounded-md p-2 text-blue-10" type="email"
                    name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button
                    class="ms-4 bg-blue-1 dark:bg-blue-10 text-blue-10 dark:text-white py-2 px-4 rounded-lg hover:bg-blue-2 dark:hover:bg-blue-7 focus:outline-none focus:ring-2 focus:ring-primary-dark">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
