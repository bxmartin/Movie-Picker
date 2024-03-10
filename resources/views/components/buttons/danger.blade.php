<button {{ $attributes->merge(['type' => 'submit', 'class' => 'd-block text-white bg-gradient-to-br from-red-600 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 rounded-lg text-sm px-5 py-2.5 text-center inline-block mt-2 font-semibold uppercase']) }}>
    {{ $slot }}
</button>
