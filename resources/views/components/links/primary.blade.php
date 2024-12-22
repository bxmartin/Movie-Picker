<a
    {{ $attributes->merge([
        'class' => 'd-block text-white bg-gradient-to-br
        hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg
        text-sm px-5 py-2.5 text-center inline-block mt-2 font-semibold uppercase',
    ]) }}>
    {{ $slot }}
</a>
