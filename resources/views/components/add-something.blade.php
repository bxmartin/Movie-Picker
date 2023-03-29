<div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
<!--modal content-->
<div class="relative sm:top-20 mx-auto p-5 border w-full sm:w-1/2 shadow-lg rounded-3xl bg-white">
	<div class="mt-3">

		<h2 class="px-4 mb-8 text-3xl font-bold text-center">Add Something to Watch</h2>
		<!-- <div class="px-7 pb-3">
			<p>
				What should we watch?
			</p>
		</div> -->
        <div class="sm:columns-2 mt-4 px-7">

            <form class="w-full">

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="title">
                      Title
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="type">
                        Type
                      </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type">
                      <option>Movie</option>
                      <option>Series</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="effort">
                        Effort level
                      </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="effort">
                      <option>Easy</option>
                      <option>Medium</option>
                      <option>Hard</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="genre">
                        Genre
                      </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="genre">
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
                    <label class="block text-gray-700 font-bold mb-2" for="length">
                      Runtime
                    </label>
                    <div class="flex"><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="length" type="number" placeholder="e.g. 92"> <p class="py-2 px-3">Minutes</p></div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="episodeCount">
                      Number of episodes
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="episodeCount" type="number" placeholder="e.g. 62">
                </div>

              </form>


        </div>
		<div class="items-center px-4 py-3">
			<button id="ok-btn" class="px-4 py-2 h-12 w-full text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-lg drop-shadow-md">
				Add this item
			</button>
		</div>
	</div>
</div>


</div>
