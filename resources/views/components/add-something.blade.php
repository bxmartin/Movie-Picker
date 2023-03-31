<div class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50" id="my-modal">
    <!--modal content-->
    <div class="relative w-full p-5 mx-auto bg-white border shadow-lg sm:top-20 sm:w-1/2 rounded-3xl">
        <div class="mt-3">

            <h2 class="px-4 mb-8 text-3xl font-bold text-center">Add Something to Watch</h2>

            <div class="mt-4 sm:columns-2 px-7">

                <form class="w-full">

                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-gray-700" for="title">
                            Title
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="title" type="text" placeholder="Title">
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-gray-700" for="type">
                            Type
                        </label>
                        <select
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="type">
                            <option>Movie</option>
                            <option>Series</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-gray-700" for="effort">
                            Effort level
                        </label>
                        <select
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="effort">
                            <option>Easy</option>
                            <option>Medium</option>
                            <option>Hard</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-gray-700" for="genre">
                            Genre
                        </label>
                        <select
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="genre">
                            <option>Action</option>
                            <option>Animation</option>
                            <option>Comedy</option>
                            <option>Drama</option>
                            <option>Fantasy</option>
                            <option>Horror</option>
                            <option>Sci-Fi</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-gray-700" for="length">
                            Runtime
                        </label>
                        <div class="flex"><input
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="length" type="number" placeholder="e.g. 92">
                            <p class="px-3 py-2">Minutes</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-bold text-gray-700" for="episodeCount">
                            Number of episodes
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="episodeCount" type="number" placeholder="e.g. 62">
                    </div>

                </form>


            </div>
            <div class="items-center px-4 py-3">
                <button id="ok-btn"
                    class="w-full h-12 px-4 py-2 text-lg font-medium text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-xl drop-shadow-md">
                    Add this item
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Grabs all the Elements by their IDs which we had given them
let modal = document.getElementById("my-modal");

let btn = document.getElementById("open-btn");

let button = document.getElementById("ok-btn");

// We want the modal to open when the Open button is clicked
btn.onclick = function () {
    modal.style.display = "block";
}
// We want the modal to close when the OK button is clicked
button.onclick = function () {
    modal.style.display = "none";
}

// The modal will close when the user clicks anywhere outside the modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

{{-- <script src="{{ asset('/scripts/modal-addsomething.js') }}">
    --}}
