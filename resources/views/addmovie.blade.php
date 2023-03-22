<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add a movie') }}
        </h2>
    </x-slot>


    <div class="flex justify-center sm:my-8">
        <form method="POST" action="/admin/movies">
            @csrf
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <x-input-label for="genre" :value="__('Genre')" />
            <x-text-input id="genre" class="block w-full mt-1" type="text" name="genre" :value="old('genre')" required />
            <x-input-error :messages="$errors->get('genre')" class="mt-2" />

            <x-input-label for="runtime" :value="__('Runtime')" />
            <x-text-input id="runtime" class="block w-full mt-1" type="number" name="runtime" :value="old('runtime')" required />
            <x-input-error :messages="$errors->get('runtime')" class="mt-2" />

            <div class="flex items-center gap-4 mt-3">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

            </div>

        </form>
    </div>

    </x-layout>
