<a {{ $attributes->merge(['class' => 'inline-flex items-center underline p-2 bg-white dark:bg-gray-800 font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase hover:bg-gray-50 dark:hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
