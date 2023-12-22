<figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 flex flex-col items-center justify-center blur-sm hover:blur-none">
    <a href="#" class="relative">
        <img class="h-auto max-w-full rounded-lg transition-all duration-300 rounded-lg " src="{{ $src }}" alt="">
        <div class="absolute inset-0 flex items-center justify-center">
            <svg class="w-12 h-12 text-gray-50 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1.984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L2.506 1.139A1 1 0 0 0 1 1.984Z" />
            </svg>
        </div>
    </a>
    <figcaption class="absolute px-1 text-lg text-white hidden md:block bottom-1 text-center w-full backdrop-blur-none">
        <div class="flex flex-col justify-center items-center h-full">
            <div class="grid grid-cols-2 grid-rows-1 bg-gray-900 opacity-50 rounded-lg w-full p-2">
                <div class="flex flex-col justify-center">
                    <p class="text-gray-200 tracking-widest font-bold text-base text-left">{{ $title }}</p>
                    <p class="text-gray-50 tracking-tight font-extralight text-xs text-left">{{ $location }}</p>
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver más</button>
                </div>
            </div>
        </div>
    </figcaption>
</figure>
