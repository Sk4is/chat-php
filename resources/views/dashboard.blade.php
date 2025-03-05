<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-blue-4 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="w-1/2 h-[30px] bg-blue-2 rounded-full">
                <input type="text" placeholder="search a group"
                    class="bg-transparent text-white w-full h-full px-5 placeholder:text-white focus:outline-none">
            </div>
            <button class="bg-blue-4 text-white px-4 py-2 rounded ">{{ _('New chat') }}</button>
        </div>
    </x-slot>

    <div class="w-full h-[600px] flex overflow-hidden">
        <div class="available-chats w-1/3 h-full bg-blue-8 overflow-auto">
            <div class="flex justify-center items-center h-14">
                <button class="text-white px-4 py-2 rounded">{{ _('Public') }}</button>
                <button class="text-white px-4 py-2 rounded">{{ _('Direct') }}</button>
                <button class="text-white px-4 py-2 rounded">{{ _('Group') }}</button>
                <button class="text-white px-4 py-2 rounded">{{ _('Favourites') }}</button>
            </div>
            <div class="h-1 w-4/5 mx-auto border-b"></div>

            <div class="mt-5 space-y-4">
                
                <div
                    class="flex items-center justify-center bg-blue-2 p-1 rounded-lg shadow-md w-80 mx-auto border-2 border-blue-1 relative">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-16 h-16 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-white">Chat Name</h3>
                        <p class="text-sm text-blue-2">Small description or last message...</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>

                <div
                    class="flex items-center justify-center bg-blue-3 p-1 rounded-lg shadow-md w-80 mx-auto border-2 border-blue-1 relative">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-16 h-16 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-white">Chat Name</h3>
                        <p class="text-sm text-blue-2">Small description or last message...</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>

                <div
                    class="flex items-center justify-center bg-blue-3 p-1 rounded-lg shadow-md w-80 mx-auto border-2 border-blue-1 relative">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-16 h-16 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-white">Chat Name</h3>
                        <p class="text-sm text-blue-2">Small description or last message...</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="current-chat bg-blue-4 h-full w-full overflow-hidden">
            <div class="current-user bg-blue-6 h-1/5 w-full border-b flex items-center gap-7 px-5">
                <div class="size-[80px] bg-blue-2 rounded-full"></div>
                <div>
                    <h4 class="text-3xl text-white font-black">{{ _('User 1') }}</h4>
                    <h5 class="text-100 text-blue-2 font-medium"> {{ _('Online') }}</h5>
                </div>
            </div>

            <div class="conversation bg-blue-6 h-3/5 w-full overflow-auto">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-blue-1 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-blue-8">
                                {{ __('You were missed! - You have (1000) new messages') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="message bg-blue-1 h-1/5 w-full"></div>
        </div>
    </div>

</x-app-layout>
