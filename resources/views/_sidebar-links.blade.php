<ul>
    <li>
        <a
            class="block mb-4 text-lg font-bold"
            href="{{ route('home') }}"
        >
            Home
        </a>
    </li>

    <li>
        <a
            class="block mb-4 text-lg font-bold"
            href="{{route('explore')}}"
        >
            Explore
        </a>
    </li>

    @auth
        <li>
            <a
                class="block mb-4 text-lg font-bold"
                href="{{ current_user()->path() }}"
            >
                Profile
            </a>
        </li>

        <li>
            <form method="POST" action="/logout">
                @csrf

                <button class="text-lg font-bold">Logout</button>
            </form>
        </li>
    @endauth
</ul>
