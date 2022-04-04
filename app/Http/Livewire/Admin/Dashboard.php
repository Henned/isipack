<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{
    public $bookingStatus = 'Bestellt';

    public function status($order_id, $status)
    {
        if ($status === "Bestellt") {
            Order::where('id', $order_id)->update(['status' => 'Wurde Geliefert']);
        }elseif ($status === "Wurde Geliefert"){
            Order::where('id', $order_id)->update(['status' => 'Bestellt']);
        }
    }

    public function render()
    {
        $orders = Order::where('status', $this->bookingStatus)->get();
        return view('livewire.admin.dashboard', ['orders' => $orders])->layout('layouts.app');
    }
}
