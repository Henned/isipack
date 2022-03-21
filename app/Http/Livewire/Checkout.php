<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{
    public $cartContent;

    public function mount()
    {
        $this->cartContent = Cart::content()->all();
    }

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
