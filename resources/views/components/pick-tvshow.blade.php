@if(isset($tvshow->image))
<img src="{{ asset('images/tvshows/' . $tvshow->image) }}" alt="" class="w-1/2 mx-auto rounded-lg">
@else
<img src="{{ asset('images/no-photo-available.png') }}" alt="no image" class="w-1/2 mx-auto rounded-lg">
@endif

<h3 class="text-2xl">{{ $tvshow->name }}</h3>

<p class="mb-2">Released: {{ $tvshow->releaseyear }}</p>

<p class="mb-2">Genre: {{ $tvshow->genre }}</p>

<p class="mb-2">{{ $tvshow->effort }}</p>
