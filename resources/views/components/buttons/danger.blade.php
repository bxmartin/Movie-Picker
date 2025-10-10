<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block text-white bg-red-600 hover:bg-red-700 rounded-lg border-b-4 border-red-700 hover:border-red-800 text-sm px-5 py-2.5 text-center font-semibold uppercase']) }}>
    {{ $slot }}
</button>
