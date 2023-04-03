var moviefire = document.getElementById("movie-fire");
var movieresult = document.getElementById("movie-result");
var tvshowfire = document.getElementById("tvshow-fire");
var tvresult = document.getElementById("tv-result");

moviefire.onclick = function(){
    tvresult.classList.add("hidden");
    window.livewire.emit('refreshMovie');
    movieresult.classList.remove("hidden");
};

tvshowfire.onclick = function(){
    movieresult.classList.add("hidden");
    window.livewire.emit('refreshTVShow');
    tvresult.classList.remove("hidden");
};

