<div  :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in hidden'" class="fixed z-10 right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300 dark:bg-gray-800 dark:text-white">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700 dark:text-white">Warenkorb</h3>
        <button @click="cartOpen = !cartOpen" class="text-gray-600 dark:text-white focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <hr class="my-3">
    @if (Cart::count() > 0)
    @foreach (Cart::content() as $item)
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" src=" {{ $item->model->image }} " alt="{{ $item->name }}">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600 dark:text-white">{{ $item->name }}</h3>
                    <div class="flex items-center mt-2">
                        <button wire:click.prevent="increaseQty('{{$item->rowId}}')" class="text-gray-500 dark:text-white focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 dark:text-white mx-2">{{ $item->qty }}</span>
                        <button wire:click.prevent="decreaseQty('{{$item->rowId}}')" class="text-gray-500 dark:text-white focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-gray-600 dark:text-white">{{ number_format((float) $item->price * $item->qty , 2)}}€</span>
            <button wire:click.prevent="removeItem('{{ $item->rowId }}')" class="text-gray-600 dark:text-white focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endforeach
    <a href="{{ route('checkout') }}" class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
        <span>Checkout</span>
        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
    </a>
    @else
    <div class="flex justify-between mt-6">
        <div class="flex">
            <div class="mx-3">
                <div class="flex flex-col items-center mt-2">
                    <h3 class="text-lg">Dein Warenkorb ist noch leer!</h3>
                    <p class="text-center mt-2">
                        Änder das jetzt und fülle ihn mit Artikeln aus unserem <a class="text-blue-500" href=" {{ route('shop') }} ">Shop</a>!
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>