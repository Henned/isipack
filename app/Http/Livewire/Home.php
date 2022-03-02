<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $products = Product::inRandomOrder()->limit(10)->get();
        return view('livewire.home',['products'=>$products])->layout('layouts.guest');
    }
}
