<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;

class OrderDetails extends Component
{
    public $order_id;

    public function mount($id)
    {
        $this->order_id = $id;
    }

    public function render()
    {
        
        $order = Order::find($this->order_id);
        $orderItems = OrderItem::where('order_id', $this->order_id)->get();
        return view('livewire.admin.order-details',['order' => $order, 'orderItems' => $orderItems])->layout('layouts.app');
    }
}
