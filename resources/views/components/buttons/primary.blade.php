<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-lg text-white bg-blue-600 hover:bg-blue-700 py-3 px-8 rounded-lg border-b-4 border-blue-700 hover:border-blue-800 text-sm px-5 py-2.5 text-center font-semibold uppercase']) }}>
    {{ $slot }}
</button>
