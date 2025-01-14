<!-- Properties list here  -->
<div class="dark:bg-gray-900 bg-gray-100">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Properties List</h2>

        @if ($properties->isEmpty())
        <p class="text-gray-500">No properties available.</p>
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative">
                <div class="w-full rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 transition-opacity duration-300 sm:h-60 lg:h-80 xl:h-80">
                    <img src="https://picsum.photos/200/300?grayscale" alt="test-property" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
        
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-md text-gray-700 dark:text-white">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            House
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-white">2-rooms, <br> 1-bathroom, <br> 3-floors,</p>
                    </div>
                    <p class="text-lg font-bold text-gray-900 dark:text-white">10000$</p>
                </div>
        
                <!-- Like and Wishlist Buttons in a row under price -->
                <div class="mt-2 flex justify-between gap-x-4">
                    <!-- Like button -->
                    <button type="button" class="text-gray-600 hover:text-blue-500 flex items-center space-x-2" aria-label="Like this property" onclick="console.log('liked')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path>
                        </svg>
                        <span class="text-sm">Like</span>
                    </button>
        
                    <!-- Wishlist button -->
                    <button type="button" onclick="console.log('added to wishlist')" class="text-gray-600 hover:text-blue-500 flex items-center space-x-2" aria-label="Add this property to wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 3.121c1.095-1.095 2.872-1.095 3.968 0l.707.707.707-.707c1.095-1.095 2.872-1.095 3.968 0s1.095 2.872 0 3.968L12 15.832l-5.464-5.464a2.828 2.828 0 1 1 3.997-3.832l.588.589.707-.707z"></path>
                        </svg>
                        <span class="text-sm">Add to wishlist</span>
                    </button>
                </div>
            </div>
        </div>
        
            {{-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
            @else
            <div class="container mx-auto">
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4 xl:gap-x-8">
                    @foreach ($properties as $property)
                        <div id="property-{{ $property->id }}" class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                            <a href="{{ $property->id }}/Property_Details" target="_blank" rel="noopener noreferrer">
                                <!-- Check if the property has images -->
                                @php
                                    $firstImage = $property->propertyPics->first(); // Get the first image for the property
                                @endphp
            
                                @if ($firstImage)
                                    <!-- Display the first image if available -->
                                    <div class="w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 sm:h-60 lg:h-80 xl:h-80">
                                        <img src="{{ asset('Properties_Pics/' . $firstImage->image_path) }}" alt="{{ $property->title }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                @else
                                    <!-- Display a placeholder image if no image is available -->
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:h-80">
                                        <img src="https://picsum.photos/200/300?grayscale" alt="{{ $property->title }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                @endif
            
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
            
                            <!-- Like and Wishlist Buttons -->
                            <div class="mt-2 flex justify-between">
                                <!-- Like button -->
                            <form action="{{ route('Like_property', $property->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                <button type="submit" class="text-gray-600 hover:text-blue-500 flex items-center space-x-2">
                                    @if(auth()->check() && auth()->user()->likes()->where('property_id', $property->id)->exists())
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" viewBox="0 0 24 24">
                                            <path d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z"/>
                                        </svg>                                      
                                    @else
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                        </svg>
                                    @endif
                                    @if (session('propertyId') == $property->id)
                                        {{ session('likeCount') }}
                                    @else
                                        {{ $property->likes->count() }}
                                    @endif
                                </button>
                            </form>
                                <!-- Wishlist button -->
                                <form action="{{ route('wish_property', $property->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                <button type="submit" class="text-gray-600 hover:text-blue-500 flex items-center space-x-2">
                                    @if(auth()->check() && auth()->user()->Wishlists()->where('property_id', $property->id)->exists()) 
                                      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z"/>
                                      </svg>  
                                      @else
                                      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/>
                                      </svg>                                     
                                  @endif                                
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
<script>
    // JavaScript to maintain scroll position
    document.addEventListener("DOMContentLoaded", function() {
        // If there is a hash in the URL, scroll to that position
        if (window.location.hash) {
            const hash = window.location.hash;
            const element = document.querySelector(hash);
            if (element) {
                window.scrollTo(0, element.offsetTop);
            }
        }
    });
    
    // Preserve the scroll position before the page reloads
    window.addEventListener('beforeunload', function() {
        sessionStorage.setItem('scrollPosition', window.scrollY);
    });
    
    // Restore scroll position after page reload
    document.addEventListener('DOMContentLoaded', function() {
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
        }
    });
</script>