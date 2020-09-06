<div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
    @if (isset($heading))
        <div class="mb-4 text-lg font-bold">{{ $heading }}</div>
    @endif

    {{ $slot }}
</div>
