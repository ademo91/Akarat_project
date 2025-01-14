<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <title>AKARAT</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="assets/logo.png" type="image/x-icon">


        <style>
  /* CSS to control visibility of SVG icons based on dark mode */
  .dark .light-icon {
    display: inline;
  }
  .dark .dark-icon {
    display: none;
  }
  .light-icon {
    display: none;
  }
  .dark-icon {
    display: inline;
  }
</style>
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900 text-black dark:text-gray-200">


    <nav class="bg-white dark:bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="{{ asset('assets/logo.png') }}" alt="Akarat" >
        </div>
        <div class="hidden sm:ml-6 sm:block">
        <div class="flex space-x-4">
  <div class="relative group">
    <a href="#"
       class="rounded-md px-3 py-2 text-sm font-medium text-black dark:text-gray-200 hover:text-mainColor relative after:absolute after:left-0 after:bottom-0 after:w-full after:h-0.5 after:bg-mainColor dark:after:bg-white after:transition-all after:duration-300 hover:after:w-full"
       aria-current="page">
      Home
    </a>
  </div>

  <div class="relative group">
    <a href="#"
       class="rounded-md px-3 py-2 text-md font-medium text-black dark:text-gray-200 hover:text-mainColor active:text-mainColor relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-0.5 after:bg-mainColor dark:after:bg-white after:transition-all after:duration-300 hover:after:w-full active:after:w-full">
      Developers
    </a>
  </div>

  <div class="relative group">
    <a href="#"
       class="rounded-md px-3 py-2 text-md font-medium text-black dark:text-gray-200 hover:text-mainColor active:text-mainColor relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-0.5 after:bg-mainColor dark:after:bg-white after:transition-all after:duration-300 hover:after:w-full active:after:w-full">
      Projects
    </a>
  </div>

  <div class="relative group">
    <a href="#"
       class="rounded-md px-3 py-2 text-md font-medium text-black dark:text-gray-200 hover:text-mainColor active:text-mainColor relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-0.5 after:bg-mainColor dark:after:bg-white after:transition-all after:duration-300 hover:after:w-full active:after:w-full">
      Calendar
    </a>
  </div>
</div>
</div>
</div>

      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

      <div class="ml-auto flex items-center">
        @if (auth()->check() && auth()->user())
        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
          <a href="dashboard">
            <h1>{{ Auth::user()->name }}</h1>  
          </a>
        </div>
        @else
        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
          <a href="{{route('login')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800  dark:text-white">Sign in</a>
          <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
          <a href="{{route('register')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800  dark:text-white">Register</a>
        </div>
        @endif

            {{-- <div class="sm:flex lg:ml-8 lg:flex">
                <img src="https://tailwindui.com/plus/img/flags/flag-canada.svg" alt="" class="block h-auto mr-2 w-5 flex-shrink-0">
                <select id="languages" class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="US">ENG</option>
                  <option value="AR">ARA</option>
                  <option value="FR">FRA</option>
                  <option value="SP">SPA</option>
                </select>
            </div> --}}

          </div>
      <div class="ml-auto flex items-center">
            <!-- dark mode toggle -->
            <button id="dark-mode-toggle" class='ml-5'>
                <div class="flex h-6 w-6 flex-none dark:bg-gray-800 items-center justify-center rounded-md bg-white shadow ring-1 ring-slate-900/10">
                  <!-- Light mode icon -->
                  <svg class="h-4 w-4 fill-slate-400 light-icon">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1C7 0.447715 7.44772 0 8 0C8.55228 0 9 0.447715 9 1V2C9 2.55228 8.55228 3 8 3C7.44772 3 7 2.55228 7 2V1ZM11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8ZM13.6563 2.34285C13.2658 1.95232 12.6326 1.95232 12.2421 2.34285L11.535 3.04996C11.1445 3.44048 11.1445 4.07365 11.535 4.46417C11.9255 4.85469 12.5587 4.85469 12.9492 4.46417L13.6563 3.75706C14.0469 3.36654 14.0469 2.73337 13.6563 2.34285ZM12.242 13.6563L11.5349 12.9492C11.1443 12.5587 11.1443 11.9255 11.5349 11.535C11.9254 11.1445 12.5585 11.1445 12.9491 11.535L13.6562 12.2421C14.0467 12.6326 14.0467 13.2658 13.6562 13.6563C13.2656 14.0468 12.6325 14.0468 12.242 13.6563ZM16 7.99902C16 7.44674 15.5523 6.99902 15 6.99902H14C13.4477 6.99902 13 7.44674 13 7.99902C13 8.55131 13.4477 8.99902 14 8.99902H15C15.5523 8.99902 16 8.55131 16 7.99902ZM7 14C7 13.4477 7.44772 13 8 13C8.55228 13 9 13.4477 9 14V15C9 15.5523 8.55228 16 8 16C7.44772 16 7 15.5523 7 15V14ZM4.46492 11.5352C4.0744 11.1447 3.44123 11.1447 3.05071 11.5352L2.3436 12.2423C1.95307 12.6329 1.95307 13.266 2.3436 13.6566C2.73412 14.0471 3.36729 14.0471 3.75781 13.6566L4.46492 12.9494C4.85544 12.5589 4.85544 11.9258 4.46492 11.5352ZM4.46477 3.04973C4.85529 3.44025 4.85529 4.07342 4.46477 4.46394C4.07424 4.85447 3.44108 4.85447 3.05055 4.46394L2.34345 3.75684C1.95292 3.36631 1.95292 2.73315 2.34345 2.34262C2.73397 1.9521 3.36714 1.9521 3.75766 2.34262L4.46477 3.04973ZM3 8C3 7.44772 2.55228 7 2 7H1C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9H2C2.55228 9 3 8.55228 3 8Z" fill="#38BDF8"></path>
                  </svg>
    
                  <!-- Dark mode icon -->
                  <svg class="h-4 w-4 fill-slate-400 dark-icon">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.23 3.333C7.757 2.905 7.68 2 7 2a6 6 0 1 0 0 12c.68 0 .758-.905.23-1.332A5.989 5.989 0 0 1 5 8c0-1.885.87-3.568 2.23-4.668ZM12 5a1 1 0 0 1 1 1 1 1 0 0 0 1 1 1 1 0 1 1 0 2 1 1 0 0 0-1 1 1 1 0 1 1-2 0 1 1 0 0 0-1-1 1 1 0 1 1 0-2 1 1 0 0 0 1-1 1 1 0 0 1 1-1Z"></path>
                  </svg>
                </div>
            </button>
          </div>
        </div>
          
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
      <div class="space-y-6 border-t border-gray-200 px-4 py-6">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900 dark:text-white">Sign in</a>
          </div>
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900 dark:text-white">Register</a>
          </div>
        </div>
    </div>
  </div>
</nav>




<!-- search bar from views/components/searsh-form.blade.php -->
@include('components.search-form')
<!--  -->
<!-- Properties list here  -->
@include('components.properties_List')


    </body>
</html>
