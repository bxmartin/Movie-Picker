let moviefire = document.getElementById('movie-fire');
let movieresult = document.getElementById('movie-result');

if ((moviefire !== null) && (movieresult !== null)) {
    moviefire.onclick = function () {
        tvresult.classList.add("hidden");
        window.livewire.emit('refreshMovie');
        movieresult.classList.remove("hidden");
    };
}

let tvshowfire = document.getElementById('tvshow-fire');
let tvresult = document.getElementById('tv-result');

if ((tvshowfire !== null) && (tvresult !== null)) {
    tvshowfire.onclick = function () {
        movieresult.classList.add("hidden");
        window.livewire.emit('refreshTVShow');
        tvresult.classList.remove("hidden");
    };
}
