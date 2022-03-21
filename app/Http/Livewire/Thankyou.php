<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Thankyou extends Component
{

    public function render()
    {
        Cart::destroy();
        return view('livewire.thankyou')->layout('layouts.guest');
    }
}
