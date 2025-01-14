@extends('dashboard')

@section('content')
{{-- Content (User Properties) --}}
<div class="p-4 sm:ml-72">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="dark:bg-gray-900 bg-gray-100">
         <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
             <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">My Properties</h2>

             @if($properties && !$properties->isEmpty())
             <div class="container mx-auto">
                 <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 xl:gap-x-8">
                     @foreach($properties as $property)
                     <div id="property-{{ $property->id }}" class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                         <a href="/property/{{ $property->id }}/details" target="_blank" rel="noopener noreferrer">
                             <div class="w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 sm:h-60 lg:h-80 xl:h-80">
                                 <!-- Check if pictures is not null and has any items -->
                                 <img src="{{ $property->pictures && $property->pictures->isNotEmpty() ? $property->pictures->first()->url : 'https://picsum.photos/200/300?grayscale' }}" 
                                      alt="{{ $property->title }}" 
                                      class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                             </div>
                             <div class="mt-4 flex justify-between">
                                 <div>
                                     <h3 class="text-md text-gray-700 dark:text-white font-semibold">
                                         {{ $property->title }}
                                     </h3>
                                     <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $property->description }}</p>
                                 </div>
                             </div>
                         </a>
                         <div class="mt-2">
                             <h4 class="text-md font-bold text-gray-900 dark:text-white">Pictures:</h4>
                             <div class="grid grid-cols-3 gap-2 mt-2">
                                 @if($property->pictures && $property->pictures->isNotEmpty())
                                     @foreach($property->pictures as $picture)
                                         <img src="{{ $picture->url }}" alt="Property Picture" class="h-20 w-full object-cover rounded">
                                     @endforeach
                                 @else
                                     <p class="text-sm text-gray-500 dark:text-gray-300">No pictures available</p>
                                 @endif
                             </div>
                         </div>
                     </div>
                     @endforeach
                 </div>
             </div>
             @else
             <p class="text-gray-500">No properties found for this user.</p>
             @endif
         </div>
     </div>
   </div>
</div>
{{-- Content (User Properties) --}}
@endsection
