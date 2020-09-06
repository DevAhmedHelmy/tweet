<x-master>
    <div class="container flex justify-center mx-auto">
        <x-panel>
            <x-slot name="heading">Reset Password</x-slot>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

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
                           required
                           autofocus
                           autocomplete="email"
                    >

                    @error('email')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="px-4 py-2 text-white bg-blue-400 rounded hover:bg-blue-500"
                    >
                        Send Reset Password Link
                    </button>
                </div>

                @if(session('status'))
                    <div class="text-sm text-gray-800" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
        </x-panel>
    </div>
</x-master>
