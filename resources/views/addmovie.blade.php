<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add a movie') }}
        </h2>
    </x-slot>

    <div class="flex justify-center sm:my-8">

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('createmovie') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="genre" :value="__('Genre')" />
                <select id="genre"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    type="text" name="genre" :value="old('genre')" required>
                    <option value="Action">Action</option>
                    <option value="Animation">Animation</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Horror">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                </select>
                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="releaseyear" :value="__('Release Year')" />
                <x-text-input id="releaseyear" class="block w-full mt-1" type="number" name="releaseyear"
                    :value="old('releaseyear')" required />
                <x-input-error :messages="$errors->get('releaseyear')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="runtime" :value="__('Runtime')" />
                <x-text-input id="runtime" class="block w-full mt-1" type="number" name="runtime"
                    :value="old('runtime')" required />
                <x-input-error :messages="$errors->get('runtime')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="watched" :value="__('Watched')" />
                <input name="watched" type="checkbox" value="0">
                <x-input-error :messages="$errors->get('watched')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4 mt-3">
                <button type="submit"
                    class="px-10 py-2 text-xs font-semibold text-white uppercase bg-blue-500 rounded-2xl hover:bg-blue-600">
                    Add
                </button>

            </div>

        </form>
    </div>

    </x-layout>
