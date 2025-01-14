@extends('dashboard')

@section('content')
{{-- Content (Home) --}}
<div class="p-4 sm:ml-72">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
         <!-- search bar from views/components/searsh-form.blade.php -->
            @include('components.search-form-dashboard')
         <!--  -->
            @include('components.properties_List')
      </div>
<!-- Modal toggle (create property) -->
<button id='create-property-model-toggle' class="fixed bottom-5 right-5 dark:bg-white bg-mainColor dark:hover:bg-gray-300 hover:bg-blue-900 text-white font-bold p-4 rounded-full shadow-lg flex items-center justify-center">
   <svg class="w-6 h-6 dark:stroke-black stroke-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="12" cy="12" r="11" stroke-width="2" fill="none"/>
      <line x1="12" y1="6" x2="12" y2="18" stroke-width="2" stroke-linecap="round"/>
      <line x1="6" y1="12" x2="18" y2="12" stroke-width="2" stroke-linecap="round"/>
   </svg>
</button>
<!-- Modal toggle (create property) -->
   </div>
{{-- Content (Home) --}}
@endsection