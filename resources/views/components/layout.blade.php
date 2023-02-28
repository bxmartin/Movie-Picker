<x-layout.head />

<div class="container mx-auto">
    <div class="flex flex-row mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded">
        <div class="basis-1/4 px-4 ">
            <x-layout.side />
        </div>
        <div class="basis-3/4 px-4 ">
            {{ $slot }}
        </div>
    </div>
</div>

<x-layout.foot />
