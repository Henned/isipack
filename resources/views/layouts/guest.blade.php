<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"    
    x-cloak
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <style>
            input:checked ~ .dot {
                transform: translateX(100%);
                background-color: #48bb78;
            }
            .flickity-page-dots .dot {
                background: transparent;
                border: 2px solid black;
            }
            /* fill-in selected dot */
            .flickity-page-dots .dot.is-selected {
                background: white;
            }
          
        </style>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


    </head>
    <body class="antialiased bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-white">
      <div x-data="{cartOpen: localStorage.getItem('cartOpen') === 'true', open: false}"
      x-init="$watch('cartOpen', val => localStorage.setItem('cartOpen', val))">
        <header class="bg-white dark:bg-gray-700">
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 dark:text-white md:flex md:items-center">
    
                        <label x-show="!open" for="toogleA" class="flex items-center cursor-pointer">
                            <x-heroicon-s-moon class="mt-3 h-6 w-6 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" />
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input x-model="darkMode" @click="darkMode = !darkMode"  id="toogleA" type="checkbox" class="sr-only"/>
                                <!-- line -->
                                <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- dot -->
                                <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                            </div>
                          <!-- label -->
                        </label>
                    </div>
                    <div class="w-full flex justify-center">
                      <a href="/">
                        <img :class="!darkMode ? 'block' : 'hidden'" src="{{ asset('logo2.png') }}" alt="Isipack der Verpackungsprofi">
                        <img :class="darkMode ? 'block' : 'hidden'" src="{{ asset('logo.png') }}" alt="Isipack der Verpackungsprofi">
                      </a>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <div @click.away="profileOpen = false" class="relative pt-2" x-data="{ profileOpen: false }">
                            <button @click="profileOpen = !profileOpen" class="text-gray-600 dark:text-white focus:outline-none mx-4 sm:pr-4 sm:mx-0 ">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none">
                                    <circle cx="12" cy="8" r="5"></circle>
                                    <path d="M3, 21 h18 C 21,12 3,12 3,21"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 dark:bg-gray-800" x-show="profileOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" >
                              <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('login') }}">Anmelden</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('register') }}">Registrieren</a>

                              </div>
                            </div>
                        </div>
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 dark:text-white focus:outline-none mx-4 sm:mx-0">
                            
                            <svg class="h-6 w-6 relative" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            
                        
                        </button>
        
                        <div class="flex sm:hidden">
                            <button @click="open = !open" type="button" class="text-gray-600 dark:text-white hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <nav :class="open ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                    <div class="flex flex-col sm:flex-row">
                        <a class="{{request()->routeIs('home') ? 'text-red-600' : 'text-gray-600 dark:text-white'}} mt-3 hover:underline sm:mx-3 sm:mt-0" href="{{ route('home') }}">Home</a>
                        <a class="mt-3 {{request()->routeIs('shop') ? 'text-red-600' : 'text-gray-600 dark:text-white'}} hover:underline sm:mx-3 sm:mt-0" href="{{ route('shop') }}">Shop</a>
                        <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                        <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                        <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
                        <label x-show="open" for="toogleA" class="flex justify-between items-center cursor-pointer">
                            <x-heroicon-s-moon class="mt-3 h-6 w-6 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" />
                            <!-- toggle -->
                            <div class="relative">
                              <!-- input -->
                              <input @click="darkMode = !darkMode" id="toogleA" type="checkbox" class="sr-only"/>
                              <!-- line -->
                              <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                              <!-- dot -->
                              <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                            </div>
                            <!-- label -->
                          </label>
                    </div>
                </nav>
                <div class="relative mt-6 max-w-lg mx-auto">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
        
                    <livewire:search-bar>
                </div>
            </div>
            
            {{-- Cart Start  --}}
            <livewire:cart-component >
            {{-- Cart End  --}}
          </header>
          <div class="container mx-auto py-12">
              {{ $slot }}
          </div>   
          <footer class="bg-gray-200 dark:bg-gray-800">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <div class="flex flex-col justify-between">
                    <h1 class="text-xl font-bold text-gray-500 hover:text-gray-400">isiPack</h1>
                    <address class="text-lg font-bold text-gray-500 hover:text-gray-400 not-italic">
                        Musterstraße 1 <br>
                        00000 Musterstadt
                    </address>
                    <div>
                        <a class="text-lg font-bold text-gray-500 hover:text-gray-400" href="">1</a>
                        <a class="text-lg font-bold text-gray-500 hover:text-gray-400" href="">1</a>
                        <a class="text-lg font-bold text-gray-500 hover:text-gray-400" href="">1</a>
                    </div>
                </div>
                <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>
      </div>
      @livewireScripts
      
    </body>
</html>
