<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add a TV Show') }}
        </h2>
    </x-slot> --}}

    <section>
        <div
            class="my-8 px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 text-center">
                {{ __('Add a TV Show') }}
            </h2>

            @if(session('status'))
            <div class="px-5">
                <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    {{ session('status') }}
                </div>
            </div>
            @endif

        <form method="POST" action="{{ route('createtvshow') }}" class="w-full py-6" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <x-inputs.label for="name" :value="__('Name')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                <x-inputs.text id="name" class="block w-full mt-1" type="text" name="name"
                    :value="old('name')" required autofocus />
                <x-inputs.error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-inputs.label for="image" :value="__('Image')" class="!inline-block" />
                <input class="block w-full mt-1" id="image" type="file" name="image"
                :value="old('image')"/>
                <x-inputs.error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-inputs.label for="genre" :value="__('Genre')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                <select id="genre_id" name="genre_id"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    required>
                    @foreach (\App\Models\Genre::all()->sortBy('name') as $genre)
                    <option
                        value="{{ $genre->id }}"
                        {{ old('genre_id') == $genre->id ? 'selected' : '' }}
                    >{{ ucwords($genre->name) }}</option>
                @endforeach
                </select>
                <p>
                    <x-links.secondary :href="route('addgenre')" class="mt-3" target="_blank">
                        {{ __('Add a new genre') }}
                    </x-links.secondary>
                </p>
                <x-inputs.error :messages="$errors->get('genre')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-inputs.label for="releaseyear" :value="__('Release Year')" class="!inline-block"/>
                <x-inputs.text id="releaseyear" class="block w-auto mt-1" type="number" name="releaseyear"
                    :value="old('releaseyear')" />
                <x-inputs.error :messages="$errors->get('releaseyear')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-inputs.label for="seasons" :value="__('Seasons')" class="!inline-block" />
                <x-inputs.text id="seasons" class="block w-auto mt-1" type="number" name="seasons"
                    :value="old('seasons')" min="0" />
                <x-inputs.error :messages="$errors->get('seasons')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-inputs.label for="episodes" :value="__('Episodes')" class="!inline-block" />
                <x-inputs.text id="episodes" class="block w-auto mt-1" type="number" name="episodes"
                    :value="old('episodes')" min="0" />
                <x-inputs.error :messages="$errors->get('episodes')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-inputs.label for="effort" :value="__('Effort')" class="!inline-block" required /><span class="inline-block font-bold">*</span>
                <select id="effort"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    type="text" name="effort" :value="old('effort')" required>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
                <x-inputs.error :messages="$errors->get('effort')" class="mt-2" />
            </div>
            <div class="flex items-center mb-4">
                <x-inputs.checkbox name="watched" id="watched" value="0" />
                <x-inputs.label for="watched" :value="__('Watched')"
                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" />
                <x-inputs.error :messages="$errors->get('watched')" class="mt-2" />
            </div>

            <div class="flex items-center mt-3">
                <x-buttons.primary class="">
                    {{ __('Add new TV show') }}
                </x-buttons.primary>
            </div>

        </form>

    </div>

</section>

</x-layout>
