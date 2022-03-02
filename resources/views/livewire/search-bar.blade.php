<div class="relative">
    <form action="{{route('product.search')}}">
        <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>

            <input 
            autocomplete="off"
            wire:model="search" 
            name="search"  
            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:text-gray-800" 
            type="text" 
            placeholder="Search" 
            wire:keydown.escape="resetProducts"
         />
        </div>
    </form>


    @if (!empty($search))
        <div class="absolute z-10 list-group bg-white w-full rounded shadow-lg list-none dark:bg-gray-800" @click.away="$wire.resetProducts()">
            @if (!empty($products))
                @foreach ($products as $product)
                    <a href="{{ route('product.details', $product['slug']) }}">
                        <div class="flex items-center  space-x-2 text-gray-700 p-2 w-full rounded dark:text-white hover:bg-blue-100">
                            <div class="h-10 w-10 bg-cover bg-center bg-no-repeat" style="background-image: url('{{$product['image']}}')"></div>
                            <span>{{$product['name']}}</span>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    @endif
</div>

