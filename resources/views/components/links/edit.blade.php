<a {{ $attributes->merge(['class' => 'w-full block text-white bg-green-600 hover:bg-green-700 rounded-lg border-b-4 border-green-700 hover:border-green-800 text-sm px-5 py-2.5 text-center font-semibold uppercase']) }}>
    <img src="{{ asset('vendor/blade-heroicons/s-pencil.svg') }}" class="inline-block h-4 mr-1 svg-white" />
    <span class="mt-0.5">{{ $slot }}</span>
</a>
