<?php

namespace App\Livewire\Web\Header;

use App\Models\Cart;
use App\Models\Customers;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class HeaderHome extends Component
{
    public $full_name;
    public $phone;
    public $email;
    public $total = 0;
    public $password;
    public $customer;
    public $search = '';
    public $cart = [];
    public $isOpen = false;
    public $isOpenCart = false;
    public $isOpenRegister = false;
    protected $listeners = [
        'success' => 'render',
        'updateCart' => 'render',
    ];
    public function toggleLogin()
    {
        $this->isOpen = !$this->isOpen;
        $this->isOpenRegister = false;
        $this->isOpenCart = false;
    }
    public function toggleRegister()
    {
        $this->isOpenRegister = !$this->isOpenRegister;
        $this->isOpen = false;
        $this->isOpenCart = false;
    }
    public function toggleCart()
    {
        $this->isOpenCart = !$this->isOpenCart;
        $this->isOpenRegister = false;
        $this->isOpen = false;
    }
    public function closeMenu()
    {
        $this->isOpen = false;
    }
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Vui lòng nhập chính xác địa chỉ email.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Trường mật khẩu ít nhất 6 kí tự.',
        ]);
        $customer = Customers::where('email', $this->email)->first();
        if ($customer && Hash::check($this->password, $customer->password)) {
            session(['customer' => $customer]);
            $this->dispatch('success', 'Đăng nhập thành công !');
            $this->reset();
        } else {
            $this->dispatch('error', 'Đăng nhập không thành công ! Sai tài khoản hoặc mật khẩu');
        }
        $this->isOpen = false;

    }
    public function register()
    {
        $this->validate([
            'email' => 'required|email|unique:customers,email',
            'full_name' => 'required|string',
            'phone' => 'required',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.email' => 'Vui lòng nhập chính xác địa chỉ email.',
            'email.unique' => 'Email đã tồn tại vui lòng nhập email khác.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Trường mật khẩu ít nhất 6 kí tự.',
        ]);
        $dataCustomer = new Customers([
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);
        $dataCustomer->save();
        $this->dispatch('success', 'Đăng ký thành công !');
        $this->isOpenRegister = false;
        $this->reset();
    }
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

    public function render()
    {
        $this->customer = session()->get('customer');
        if ($this->customer) {
            $this->cart = Cart::where('customer_id', $this->customer->id)->get();
            foreach ($this->cart as $key => $item_cart) {
                $item_cart['product'] = Products::find($item_cart->product_id);
            }
        }
        return view('livewire.web.header.header-home', ['search_product' => Products::search($this->search)->paginate(10)]);
    }
}
