@if(isset($tvshow->image))
<img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="" class="w-1/2 mx-auto rounded-lg">
@else
<img src="{{ asset('images/no-photo-available.png') }}" alt="no image" class="w-1/2 mx-auto rounded-lg">
@endif

<h3 class="text-2xl font-bold">{{ $tvshow->name }}</h3>

<p class="mb-2">Released: {{ $tvshow->releaseyear }}</p>

<p class="mb-2">Genre: {{ $tvshow->genre->name }}</p>

<p class="mb-2">
    @if($tvshow->effort =='Easy')
    <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-green-500" />
    @elseif($tvshow->effort =='Medium')
    <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-orange-500" />
    @elseif($tvshow->effort =='Hard')
    <x-heroicon-o-face-smile class="inline-block w-auto h-8 text-red-500" />
    @endif
</p>
