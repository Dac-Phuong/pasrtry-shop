<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use App\Models\Products;
use Livewire\Component;

class ProductCart extends Component
{
    public $total = 0;
    public $customer;
    public $cart = [];
    protected $listeners = [
        'success' => 'render',
    ];
    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            $this->dispatch('error', 'Xóa sản phẩm thất bại!');
            return;
        }
        $cart->delete();
        $this->dispatch('success', 'Xóa sản phẩm thành công!');
    }
    public function decrease($id)
    {
        $customer = session('customer');
        $cart = Cart::where('product_id', $id)->where('customer_id', $customer->id)->first();
        $product = Products::find($id);
        if ($cart) {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
                $cart->total_money = ($product->price - ($product->sale / 100) * $product->price) * $cart->quantity;
                $cart->save();
                $this->dispatch('updateCart');
            }
        }
    }
    public function increase($id)
    {
        $customer = session('customer');
        $cart = Cart::where('product_id', $id)->where('customer_id', $customer->id)->first();
        $product = Products::find($id);
        if ($cart) {
            $cart->quantity += 1;
            $cart->total_money = ($product->price - ($product->sale / 100) * $product->price) * $cart->quantity;
            $cart->save();
            $this->dispatch('updateCart');
        }
    }
    public function render()
    {
        $this->customer = session()->get('customer');
        if ($this->customer) {
            $this->cart = Cart::where('customer_id', $this->customer->id)->get();
            foreach ($this->cart as $key => $item_cart) {
                $item_cart['product'] = Products::find($item_cart->product_id);
            }
        }
        return view('livewire.web.cart.product-cart');
    }
}
