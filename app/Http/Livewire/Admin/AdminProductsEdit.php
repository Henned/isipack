<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class AdminProductsEdit extends Component
{

    public $product;
    public $name;
    public $version;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $featured;
    public $category;
    
    public function mount($product_slug)
    {
        $this->product = Product::where('slug',$product_slug)->first();
        $product = $this->product;
        $this->name = $product->name;
        $this->version = $product->version;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->category = $product->category_slug;
    }

    public function updateItem()
    {
        $this->product->update([
            'name' => $this->name,
            'version' => $this->version,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'stock_status' => $this->stock_status,
            'featured' => $this->featured,
            'category_slug' => $this->category

        ]);
        redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-products-edit', ['categories' => $categories])->layout('layouts.app');
    }
}
