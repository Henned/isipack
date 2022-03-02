<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{
    public $search;
    public $products;
    
    public function mount()
    {
        $this->fill(request()->only('search'));
        $this->resetProducts();
    }

    public function resetProducts()
    {
        $this->products = [];
    }


    public function updatedSearch()
    {
        $this->products = Product::where('name', 'like', '%'.$this->search . '%')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
