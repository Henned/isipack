<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search . '%')->get();
        return view('livewire.search-component', ['products'=>$products])->layout('layouts.guest');
    }
}
