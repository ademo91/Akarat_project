<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <div class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Available Properties</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($properties as $property)
                <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75">
                        <img src="https://via.placeholder.com/300" alt="Property Image" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $property->title }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $property->description }}</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Location: {{ $property->location }}</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">City: {{ $property->city }}</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Price: ${{ $property->price }}</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Size: {{ $property->size }} sqft</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Rooms: {{ $property->rooms }}</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Bathrooms: {{ $property->bathrooms }}</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Status: {{ $property->status }}</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Registerable: {{ $property->Registerable }}</p>
                    </div>
                </div>
                @endforeach
                <!-- More properties can be added here if needed -->
            </div>
        </div>
    </div>
</body>
</html>
