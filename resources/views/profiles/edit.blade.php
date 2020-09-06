<x-app>

    <form action="{{$user->path()}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 uppercase" for="name">Name</label>
            <input class="w-full p-2 border border-gray-300" type="text" name="name" id="name" value="{{$user->name}}" required>
            @error('name')
                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 uppercase" for="username">username</label>
            <input class="w-full p-2 border border-gray-300" type="text" name="username" id="username" value="{{$user->username}}" required>
            @error('name')
                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 uppercase" for="email">Email</label>
            <input class="w-full p-2 border border-gray-300" type="email" name="email" id="username" value="{{$user->email}}" required>
            @error('name')
                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 uppercase" for="avatar">avatar</label>
            <div class="flex">
                <input class="w-full p-2 border border-gray-300" type="file" name="avatar" id="avatar" value="{{$user->avatar}}" accept="image/*">
                <img src="{{ $user->avatar }}" alt="Your Avatar" width="40">
            </div>
            @error('avatar')
                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 uppercase" for="password">Password</label>
            <input class="w-full p-2 border border-gray-300" type="password" name="password" id="password" required>
            @error('password')
                <p class="mt-2 text-xs text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 uppercase" for="password_confirmation">Password Confirmation</label>
            <input class="w-full p-2 border border-gray-300" type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class="mb-6">
            <button type="submit"
                    class="px-4 py-2 mr-4 text-white bg-blue-400 rounded hover:bg-blue-500"
            >
                Submit
            </button>

            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>

    </form>


</x-app>
