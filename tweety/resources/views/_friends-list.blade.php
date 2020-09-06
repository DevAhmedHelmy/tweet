<h3 class="mb-4 text-xl font-bold">Following</h3>

<ul>

    @forelse(current_user()->follows as $user)
        <li class="mb-3">

            <a href="{{$user->path()}}" class="flex items-center text-sm">
                <img src="{{ $user->avatar }}" alt="avatar" class="mr-2 rounded-full" style="width: 50px;">
                {{$user->name}}
            </a>

        </li>
    @empty
        <li>
            No Friends Yet
        </li>
    @endforelse


</ul>
