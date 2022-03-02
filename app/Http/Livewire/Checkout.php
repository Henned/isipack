<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Checkout extends Component
{

    public function increaseQty($id)
    {
        Cart::update($id, Cart::get($id)->qty +1);
        $this->emit('some-event');
    }

    public function decreaseQty($id)
    {
        Cart::update($id, Cart::get($id)->qty -1);
        $this->emit('some-event');
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        $this->emit('some-event');
    }

    public function render()
    {
        return view('livewire.checkout')->layout('layouts.guest');
    }
}
