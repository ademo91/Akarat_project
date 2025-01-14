<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
     <link rel="icon" href="assets/logo.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <title>AKARAT</title>
</head>
<body class="dark:bg-slate-900">

    @if ($property_details)
        
    <div class="my-10 flex flex-wrap md:flex-nowrap justify-center items-start w-full max-w-screen-lg mx-auto p-8 gap-8 dark:bg-slate-800">
        <!-- Carousel Section -->
        <div id="default-carousel" class="relative w-full md:w-1/3" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
                @foreach ($Property_pictures as $picture)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('Properties_Pics/' . $picture->image_path) }}" loading="lazy" class="absolute block object-cover w-full h-full" alt="Property Image">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
                @if($Property_pictures->isNotEmpty())
                <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-3">
                    @foreach ($Property_pictures as $index => $picture)
                        <button 
                            type="button" 
                            class="w-3 h-3 rounded-full bg-gray-400 {{ $index === 0 ? 'bg-blue-600' : '' }}" 
                            aria-label="Slide {{ $index + 1 }}" 
                            data-carousel-slide-to="{{ $index }}">
                        </button>
                    @endforeach
                </div>
            @endif
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4" data-carousel-prev>
                <span class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"></path>
                    </svg>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4" data-carousel-next>
                <span class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 9l4-4-4-4"></path>
                    </svg>
                </span>
            </button>
        </div>

        <!-- Content Section -->
        <div class="w-full md:w-2/3 p-6 bg-gray-100 dark:bg-slate-800 rounded-lg shadow-lg dark:text-white">
            <h1 class="text-3xl font-bold mb-2 dark:text-white">{{ $property_details->title ?? 'No title available' }}</h1>
            <div class="flex direction-row">
                <h4 class="text-xl font-semibold text-blue-600 mb-4 mr-10">${{$property_details->price ?? 'No price available' }}</h4>
                <h4 class="text-xl font-thin text-gray-600 dark:text-gray-300 mb-4">{{$property_details->size ?? 'No price available' }}</h4>
            </div>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                {{$property_details->description ?? 'No Description available' }}    
            </p>
            <div class="">
                <h4 class="text-xl font-thin text-gray-600 dark:text-gray-300 mb-4">{{$property_details->city ?? 'No price available' }}</h4>
            </div>
            <div class="flex justify-center items-center mb-6">
                <iframe
                    class="rounded-md border-2 border-gray-300 w-full h-56"
                    src="{{ $property_details->location ?? 'about:blank' }}"
                    frameborder="0" 
                    loading="lazy">
                </iframe>
            </div>
            <div class="flex justify-center">
                <button class="px-40 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                    Chat With Owner
                </button>
            </div>
        </div>
    </div>
    @endif

</body>
</html>
