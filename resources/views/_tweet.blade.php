
 <div class="flex p-4 {{!$loop->last ? 'border-b border-b-gray-400' : ''}}">
    <div class="flex-shrink-0 mr-4">
        <a href="{{$tweet->user->path()}}">
            <img src="{{ $tweet->user->avatar }}" alt="avatar" class="mr-2 rounded-full" style="width: 50px;">
        </a>
    </div>
    <div>
        <h5 class="mb-4 font-bold">
            <a href="{{$tweet->user->path()}}">{{ $tweet->user->name }}</h5></a>
        <p class="text-sm ">{{ $tweet->body }}</p>
        @auth
            <x-like-buttons :tweet="$tweet" />
        @endauth
    </div>

 </div>

