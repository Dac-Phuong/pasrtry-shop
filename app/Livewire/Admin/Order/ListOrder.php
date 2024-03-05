<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListOrder extends Component
{
    use WithPagination;

    public $search = '';
    public $perpage = 10;
    public $orders;
    public $form_date;
    public $to_date;
    public $order;
    public $customer;
    public function mount()
    {
        $this->form_date = Carbon::now()->startOfMonth()->toDateString();
        $this->to_date = Carbon::now()->endOfMonth()->toDateString();
        $this->customer = session()->get('customer');
    }
    public function updateStatusOrder($id)
    {
        $this->order = Order::find($id);
        if ($this->order->status == 0) {
            $this->order->status = 1;
        } elseif ($this->order->status == 1) {
            $this->order->status = 2;
        } elseif ($this->order->status == 2) {
            $this->order->status = 3;
        }
        $this->order->save();
    }
    public function cancelOrder($id)
    {
        $this->order = Order::find($id);
        $this->order->status = 4;
        $this->order->save();
    }

    public function render()
    {
        return view('livewire.admin.order.list-order', [
            'list_order' => Order::search($this->search)->orderBy('created_at', 'desc')->paginate($this->perpage)
        ]);
    }
}
