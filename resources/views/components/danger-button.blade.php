<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-br from-orange-600 to-red-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
