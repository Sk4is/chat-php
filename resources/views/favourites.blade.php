<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <img src="images/logo.png" alt="BreezeFlow logo">
            <div class="w-1/2 h-[30px] bg-blue-2 rounded-full flex items-center">
                <input type="text" placeholder="Search a group"
                    class="bg-transparent text-white w-full h-full px-5 placeholder:text-white focus:outline-none">
                <img src="images/icons/lens 1.png" alt="Search Icon" class="w-4 h-4 mr-2">
            </div>
            <button class="bg-blue-4 text-white px-4 py-2 rounded flex items-center" id="new-chat-btn">
                <img src="images/icons/newChat 1.png" alt="" class="mr-2 w-6 h-6">
                {{ _('New chat') }}
            </button>
        </div>
    </x-slot>

    <div class="w-full h-[600px] flex flex-col sm:flex-row overflow-hidden">
        <div class="available-chats sm:w-1/3 w-full h-full bg-blue-8 overflow-hidden p-4">
            <div id="button-container" class="flex justify-start items-center h-14 space-x-2 cursor-grab whitespace-nowrap overflow-hidden">
                <a href="{{ route('public') }}">
                    <button class="text-white px-3 py-2 rounded text-sm min-w-max text-opacity-50">{{ _('Public') }}</button>
                </a>
                <a href="{{ route('direct') }}">
                    <button class="text-white px-3 py-2 rounded text-sm min-w-max text-opacity-50">{{ _('Direct') }}</button>
                </a>
                <a href="{{ route('group') }}">
                    <button class="text-white px-3 py-2 rounded text-sm min-w-max text-opacity-50">{{ _('Group') }}</button>
                </a>
                <a href="{{ route('favourites') }}">
                    <button class="text-white px-3 py-2 rounded text-sm min-w-max">{{ _('Favourites') }}</button>
                </a>
            </div>
            <div class="h-1 w-4/5 mx-auto border-b"></div>

            <div id="chat-list" class="mt-5 space-y-4">
            </div>
        </div>

        <script>
            const buttonContainer = document.getElementById('button-container');

            let isDragging = false;
            let startX;
            let scrollLeft;

            buttonContainer.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.pageX - buttonContainer.offsetLeft;
                scrollLeft = buttonContainer.scrollLeft;
                buttonContainer.style.cursor = 'grabbing';
            });

            buttonContainer.addEventListener('mouseleave', () => {
                isDragging = false;
                buttonContainer.style.cursor = 'grab';
            });

            buttonContainer.addEventListener('mouseup', () => {
                isDragging = false;
                buttonContainer.style.cursor = 'grab';
            });

            buttonContainer.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - buttonContainer.offsetLeft;
                const walk = (x - startX) * 2;
                buttonContainer.scrollLeft = scrollLeft - walk;
            });
        </script>

        <style>
            #button-container {
                overflow-x: hidden;
                white-space: nowrap;
            }
        </style>

        <div id="chat-container" class="current-chat bg-blue-6 h-full w-full flex flex-col justify-center items-center overflow-hidden text-center">
            <img src="images/logo.png" alt="BreezeFlow logo" class="w-50 h-50">
            <p class="text-50 text-[#A9D6E5] mt-4">Please, select a chat or group to start chatting.</p>
        </div>

    </div>

</x-app-layout>
