<x-guest-layout>
    <div class="mb-4 text-blue-6">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" :value="__('Email')">Email</label>
            <input id="email" class="block mt-1 w-full bg-light border-2 border-primary rounded-md p-2" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="ms-4 bg-blue-1 text-white py-2 px-4 rounded-lg hover:bg-blue-2 focus:outline-none focus:ring-2 focus:ring-primary-dark">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
