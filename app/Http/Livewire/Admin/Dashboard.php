<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{

    public function status($order_id)
    {
        Order::where('id', $order_id)->update(['status' => 'Wurde Geliefert']);
        
    }

    public function render()
    {
        $orders = Order::where('status', 'Bestellt')->get();
        return view('livewire.admin.dashboard', ['orders' => $orders])->layout('layouts.app');
    }
}
