<?php

namespace App\Livewire\Web\Products;

use App\Models\Cart;
use App\Models\Products;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $item_Cart;
    public $quantity = 1;
    public $related_products;
    public function mount($product, $related_products)
    {
        $this->product = $product;
        $this->related_products = $related_products;
    }
    public function addToCart($id)
    {
        $product = Products::findOrFail($id);
        $customer = session('customer');
    
        if (!$customer) {
            $this->dispatch('error', 'Bạn chưa đăng nhập!. Hãy đăng nhập để mua sản phẩm');
            return;
        }
        $cart = Cart::where('customer_id', $customer->id)->where('product_id', $id)->first();
        if ($cart) {
            // If the cart already exists for this product and customer
            $cart->quantity += $this->quantity;
            $cart->total_money = $product->price * $cart->quantity;
            $cart->save();
        } else {
            // If the cart doesn't exist, create a new one
            $newCart = new Cart();
            $newCart->customer_id = $customer->id;
            $newCart->product_id = $product->id;
            $newCart->total_money = $product->price * $this->quantity;
            $newCart->quantity = $this->quantity;
            $newCart->save();
        }
    
        $this->dispatch('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    
    public function decrease()
    {
        if ($this->quantity > 1) {
            $this->quantity -= 1;
        }
    }
    public function increase()
    {
        $this->quantity += 1;
    }
    public function render()
    {
        return view('livewire.web.products.product-detail');
    }
}
