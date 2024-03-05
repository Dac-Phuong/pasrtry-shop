<?php

namespace App\Livewire\Web\Account;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use Livewire\Component;

class AccountInfo extends Component
{
    public $customer;
    public $order;
    protected $listeners = [
        'success' => 'render',
    ];
    public function logout()
    {
        $customerId = optional(session('customer'))->id;
        if ($customerId) {
            session()->forget('customer');
        }
        $this->dispatch('success', 'Đăng xuất thành công !');
        $this->reset();
        return Redirect::to('/');
    }
    public function render()
    {
        $this->customer = session()->get('customer');
        $this->order = Order::where('customer_id', $this->customer->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.web.account.account-info');
    }
}
  
