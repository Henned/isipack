<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Bestellungen
    </h2>
  </x-slot>
  <div class="flex justify-center mt-12">
    @foreach ($orders as $order)
      <div class="flex flex-col max-w-5xl border-2 rounded ">
        <div class="flex justify-between bg-gray-300 p-3">
          <div class="text-xs">
            <p class="uppercase">BESTELLUNG AUFGEGEBEN</p>
            <p>{{$order->created_at->formatLocalized('%d %B %Y')}}</p>
          </div>
          <div class="text-xs"> 
            <p class="uppercase">Summe</p>
            <p>EUR {{number_format($order->orderItems->sum('total') , 2)}}</p>
          </div>
          <div class="text-xs"> 
            <p class="uppercase">versandadresse</p>
            <p>{{ $order->Vorname}} {{$order->Nachname}}</p>
          </div>
          <div class="text-xs">
            <p class="uppercase">Bestellnummer</p>
            <p>{{ $order->order_id}}</p>
          </div>
        </div>
        <div class="flex justify-between p-3 space-x-4 bg-gray-100">
          <img class="w-24 h-24" src="{{$order->orderItems[0]->product->image}}" alt="">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum voluptate ex maiores cumque, inventore quas asperiores nesciunt ipsum reiciendis magnam dolorem libero dolore temporibus dignissimos nemo, totam perspiciatis dolor optio.</p>
        </div>
      </div>
    @endforeach
  </div>
  