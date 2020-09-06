<x-app>

    <header class="relative mb-6">
        <div class="relative">
            <img src="{{asset('imgs/default-banner.png')}}" alt="Banner">
            <img src="{{ $user->avatar }}" alt="avatar" class="absolute bottom-0 mr-2 transform -translate-x-1/2 translate-y-1/2 rounded-full"
            width="150" style="left: 50%">
        </div>

        <div class="flex items-center justify-between mb-6">
            <div style="max-width: 270px;">
                <h2 class="text-2xl font-bold">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffforhumans()}}</p>
            </div>
            <div class="flex">
                @can('edit',$user)
                    <a
                        href="{{$user->path('edit')}}"
                        class="px-4 py-2 mr-2 text-xs border border-gray-300 rounded-full">
                        Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <p class="text-sm ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil blanditiis, at reiciendis nisi natus quod id sequi. Aspernatur molestias blanditiis qui non, nihil nisi velit consectetur, rerum, pariatur officiis sequi.</p>



    </header>

    @include('_timeline',['tweets' => $tweets])
</x-app>
