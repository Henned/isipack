<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class AdminProducts extends Component
{
    public $confirmingItemDeletion = false;

    public function deleteAll()
    {
        Category::query()->delete();
        Product::query()->delete();
    }

    public function confirmItemDeletion($id)
    {
        $this->confirmingItemDeletion = $id;
    }
    
    public function deleteItem($id)
    {
        Product::find($id)->delete();
        $this->confirmingItemDeletion = false;
    }

    public function render()
    {
        $products = Product::orderBy('category_slug', 'desc')->get();

        return view('livewire.admin.admin-products', ['products' => $products])->layout('layouts.app');
    }
}
