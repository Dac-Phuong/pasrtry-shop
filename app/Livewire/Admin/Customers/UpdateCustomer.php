<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateCustomer extends Component
{
    public $full_name;
    public $email;
    public $phone;
    public $password;
    public $customer;
    protected $listeners = ['update' => 'mount'];
    public function mount($id = null)
    {
        $this->customer = Customers::find($id);
        if ($this->customer) {
            $this->full_name = $this->customer->full_name;
            $this->email = $this->customer->email;
            $this->phone = $this->customer->phone;
        }
    }
    public function submit()
    {
        $this->validate(
            [
                'full_name' => 'required|string|',
                'email' => 'required|email',
                'phone' => 'required|numeric|regex:/^\d{10,}$/',
            ],
            [
                'full_name.required' => 'Vui lòng nhập tên người dùng.',
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'phone.regex' => 'Định dạng trường điện thoại không hợp lệ.',
                'phone.required' => 'Vui lòng nhập số điện thoại.',
                'phone.numeric' => 'Vui lòng nhập chính xác số điện thoại',
                'email.email' => 'Trường email phải là địa chỉ email hợp lệ.',
            ]
        );
        $this->customer->full_name = $this->full_name;
        $this->customer->email = $this->email;
        $this->customer->phone = $this->phone;
        if ($this->password) {
            $this->customer->password = Hash::make($this->password);
        }
        $this->customer->save();
        $this->dispatch('success', 'Sửa khách hàng thành công.');

    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.admin.customers.update-customer');
    }
}
