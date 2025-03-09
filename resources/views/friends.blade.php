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
       {{_("Aquí tu lista de amigos, en un futuro próximo")}}
    </div>

</x-app-layout>
