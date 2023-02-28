<x-layout.head />

<div class="container mx-auto">
    <div class="flex flex-row mt-8 overflow-hidden">
        <div class="basis-1/4">
            <div class=" bg-white shadow dark:bg-gray-800 sm:rounded p-5">
                <x-layout.side />
            </div>
        </div>
        <div class="basis-3/4 p-5">
            {{ $slot }}
        </div>
    </div>
</div>

<x-layout.foot />
