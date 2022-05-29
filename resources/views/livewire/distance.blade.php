<div>
    <form id="form" class="">
        @csrf
        <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
            <div class="w-full lg:w-3/4">
                <label for="street" class="block mb-3 text-sm font-semibold text-gray-500">Straße</label>
                <input required wire:model.lazy="street" name="street" id="street" type="text" placeholder="Straße"
                    class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="w-full lg:w-1/4 ">
                <label for="housenumber" class="block mb-3 text-sm font-semibold text-gray-500">Hausnummer</label>
                <input required wire:model.lazy="housenumber" name="housenumber" id="housenumber" type="text" placeholder="Hausnummer"
                    class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
        </div>
        <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
            <div class="w-full lg:w-1/2 ">
                <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                    Postleitzahl</label>
                <input required wire:model.lazy="postcode" name="postcode" id="postcode" type="text" placeholder="Postleitzahl"
                    class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="w-full lg:w-1/2">
                <label for="city"
                    class="block mb-3 text-sm font-semibold text-gray-500">Stadt</label>
                <input required wire:model.lazy="city" name="city" id="city" type="text" placeholder="Stadt"
                    class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
        </div>
        <button wire:click.prevent="getDistance()">Test</button>
    </form>
</div>
