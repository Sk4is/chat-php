<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <button class="bg-blue-4 text-white px-4 py-2 rounded ">Add chat</button>
        </div>
    </x-slot>

   

    <div class="w-screen flex h-[600px]">
    <div class="available-chats w-1/3 h-full bg-blue-8">
        <div class="favorite h-1/3 w-full border-b">

        </div>

        <div class="friends h-1/3 w-full border-b">

        </div>

        <div class="groups h-1/3 w-full border-b">

        </div>
    </div>
    
    <div class="current-chat bg-blue-4 h-full w-2/3">
        <div class="current-user bg-blue-6 h-1/6 w-full border-b">

        </div>

        <div class="conversation bg-blue-6 h-4/6 w-full">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-blue-1 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-blue-8 dark:text-gray-100">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="message bg-blue-1 h-1/6 w-full">

        </div>
    </div>
    </div>

</x-app-layout>
