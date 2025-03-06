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
            <button class="bg-blue-4 text-white px-4 py-2 rounded " id="new-chat-btn">{{ _('New chat') }}</button>
        </div>
    </x-slot>

    <div class="w-full h-[600px] flex flex-col sm:flex-row overflow-hidden">
        <div class="available-chats sm:w-1/3 w-full h-full bg-blue-8 overflow-auto p-4">
            <div class="flex justify-center items-center h-14 space-x-2">
                <button class="text-white px-3 py-2 rounded text-sm">{{ _('Public') }}</button>
                <button class="text-white px-3 py-2 rounded text-sm">{{ _('Direct') }}</button>
                <button class="text-white px-3 py-2 rounded text-sm">{{ _('Group') }}</button>
                <button class="text-white px-3 py-2 rounded text-sm">{{ _('Favourites') }}</button>
            </div>
            <div class="h-1 w-4/5 mx-auto border-b"></div>

            <div id="chat-list" class="mt-5 space-y-4">
                <!-- Card para el primer chat -->
                <div class="flex items-center justify-center bg-blue-2 p-2 rounded-lg shadow-md sm:w-80 w-full mx-auto border-2 border-blue-1 relative chat-item" data-chat-id="1">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-white">User 1</h3>
                        <p class="text-xs text-blue-2">Small description or last message...</p>
                        <!-- Previsualización del último mensaje -->
                        <p class="text-xs text-blue-3">"Hey, how are you?"</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>

                <!-- Card para el segundo chat -->
                <div class="flex items-center justify-center bg-blue-2 p-2 rounded-lg shadow-md sm:w-80 w-full mx-auto border-2 border-blue-1 relative chat-item" data-chat-id="2">
                    <img src="path/to/profile-image.jpg" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-white">User 2</h3>
                        <p class="text-xs text-blue-2">Small description or last message...</p>
                        <!-- Previsualización del último mensaje -->
                        <p class="text-xs text-blue-3">"See you soon!"</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="text-xs text-blue-4">12:45 PM</span>
                    </div>
                </div>

                <!-- Puedes agregar más chats aquí con el mismo patrón -->
            </div>

        </div>

        <div id="chat-container" class="current-chat bg-blue-4 h-full w-full overflow-hidden">
        </div>
    </div>

    <script>
        const chats = [
            { id: 1, name: 'User 1', status: 'Online', messages: ['Hello!', 'How are you?'] },
            { id: 2, name: 'User 2', status: 'Offline', messages: ['Hey, I missed you!', 'Let’s catch up soon.'] }
        ];

        function loadChat(chatId) {
            const chat = chats.find(c => c.id === chatId);

            if (chat) {
                const chatContainer = document.getElementById('chat-container');
                chatContainer.innerHTML = `
                    <div class="current-user bg-blue-6 h-1/5 w-full border-b flex items-center gap-7 px-5">
                        <div class="size-[80px] bg-blue-2 rounded-full"></div>
                        <div>
                            <h4 class="text-3xl text-white font-black">${chat.name}</h4>
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

                    <div class="message bg-blue-1 h-1/5 w-full"></div>
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
            newChatElement.classList.add('flex', 'items-center', 'justify-center', 'bg-blue-2', 'p-2', 'rounded-lg', 'shadow-md', 'sm:w-80', 'w-full', 'mx-auto', 'border-2', 'border-blue-1', 'relative', 'chat-item');
            newChatElement.setAttribute('data-chat-id', newChatId);
            newChatElement.innerHTML = `
                <img src="path/to/profile-image.jpg" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                <div class="flex-1">
                    <h3 class="text-sm font-semibold text-white">Chat ${newChatId}</h3>
                    <p class="text-xs text-blue-2">Small description or last message...</p>
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
