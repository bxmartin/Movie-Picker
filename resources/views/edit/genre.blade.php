<x-app-layout>

    <section>
        <div
            class="my-8 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200 mb-4">
                {{ __('Edit a genre') }}
            </h2>

            @if (session('status'))
                <div class="px-5">
                    <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <form method="POST" action="/genre/{{ $genre->id }}/update" class="w-full pb-6"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="!inline-block" required /><span
                        class="inline-block font-bold">*</span>
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                        :value="old('name', $genre->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center mt-3">
                    <x-primary-button class="">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>

            </form>

        </div>

    </section>

</x-app-layout>
