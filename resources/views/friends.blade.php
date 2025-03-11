<x-app-layout>
      <div class="w-screen flex h-[700px] flex-col justify-around items-center bg-blue-2">
        <h1 class="font-bold text-4xl">{{__("All your friends in one place")}}</h1>
        <ul class="w-full h-1/2 flex flex-col items-center gap-2">
        @forelse($friends as $friend)
            <li class="rounded-lg bg-blue-8 text-white px-6 py-2 w-1/2 min-h-[70px] flex justify-between items-center">
                <div class="w-1/3 h-full flex justify-start items-center gap-4">
                    <div class="bg-blue-1 h-3/4 aspect-square rounded-full"></div><h5 class="text-lg font-bold">{{$friend->name }}</h5>
                </div>
                <div class="text-blue-3 w-full flex justify-center items-center">{{__("friends since ") . \Carbon\Carbon::parse($friend->added_date)->toFormattedDateString()}}</div>
                <div class="w-1/5 h-full flex justify-end items-center gap-1">
                    <span class="{{ $friend->status === 'online' ? 'bg-green-400' : 'bg-gray-400' }} block h-1/5 aspect-square rounded-full"></span><span class="{{ $friend->status === 'online' ? 'text-green-400' : 'text-gray-400' }}"> {{ $friend->status }} </span>
                </div>
            </li>
        @empty
            <li class="rounded-lg bg-blue-8 text-white p-6 w-1/2">{{__("You have no friends")}}</li>
        @endforelse
       </ul>
       <a href="{{ route('dashboard') }}" class="btn bg-blue-4 text-white rounded w-[160px] h-[50px] flex justify-center items-center">{{__("Back to Dashboard")}}</a>
    </div>
</x-app-layout>
