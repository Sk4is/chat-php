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
                <button class="text-white px-3 py-2 rounded text-sm">{{ _('Direct') }}</button>
                <a href="{{ route('group') }}">
                    <button class="text-white px-3 py-2 rounded text-sm min-w-max text-opacity-50">{{ _('Group') }}</button>
                </a>
                <a href="{{ route('favourites') }}">
                    <button class="text-white px-3 py-2 rounded text-sm min-w-max text-opacity-50">{{ _('Favourites') }}</button>
                </a>
            </div>
            <div class="h-1 w-4/5 mx-auto border-b"></div>

            <div id="chat-list" class="mt-5 space-y-4">
                <div class="flex items-center justify-center bg-blue-2 p-2 rounded-lg shadow-md sm:w-80 w-full mx-auto border-2 border-blue-1 relative chat-item"
                    data-chat-id="1">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-white mb-2">User 1</h3>
                        <p class="text-xs text-blue-3">"Hey, how are you?"</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>

                <div class="flex items-center justify-center bg-blue-2 p-2 rounded-lg shadow-md sm:w-80 w-full mx-auto border-2 border-blue-1 relative chat-item"
                    data-chat-id="2">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-white mb-2">User 2</h3>
                        <p class="text-xs text-blue-3">"See you soon!"</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>

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

        <div id="chat-container" class="current-chat bg-blue-4 h-full w-full overflow-hidden">
        </div>
    </div>

    <script>
        const chats = [{
                id: 1,
                name: 'User 1',
                status: 'Online',
                messages: ['Hello!', 'How are you?']
            },
            {
                id: 2,
                name: 'User 2',
                status: 'Offline',
                messages: ['Hey, I missed you!', 'Let’s catch up soon.']
            }
        ];

        function loadChat(chatId) {
            const chat = chats.find(c => c.id === chatId);

            if (chat) {
                const chatContainer = document.getElementById('chat-container');
                chatContainer.innerHTML = `
                    <div class="current-user bg-blue-6 h-1/5 w-full border-b flex items-center gap-7 px-5">
                        <div class="size-[80px] bg-blue-2 rounded-full"></div>
                        <div>
                            <h4 class="text-3xl text-white font-black mb-2">${chat.name}</h4>
                            <h5 class="text-100 text-blue-2 font-medium">${chat.status}</h5>
                        </div>
                    </div>

                    <div class="conversation bg-blue-6 h-3/5 w-full overflow-auto">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-blue-1 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-blue-8">
                                        ${chat.messages.map(msg => `<p>${msg}</p>`).join('')}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="message bg-blue-1 h-1/5 w-full flex justify-end items-center gap-4 pr-4">
                        <button class="mic"><img src="images/icons/mic 1.png" alt="Mic icon" class="w-8 h-8"></button>
                        <button class="file"><img src="images/icons/clip 1.png" alt="Clip icon" class="w-7 h-7"></button>
                        <button class="send"><img src="images/icons/send 1.png" alt="Send icon" class="w-8 h-8"></button>
                    </div>

                `;
            }
        }

        document.querySelectorAll('.chat-item').forEach(chatElement => {
            chatElement.addEventListener('click', () => {
                const chatId = parseInt(chatElement.getAttribute('data-chat-id'));
                loadChat(chatId);
            });
        });

        loadChat(1);

        document.getElementById('new-chat-btn').addEventListener('click', () => {
            const newChatId = chats.length + 1;
            const newChat = {
                id: newChatId,
                name: `User ${newChatId}`,
                status: 'Online',
                messages: ['Welcome to the chat!']
            };
            chats.push(newChat);
            const chatList = document.getElementById('chat-list');

            const newChatElement = document.createElement('div');
            newChatElement.classList.add('flex', 'items-center', 'justify-center', 'bg-blue-2', 'p-2', 'rounded-lg',
                'shadow-md', 'sm:w-80', 'w-full', 'mx-auto', 'border-2', 'border-blue-1', 'relative',
                'chat-item');
            newChatElement.setAttribute('data-chat-id', newChatId);
            newChatElement.innerHTML = `
                <img src="path/to/profile-image.jpg" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-white mb-2">Chat ${newChatId}</h3>
                    <p class="text-xs text-blue-3">Small description or last message...</p>
                </div>
                <div class="absolute top-2 right-2">
                    <span class="text-xs text-blue-4">12:45 PM</span>
                </div>
            `;
            chatList.appendChild(newChatElement);

            newChatElement.addEventListener('click', () => {
                loadChat(newChatId);
            });
        });
    </script>
</x-app-layout>
