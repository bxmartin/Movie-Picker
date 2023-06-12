<x-app-layout>
    <section>
        <div class="my-8 container">

            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Edit your profile') }}
            </h2>

            <div class="w-full pb-6">
                <div class="p-4 mb-6 bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 mb-6 bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 mb-4 bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-app-layout>
