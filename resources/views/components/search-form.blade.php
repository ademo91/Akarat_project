<!-- search bar -->
<div class="sticky top-1 left-0 z-50">
<form class="max-w-lg mx-auto mt-20" action="{{ route('filtering') }}" method="GET">
    @csrf
    <div class="flex">
        <select name="category" class="border border-gray-300 rounded-s-lg text-sm py-2 px-8 text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-white">
            <option value="">All categories</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
            @endforeach
        </select>

        <div class="relative w-full">
            <input type="search" name="city" id="search-dropdown" class="block p-4 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="City..." required />
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-mainColor rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-mainColor dark:hover:bg-blue-700 dark:border-mainColor dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>
</div>
<!-- navigation menu -->