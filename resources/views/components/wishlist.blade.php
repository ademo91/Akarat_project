@extends('dashboard')

@section('content')
{{-- Content (wishlist) --}}
<div class="p-4 sm:ml-72">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="dark:bg-gray-900 bg-gray-100">
         <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
             <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">My Wishlist</h2>
     
             @if ($wishlists->isEmpty())
             <p class="text-gray-500">No wishlist added.</p>
             @else
             <div class="container mx-auto">
                 <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 xl:gap-x-8">
                     @foreach ($wishlists as $wishlist)
                     @php
                         $property = $wishlist->property; // Access the property data
                     @endphp
                     <div id="property-{{ $property->id }}" class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                         <a href="/property/{{ $property->id }}/details" target="_blank" rel="noopener noreferrer">
                             <div class="w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 sm:h-60 lg:h-80 xl:h-80">
                                 <img src="{{ $property->image ?? 'https://picsum.photos/200/300?grayscale' }}" alt="{{ $property->title }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                             </div>
                             <div class="mt-4 flex justify-between">
                                 <div>
                                     <h3 class="text-md text-gray-700 dark:text-white font-semibold">
                                         {{ $property->title }}
                                     </h3>
                                     <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $property->city }}</p>
                                     <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ $property->size }}m²</p>
                                 </div>
                                 <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $property->price }}$</p>
                             </div>
                         </a>
                         <div class="mt-2 flex justify-between">
                             <!-- Like Button -->
                             <form action="{{ route('Like_property', $property->id) }}" method="POST">
                                 @csrf
                                 <button type="submit" class="text-gray-600 hover:text-blue-500">
                                     <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="{{ auth()->check() && auth()->user()->likes()->where('property_id', $property->id)->exists() ? 'red' : 'none' }}" viewBox="0 0 24 24">
                                         <path d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" stroke="currentColor" stroke-width="2" />
                                     </svg>
                                 </button>
                             </form>
                             <!-- Wishlist Button -->
                             <form action="{{ route('wish_property', $property->id) }}" method="POST">
                                 @csrf
                                 <button type="submit" class="text-gray-600 hover:text-blue-500">
                                     <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="{{ auth()->check() && auth()->user()->wishlists()->where('property_id', $property->id)->exists() ? 'currentColor' : 'none' }}" viewBox="0 0 24 24">
                                         <path d="M17 21l-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z" stroke="currentColor" stroke-width="2" />
                                     </svg>
                                 </button>
                             </form>
                         </div>
                     </div>
                     @endforeach
                 </div>
             </div>
             @endif
         </div>
     </div>        
   </div>
</div>
{{-- Content (wishlist) --}}
@endsection