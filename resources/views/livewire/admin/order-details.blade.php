
<div class="container mx-auto py-12">
    <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full table-auto">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Preis</th>
                  <th class="px-4 py-3">Bezahlstatus</th>
                  <th class="px-4 py-3">Bestelldatum</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <tr class="text-gray-700">
                    <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold text-black">{{ $order->Vorname}} {{$order->Nachname}} </p>
                                @if ($order->Firma != null)
                                    <p class="text-xs text-gray-600">{{$order->Firma}}</p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{number_format($order->orderItems->sum('total') , 2)}}€</td>
                    <td class="px-4 py-3 text-xs border">
                        @if ($order->transaction->status === "COMPLETED")
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Abgeschlossen </span>
                        @else
                            <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"> Ausstehend </span>    
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm border">{{date('d-m-Y H:i', strtotime($order->created_at))}} Uhr</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full table-auto">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">Artikelnummer</th>
                    <th class="px-4 py-3">Bestellung</th>
                  <th class="px-4 py-3">Anzahl</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($orderItems as $item)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold text-black">{{ $item->product->SKU}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold text-black">{{ $item->product->name}} {{$item->product->version}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs border">
                            {{$item->quantity}}
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
</div>
