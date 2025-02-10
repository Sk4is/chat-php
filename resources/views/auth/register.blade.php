<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="text-blue-1">Name</label>
            <input id="name"
                          class="block mt-1 w-full border-2 rounded-md p-2 text-blue-10"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" :value="__('Email')" class="text-blue-1">Email</ label>
            <input id="email"
                          class="block mt-1 w-full border-2 rounded-md p-2 text-blue-10"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" :value="__('Password')" class="text-blue-1">Password</label>
            <input id="password"
                          class="block mt-1 w-full border-2 rounded-md p-2 text-blue-10"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')" class="text-blue-1">Confirm Password</label>
            <input id="password_confirmation"
                          class="block mb-6 mt-1 w-full border-2 rounded-md p-2 text-blue-10"
                          type="password"
                          name="password_confirmation"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-blue-1 hover:text-blue-3 rounded-md" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="ms-4 bg-blue-1 text-white py-2 px-4 rounded-lg hover:bg-blue-2 focus:outline-none focus:ring-2 focus:ring-primary-dark">
                {{ __('Register') }}
            </button>

        </div>
    </form>
</x-guest-layout>
