<x-app-layout>

    <section>
        <div
            class="my-8 px-2 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4 text-center">
                {{ __('Edit a genre') }}
            </h2>

            <form method="POST" action="/genre/{{ $genre->id }}/update" class="w-full pb-6"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <x-inputs.label for="name" :value="__('Name')" class="!inline-block" required /><span
                        class="inline-block font-bold">*</span>
                    <x-inputs.text id="name" class="block w-full mt-1" type="text" name="name"
                        :value="old('name', $genre->name)" required autofocus />
                    <x-inputs.error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center mt-3">
                    <x-buttons.primary class="">
                        {{ __('Save') }}
                    </x-buttons.primary>
                </div>

            </form>

            <p>
                <x-links.secondary class="" :href="route('genres')">
                    {{ __('Go back to genre list') }}
                </x-links.secondary>
            </p>

        </div>

    </section>

</x-app-layout>
