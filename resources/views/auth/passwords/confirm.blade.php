<x-master>
    <div class="container flex justify-center mx-auto">
        <x-panel>
            <x-slot name="heading">Confirm Password</x-slot>

                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

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
                               required
                               autocomplete="current-password"
                        >

                        @error('password')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="px-4 py-2 text-white bg-blue-400 rounded hover:bg-blue-500"
                        >
                            Confirm Password
                        </button>
                    </div>

                    <div>
                        <button type="submit"
                                class="px-4 py-2 mr-2 text-white bg-blue-400 rounded hover:bg-blue-500"
                        >
                            Submit
                        </button>

                        <a href="{{ route('password.request') }}" class="text-xs text-gray-700">Forgot Your Password?</a>
                    </div>
                </form>
        </x-panel>
    </div>
</div>

</x-master>
