@unless(current_user()->is($user))


    <form action="{{route('follow',$user->username)}}" method="post">
        @csrf
        <button
            type="submit"
            class="px-4 py-2 text-xs text-white bg-blue-500 rounded-full shadow">
            {{current_user()->isFollowing($user) ? 'UnFollow Me' : 'Follow Me'}}
        </button>
    </form>
@endunless
