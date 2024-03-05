<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateCustomer extends Component
{
    public $full_name;
    public $email;
    public $phone;
    public $password;

    public function submit()
    {
        $this->validate(
            [
                'full_name' => 'required|string|',
                'email' => 'required|email|unique:customers,email',
                'password' => 'required|min:6',
                'phone' => 'required|numeric|regex:/^\d{10,}$/|unique:customers,phone',
            ],
            [
                'full_name.required' => 'Vui lòng nhập tên người dùng.',
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'phone.unique' => 'Số điện thoại đã tồn tại.',
                'phone.regex' => 'Định dạng trường điện thoại không hợp lệ.',
                'phone.required' => 'Vui lòng nhập số điện thoại.',
                'phone.numeric' => 'Vui lòng nhập chính xác số điện thoại',
                'email.unique' => 'Địa chỉ email này đã tồn tại.',
                'email.email' => 'Trường email phải là địa chỉ email hợp lệ.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu tối thiểu là 6 chữ số.',
            ]
        );
        $customer = Customers::create([
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);
        $customer->save();
        $this->dispatch('success', 'Thêm khách hàng thành công');
        $this->reset(['full_name', 'email', 'phone', 'password']);
        $this->reset();

    }
    public function render()
    {
        return view('livewire.admin.customers.create-customer');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
