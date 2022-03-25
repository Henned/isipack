<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        $orders = Order::get();
        return view('livewire.admin.dashboard', ['orders' => $orders])->layout('layouts.app');
    }
}
