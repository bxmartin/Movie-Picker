@if(isset($movie->image))
<img src="{{ asset('images/movies/' . $movie->image) }}" alt="" class="w-1/2 mx-auto rounded-lg">
@else
<img src="{{ asset('images/no-photo-available.png') }}" alt="no image" class="w-1/2 mx-auto rounded-lg">
@endif

<h3 class="text-2xl">{{ $movie->name }}</h3>

<p class="mb-2">Released: {{ $movie->releaseyear }}</p>

<p class="mb-2">Genre: {{ $movie->genre }}</p>

<p class="mb-2">{{ $movie->runtime }}min</p>

<p class="mb-2">{{ $movie->effort }}</p>

{{-- <p class="mb-2">Rating: {{ $movie->rating }}/10</p> --}}
