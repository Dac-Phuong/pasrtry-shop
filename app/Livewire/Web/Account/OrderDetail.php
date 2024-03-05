<?php

namespace App\Livewire\Web\Account;

use App\Models\Order;
use App\Models\OrderDetail as ModelsOrderDetail;
use App\Models\Products;
use Livewire\Component;

class OrderDetail extends Component
{
    public $order;
    public $order_detail;
    public $customer;
    public $total = 0;
    public $ship = 30000;
    public $id;
    public function mount($id)
    {
        $this->id = $id;
    }
    public function cancelOrder($id)
    {
        $this->order = Order::find($id);
        $this->order->status = 4;
        $this->order->save();
        $this->dispatch('success', 'Hủy đơn hàng thành công!');
    }

    public function render()
    {
        $this->order = Order::find($this->id);
        $this->customer = session()->get('customer');
        $this->order_detail = ModelsOrderDetail::where('order_id', $this->id)->get();
        
        foreach ($this->order_detail as $key => $item) {
            $item->product = Products::find($item->product_id);
        }
        return view('livewire.web.account.order-detail' );
    }
}
