<ul>
    <li>
        <a class="block mb-4 text-lg font-blod" href="{{route('home')}}">Home</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="{{ route('explore') }}">Explore</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="">Notification</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="">Messages</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="">Bookmarks</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="">Lists</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="{{current_user()->path()}}">Profile</a>
    </li>
    <li>
        <a class="block mb-4 text-lg font-blod" href="">More</a>
    </li>
</ul>
