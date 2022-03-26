
<div class="container mx-auto py-12">
    <section class="container mx-auto py-12">
        <h2>Bestellinformationen</h2>
        <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden sm:shadow-lg my-5 table-auto">
          <thead class="text-white">
              <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row  mb-4 sm:mb-0">
                <th class="border-grey-light border text-left p-3 truncate">#</th>
                @if ($order->Firma)
                <th class="border-grey-light border text-left p-3 truncate">Firma</th>
                @endif
                <th class="border-grey-light border text-left p-3 truncate">Name</th>
                <th class="border-grey-light border text-left p-3 truncate">Preis</th>
                <th class="border-grey-light border text-left p-3 truncate">Bezahlstatus</th>
                <th class="border-grey-light border text-left p-3 truncate">Bestelldatum</th>
                <th class="border-grey-light border text-left p-3 truncate">Bestellstatus</th>
                <th class="border-grey-light border text-left p-3 truncate">Actions</th>
              </tr>
          </thead>
          <tbody class="flex-1 sm:flex-none">
                  <tr class="flex flex-col flex-no wrap sm:table-row mb-4 sm:mb-0">
                    <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $order->id}}</td>
                    @if ($order->Firma)
                    <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $order->Firma}}</td>
                    @endif
                    <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $order->Vorname}} {{$order->Nachname}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{number_format($order->orderItems->sum('total') , 2)}}€</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">
                        @if ($order->transaction->status === "COMPLETED")
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100"> Abgeschlossen </span>
                        @else
                            <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100"> Ausstehend </span>    
                        @endif
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{date('d-m-Y H:i', strtotime($order->created_at))}} Uhr</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{$order->status}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer flex justify-between" height="50px">
                      <button wire:click="status({{$order->id}})">Geliefert</button>
                    </td>
                  </tr>
          </tbody>
        </table>
    </section>
    <section class="container mx-auto py-12">
        <h2>Lieferinformationen</h2>
        <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden sm:shadow-lg my-5 table-auto">
          <thead class="text-white">
              <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row  mb-4 sm:mb-0">
                <th class="border-grey-light border text-left p-3 truncate">Firma</th>
                <th class="border-grey-light border text-left p-3 truncate">Name</th>
                <th class="border-grey-light border text-left p-3 truncate">E-Mail</th>
                <th class="border-grey-light border text-left p-3 truncate">Adresse</th>
                <th class="border-grey-light border text-left p-3 truncate">Postleitzahl</th>
                <th class="border-grey-light border text-left p-3 truncate">Stadt</th>
                <th class="border-grey-light border text-left p-3 truncate">Actions</th>
              </tr>
          </thead>
          <tbody class="flex-1 sm:flex-none">
                  <tr class="flex flex-col flex-no wrap sm:table-row mb-4 sm:mb-0">
                    <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $order->id}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $order->Vorname}} {{$order->Nachname}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{ $order->Email}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">
                        {{ $order->Straße}} {{ $order->Hausnummer}}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{ $order->Postleitzahl}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{ $order->Ort}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer flex justify-between" height="50px">
                      <button wire:click="status({{$order->id}})">Geliefert</button>
                    </td>
                  </tr>
          </tbody>
        </table>
    </section>
    <section class="container mx-auto py-12">
          <h2>Bestellung</h2>
        <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden sm:shadow-lg my-5 table-auto">
          <thead class="text-white">
            @foreach ($orderItems as $item)
              <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row  mb-4 sm:mb-0">
                <th class="border-grey-light border text-left p-3 truncate">Artikelnummer</th>
                <th class="border-grey-light border text-left p-3 truncate">Bestellung</th>
                <th class="border-grey-light border text-left p-3 truncate">Anzahl</th>
              </tr>
            @endforeach
          </thead>
          <tbody class="flex-1 sm:flex-none">
                @foreach ($orderItems as $item)
                <tr class="flex flex-col flex-no wrap sm:table-row mb-4 sm:mb-0">
                    <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $item->product->SKU}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-sm" height="50px">{{ $item->product->name}} {{$item->product->version}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{$item->quantity}}</td>
                </tr>
                @endforeach
          </tbody>
        </table>
    </section>
      
</div>
<style>

    @media (min-width: 640px) {
      table {
        display: inline-table !important;
      }
  
      thead tr:not(:first-child) {
        display: none;
      }
    }
  
    td:not(:last-child) {
      border-bottom: 0;
    }
  /* 
    th:not(:last-child) {
      border-bottom: 2px solid rgba(0, 0, 0, .1);
    } */
  </style>