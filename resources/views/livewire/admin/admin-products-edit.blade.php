<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __($name.' bearbeiten') }}
    </h2>
</x-slot>
<div class="container mx-auto mt-12">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-5xl">Produkt bearbeiten</h1>
            <form class="flex flex-col " action="" wire:submit.prevent="updateItem"> 
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <input required wire:model.lazy="name" type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" >
                    </div>
                </div>
                <div>
                    <label for="version" class="block text-sm font-medium text-gray-700">Version</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <input required wire:model.lazy="version" type="text" name="version" id="version" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" >
                    </div>
                </div>
                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700">Kurze Beschreibung</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <input  wire:model.lazy="short_description" type="text" name="short_description" id="short_description" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" >
                    </div>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Beschreibung</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <input  wire:model.lazy="description" type="text" name="description" id="description" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" >
                    </div>
                </div>
                <div>
                    <label for="regular_price" class="block text-sm font-medium text-gray-700">Preis</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <input required wire:model.lazy="regular_price" type="text" name="regular_price" id="regular_price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" >
                    </div>
                </div>
                <div>
                    <label for="sale_price" class="block text-sm font-medium text-gray-700">Preis im Angebot</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                      <input  wire:model.lazy="sale_price" type="text" name="sale_price" id="sale_price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" >
                    </div>
                </div>
                <div>
                    <label for="featured" class="block text-sm font-medium text-gray-700">Im Angebot?</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <select required wire:model.lazy="featured" name="featured" id="featured" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                            <option value="1">Ja</option>
                            <option value="0">Nein</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="stock_status" class="block text-sm font-medium text-gray-700">Verfügbarkeit</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <select required wire:model.lazy="stock_status" name="stock_status" id="stock_status" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                            <option value="in">Verfügbar</option>
                            <option value="out">Ausverkauft</option>                                 
                        </select>
                    </div>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategory</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <select required wire:model="category" name="category" id="category" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">                              
                            @foreach ($categories as $item)
                                <option  value="{{$item->slug}}">{{$item->name}}</option>
                            @endforeach                                        
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full mt-3 flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 md:py-4 md:text-lg md:px-10">Speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>