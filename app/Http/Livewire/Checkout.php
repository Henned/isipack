<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{
    public $cartContent;
    public $shippingCost;

    public function mount(Request $request)
    {
        if ( !request()->is('/checkout') && Str::before(url()->previous(), '?') !=  url('/distance') ) {
            return redirect()->to('/distance');
        }

        $this->cartContent = Cart::content()->all();

        if ($request->distance > 20000) {
            $this->shippingCost = 20;
        }else{
            $this->shippingCost = 0;
        }
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
