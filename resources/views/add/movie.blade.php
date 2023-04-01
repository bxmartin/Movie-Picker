<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add a movie') }}
        </h2>
    </x-slot>

    <section>
        <div
            class="grid col-span-12 gap-4 pt-6 my-8 border-l-4 border-indigo-400 md:col-span-6 lg:col-span-4 md:order-1 xl:gap-6">

            @if(session('status'))
            <div class="px-5">
                <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    {{ session('status') }}
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('createmovie') }}" class="w-full px-8 pb-6 md:w-1/2" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                        :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <input class="block w-full mt-1" id="image" type="file" name="image"
                    :value="old('image')" required />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
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
                    <x-text-input id="releaseyear" class="block w-auto mt-1" type="number" name="releaseyear"
                        :value="old('releaseyear')" required />
                    <x-input-error :messages="$errors->get('releaseyear')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="runtime" :value="__('Runtime')" />
                    <x-text-input id="runtime" class="block w-auto mt-1" type="number" name="runtime"
                        :value="old('runtime')" required />
                    <x-input-error :messages="$errors->get('runtime')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="effort" :value="__('Effort')" />
                    <select id="effort"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                        type="text" name="effort" :value="old('effort')" required>
                        <option value="Easy">Easy</option>
                        <option value="Medium">Medium</option>
                        <option value="Hard">Hard</option>
                    </select>
                    <x-input-error :messages="$errors->get('effort')" class="mt-2" />
                </div>
                <div class="flex items-center mb-4">
                    <x-checkbox name="watched" id="watched" value="0" />
                    <x-input-label for="watched" :value="__('Watched')"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" />
                    <x-input-error :messages="$errors->get('watched')" class="mt-2" />
                </div>

                <div class="flex items-center mt-3">
                    <x-primary-button class="">
                        {{ __('Add new movie') }}
                    </x-primary-button>
                </div>

            </form>
        </div>

    </section>

    </x-layout>
