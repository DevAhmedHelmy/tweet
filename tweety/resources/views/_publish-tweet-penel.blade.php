<div class="px-8 py-6 mb-6 border border-blue-400 rounded-lg ">
    @if(session('message'))
        <span>{{ session('message') }}</span>
    @endif
    <form action="{{ route('tweets.store') }}" method="POST">
        @csrf
        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc ?"
            required
        >
        </textarea>

        <hr class="my-4">
        <footer class="flex justify-between">
            <img src="{{  current_user()->avatar }}" alt="avatar" class="mr-2 rounded-full" style="width: 50px;">
             <img src="#" alt="" class="mr-2 rounded-full">

            <button
                type="submit"
                class="px-2 py-2 text-white bg-blue-500 rounded-lg shadow">
                Publish
            </button>
        </footer>
    </form>
    @error('body')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
