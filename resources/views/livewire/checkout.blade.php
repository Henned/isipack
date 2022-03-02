<div class="container p-12 mx-auto">
    <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
        <div class="flex flex-col md:w-full">
            <h2 class="mb-4 font-bold md:text-xl text-heading ">Lieferdaten
            </h2>
            <form class="justify-center w-full mx-auto" method="post" action>
                <div class="">
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="company"
                                class="block mb-3 text-sm font-semibold text-gray-500">Firma</label>
                            <input name="Company" type="text" placeholder="Firma"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">First
                                Name</label>
                            <input name="firstName" type="text" placeholder="First Name"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                Name</label>
                            <input name="Last Name" type="text" placeholder="Last Name"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Email"
                                class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                            <input name="Email" type="email" placeholder="Email"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Address"
                                class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                            <textarea
                                class="w-full text-gray-700 px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                name="Address" cols="20" rows="4" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="city"
                                class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                            <input name="city" type="text" placeholder="City"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                Postcode</label>
                            <input name="postcode" type="text" placeholder="Post Code"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>

                    <div class="relative pt-3 xl:pt-6"><label for="note"
                            class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                            (Optional)</label><textarea name="note"
                            class="flex items-center w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
                            rows="4" placeholder="Notes for delivery"></textarea>
                    </div>
                    <div class="mt-4">
                        <button
                            class="w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900" wire:click.prevent="destroy()">Process</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
            <div class="pt-12 md:pt-0 2xl:ps-4">
                <h2 class="text-xl font-bold">Warenkorb
                </h2>
                <div class="mt-8">
                    <div class="flex flex-col space-y-4">
                        @foreach (Cart::content() as $item)
                        <div class="flex space-x-4">
                            <div>
                                <img src="{{$item->model->image}}" alt="{{$item->model->name}}" class="w-60">
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">{{$item->name}}</h2>
                                <p class="text-sm">{{$item->model->short_description}}</p>
                                <div class="flex items-center mt-2">
                                    <button wire:click.prevent="increaseQty('{{$item->rowId}}')" class="text-gray-500 dark:text-white focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                    <span class="text-gray-700 dark:text-white mx-2">{{ $item->qty }}</span>
                                    <button wire:click.prevent="decreaseQty('{{$item->rowId}}')" class="text-gray-500 dark:text-white focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                </div>
                                <span class="text-red-600">Preis</span> {{$item->price * $item->qty}}€
                            </div>
                            <div>
                                <svg wire:click.prevent="removeItem('{{$item->rowId}}')"  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
                <div class="flex p-4 mt-4">
                    <h2 class="text-xl font-bold">Artikel ({{ Cart::count() }})</h2>
                </div>
                <div
                    class="flex items-center w-full py-4 text-sm text-red-900 font-bold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-lg last:pb-0 dark:text-red-600">
                    Gesamtbetrag: <span class="ml-2"> {{ Cart::subtotal() }}</span></div>
            </div>
        </div>
    </div>
</div>