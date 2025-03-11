<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-blue-4 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="w-1/2 h-[30px] bg-blue-2 rounded-full">
            <input type="text" placeholder="search a group" class="bg-transparent text-white w-full h-full px-5 placeholder:text-white focus:outline-none">
        </div>
        <button class="bg-blue-4 text-white px-4 py-2 rounded ">{{ _("New chat") }}</button>
        </div>
    </x-slot>

    <div class="w-screen flex h-[600px]">
        <div class="available-chats w-1/3 h-full bg-blue-8">
            <div class="favorite h-1/3 w-full border-b">
            </div>
            <div class="friends h-1/3 w-full border-b flex flex-col justify-start items-center p-6 gap-3">
            <a href="{{ url('/friends') }}" class="btn btn-primary bg-blue-4 text-white px-4 py-2 rounded w-1/3 min-w-[120px] flex justify-center">{{ _("Friends list")}}</a>
            </div>
            <div class="groups h-1/3 w-full border-b">
            </div>
        </div>
    
        <div class="current-chat bg-blue-4 h-full w-2/3">
            <div class="current-user bg-blue-6 h-1/5 w-full border-b flex items-center gap-7 px-5">
                <div class="size-[80px] bg-blue-2 rounded-full"></div>
                <div>
                    <h4 class="text-4xl text-white font-black" >{{ _("User 1")}}</h4>
                    <h5 class="text-xl text-blue-2 font-medium"> {{ _("Online") }}</h5>
                </div>
            </div>

            <div class="conversation bg-blue-6 h-3/5 w-full">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-blue-1 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-blue-8">
                            {{ __("You were missed! - You have (1000) new messages") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="message bg-blue-1 h-1/5 w-full">

            </div>
        </div>
    </div>

</x-app-layout>
