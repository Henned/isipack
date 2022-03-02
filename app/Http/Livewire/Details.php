<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class Details extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function increase()
    {
        $this->qty += 1;
    }

    public function decrease()
    {
        if ($this->qty > 1) {
            $this->qty -= 1;
        }
    }

    public function store($product_id, $product_name, $product_price)
    {
        
        Cart::add($product_id, $product_name, $this->qty, $product_price)->associate(Product::class);
        $this->emit('some-event');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $productName = explode(' ',$product->name)[0];
        $product_version = Product::where('name', 'like', '%'.$productName . '%')->where('slug', '!=', $this->slug)->orderBy('regular_price', 'ASC')->get();
        $related_products = Product::where('category_slug',$product->category_slug)->where('slug', '!=', $this->slug)->inRandomOrder()->limit(4)->get();
        return view('livewire.details', ['product'=>$product, 'related_products' => $related_products, 'product_version' => $product_version])->layout('layouts.guest');
    }
}
