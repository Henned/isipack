<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $perPage = 12;

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        $categories = Category::get();
        $products = Product::paginate($this->perPage);
        return view('livewire.shop', ['products' => $products, 'categories' => $categories])->layout('layouts.guest');
    }
}
