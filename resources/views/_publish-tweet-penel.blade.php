<div class="px-8 py-6 mb-8 border border-blue-400 rounded-lg">
    <form method="POST" action="/tweets">
        @csrf

        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc?"
            required
            autofocus
        ></textarea>

        <hr class="my-4">

        <footer class="flex items-center justify-between">
            <img
                src="{{ current_user()->avatar }}"
                alt="your avatar"
                class="mr-2 rounded-full"
                width="50"
                height="50"
            >

            <button
                type="submit"
                class="h-10 px-10 text-sm text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600"
            >
                Publish
            </button>
        </footer>
    </form>

    @error('body')
        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
