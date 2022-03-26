<div class="flex items-center justify-center" >
  <section class="container mx-auto py-12">
    <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
      <thead class="text-white">
        @foreach ($orders as $order)
          <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-4 sm:mb-0">
            <th class="border-grey-light border text-left p-3 truncate">Name</th>
            <th class="border-grey-light border text-left p-3 truncate">Preis</th>
            <th class="border-grey-light border text-left p-3 truncate">Bezahlstatus</th>
            <th class="border-grey-light border text-left p-3 truncate">Bestelldatum</th>
            <th class="border-grey-light border text-left p-3 truncate">Bestellstatus</th>
            <th class="border-grey-light border text-left p-3 truncate">Actions</th>
          </tr>
        @endforeach
      </thead>
      <tbody class="flex-1 sm:flex-none">
        @if ($orders->count() > 0)
              @foreach ($orders as $order)
              <tr class="flex flex-col flex-no wrap sm:table-row mb-4 sm:mb-0">
                <td class="border-grey-light border hover:bg-gray-100 p-3" height="50px">{{ $order->Vorname}} {{$order->Nachname}}</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{number_format($order->orderItems->sum('total') , 2)}}€</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">
                    @if ($order->transaction->status === "COMPLETED")
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Abgeschlossen </span>
                    @else
                        <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"> Ausstehend </span>    
                    @endif
                </td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{date('d-m-Y H:i', strtotime($order->created_at))}} Uhr</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate" height="50px">{{$order->status}}</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer" height="50px">
                  <a href="{{ route('admin.details',['id'=>$order->id]) }}">Anzeigen</a>
                  <button wire:click="status({{$order->id}})">Geliefert</button>
                </td>
              </tr>
              @endforeach
            @else
                <tr>
                  <td colspan="6" class="text-center text-3xl py-4">
                    Keine neuen Bestellungen!
                  </td>
                </tr>
            @endif
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
