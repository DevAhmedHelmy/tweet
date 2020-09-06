<x-master>
    <div class="container flex justify-center mx-auto">
        <x-panel>
            <x-slot name="heading">Reset Password</x-slot>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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
                           autofocus
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
                        Confirm Password
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
                        Reset Password
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
    </x-master>
