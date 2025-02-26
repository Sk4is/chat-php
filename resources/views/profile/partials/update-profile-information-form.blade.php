<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your account\'s profile information and email address.') }}
        </p>
    </header>

    <form id="updateProfile" method="post" action="{{ route('profile.update') }}" onsubmit="return validateForm('updateProfile')" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="update_profile_name" :value="__('Name')" />
            <x-text-input id="update_profile_name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="update_profile_email" :value="__('Email')" />
            <x-text-input id="update_profile_email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'both-changed')
                <p class="text-sm text-green-600 dark:text-green-400">{{ __('Both name and email have been updated.') }}</p>
            @elseif (session('status') === 'name-changed')
                <p class="text-sm text-green-600 dark:text-green-400">{{ __('Name has been updated.') }}</p>
            @elseif (session('status') === 'email-changed')
                <p class="text-sm text-green-600 dark:text-green-400">{{ __('Email has been updated.') }}</p>
            @elseif (session('status') === 'no-changes')
                <p class="text-sm text-red-600 dark:text-red-400">{{ __('No changes were made.') }}</p>
            @endif
        </div>
    </form>
</section>
