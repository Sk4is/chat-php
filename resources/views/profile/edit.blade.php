<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-1 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-10">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex max-sm:flex-col items-stretch justify-between gap-6">
                <div class="flex-1 p-4 sm:p-8 bg-blue-1 shadow sm:rounded-lg flex flex-col">
                    <div class="w-full">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            
                <div class="flex-1 p-4 sm:p-8 bg-blue-1 shadow sm:rounded-lg flex flex-col">
                    <div class="w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
            
    
            <div class="p-4 sm:p-8 bg-blue-1 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
