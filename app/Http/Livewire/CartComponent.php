<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    protected $listeners = ['some-event' => '$refresh'];

    public function increaseQty($id)
    {
        Cart::update($id, Cart::get($id)->qty +1);
    }

    public function decreaseQty($id)
    {
        Cart::update($id, Cart::get($id)->qty -1);
    }

    public function removeItem($id)
    {
        Cart::remove($id);
    }


    public function render()
    {
        return view('livewire.cart-component');
    }
}
