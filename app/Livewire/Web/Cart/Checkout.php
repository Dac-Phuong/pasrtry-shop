<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use App\Models\Districts;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use App\Models\Provinces;
use App\Models\Wards;
use Livewire\Component;

class Checkout extends Component
{
    public $customer;
    public $provinces;
    public $province_id;
    public $districts;
    public $district_id;
    public $wards;
    public $ward_id;
    public $note;
    public $address;
    public $payment_method = true;
    public $isOpen = false;
    public $total = 0;
    public $ship = 30000;
    public $cart;
    public $name_provice;
    public $name_district;
    public $name_ward;
    protected $listeners = [
        'success' => 'render',
        'province_id' => 'mount',
    ];
    public function mount($id = null)
    {
        if($id){
            $this->province_id = $id;
        }
        $this->customer = session()->get('customer');
    }
    public function cashPayment()
    {
        $this->isOpen = false;
    }
    public function paymentBanking()
    {
        $this->isOpen = true;
    }
    public function submit()
    {
        $this->validate([
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'address' => 'required',
        ], [
            'province_id.required' => 'Vui lòng chọn tỉnh hoặc thành phố.',
            'address.required' => 'Vui lòng nhập chỉ cụ thể.',
            'district_id.required' => 'Vui lòng chọn quận huyện.',
            'ward_id.required' => 'Vui lòng chọn phường xã.',
        ]);
        $this->name_provice = Provinces::find($this->province_id)->name;
        $this->name_district = Districts::find($this->district_id)->name;
        $this->name_ward = Wards::find($this->ward_id)->name;
        $data_Order = Order::create([
            'name' => $this->customer->full_name,
            'email' => $this->customer->email,
            'phone' => $this->customer->phone,
            'customer_id' => $this->customer->id,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'note' => $this->note,
            'payment_method' => $this->isOpen == true ? 1 : 0,
            'address' => ($this->name_provice ?? '') . " - " . ($this->name_district ?? '') . " - " . ($this->name_ward ?? '') . " - " . ($this->address ?? ''),
            'status' => 0,
        ]);
        $data_Order->save();
        foreach ($this->cart as $item_cart) {
            $item_cart['product'] = Products::find($item_cart->product_id);
            $this->total += ($item_cart['product']->price - ($item_cart['product']->sale / 100) * $item_cart['product']->price) * $item_cart->quantity;
            $order_details = new OrderDetail([
                'product_name' => $item_cart['product']->name,
                'product_image' => $item_cart['product']->image,
                'quantity' => $item_cart->quantity,
                'product_id' => $item_cart->product_id,
                'order_id' => $data_Order->id,
                'total_money' => ($item_cart['product']->price - ($item_cart['product']->sale / 100) * $item_cart['product']->price) * $item_cart->quantity,
            ]);
            $item_cart['product']->number_sold = $item_cart->quantity;
            $item_cart['product']->save();
            $order_details->save();
        }
        $data_Order->total_money = $this->total + $this->ship;
        $data_Order->save();
        $order_details->save();
        $deleteCart = Cart::where('customer_id', $this->customer->id);
        $deleteCart->delete();
        $this->dispatch('success', 'Tạo đơn hàng thành công.');
        return $this->redirect('account/information', navigate: true);
    }
    public function render()
    {
        if ($this->customer) {
            $this->cart = Cart::where('customer_id', $this->customer->id)->get();
            foreach ($this->cart as $key => $item_cart) {
                $item_cart['product'] = Products::find($item_cart->product_id);
            }
        }
        $this->provinces = Provinces::get();
        $this->wards = Wards::where('district_id', $this->district_id)->get();
        $this->districts = Districts::where('province_id', $this->province_id)->get();
        return view('livewire.web.cart.checkout');
    }
}
