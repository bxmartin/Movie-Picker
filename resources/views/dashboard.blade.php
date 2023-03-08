<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <div class="cursor-pointer h-1/5 flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl mx-8 py-2.5 text-center mt-4 mb-8">
                        <h2 class="self-center w-full text-2xl drop-shadow-md">
                            Add a Movie
                        </h2>
                    </div>

                    <div class="cursor-pointer h-1/5 flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl mx-8 py-2.5 text-center mt-4 mb-8">
                        <h2 class="self-center w-full text-2xl drop-shadow-md">
                            Add a TV Show
                        </h2>
                    </div>

                </div>
            </div>
        </div>


    </div>
</x-app-layout>
