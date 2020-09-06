
<x-master>
    <div class="container flex justify-center mx-auto">
        <x-panel>
            <x-slot name="heading">Register</x-slot>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="username"
                    >
                        Username
                    </label>

                    <input class="w-full p-2 border border-gray-400"
                           type="text"
                           name="username"
                           id="username"
                           autocomplete="username"
                           autofocus
                           value="{{ old('username') }}"
                           required
                    >

                    @error('username')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="name"
                    >
                        Name
                    </label>

                    <input class="w-full p-2 border border-gray-400"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required
                    >

                    @error('name')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="email"
                    >
                        Email
                    </label>

                    <input class="w-full p-2 border border-gray-400"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           required
                    >

                    @error('email')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="password"
                    >
                        Password
                    </label>

                    <input class="w-full p-2 border border-gray-400"
                           type="password"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                    >

                    @error('password')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="password_confirmation"
                    >
                        Password Confirmation
                    </label>

                    <input class="w-full p-2 border border-gray-400"
                           type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                    >

                    @error('password_confirmation')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="px-4 py-2 text-white bg-blue-400 rounded hover:bg-blue-500"
                    >
                        Register
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>
