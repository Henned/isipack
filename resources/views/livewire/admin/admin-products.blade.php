<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Produkte') }}
    </h2>
</x-slot>
<div class="flex flex-col container mx-auto">
    <div class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
        <button class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition" wire:click="deleteAll()">Alle Produkte löschen</button>
    </div>
    <div class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
        <a href="{{ route('excel.export') }}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Produkte als Excel runterladen</a>
    </div>
    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Produkt
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kategory
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Preis
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="{{ route('admin.editproduct',['product_slug' => $product->slug]) }}" class="text-gray-900">{{$product->name}}</a>
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ Str::title(str_replace('-', ' ', $product->category_slug)) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$product->regular_price}}€
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <a href="{{ route('admin.editproduct',['product_slug' => $product->slug]) }}" class="text-gray-600 hover:text-gray-900"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="text-gray-600 hover:text-gray-900" wire:click="confirmItemDeletion({{$product->id}})" wire:loading.attr="disabled"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="confirmingItemDeletion">
        <x-slot name="title">
            {{ __('Produkt entfernen') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Sind Sie sich sicher, dass Sie das Produkt unwiderruflich entfernen möchten?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Abbrechen') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click.prevent="deleteItem({{ $confirmingItemDeletion }})" wire:loading.attr="disabled">
                {{ __('Produkt entfernen') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>