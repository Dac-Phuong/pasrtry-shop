<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $list_role;
    public $name;
    public $email;
    public $phone;
    public $role_name;
    public $password;
    public function submit()
    {

        $this->validate(
            [
                'name' => 'required|string|',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'Vui lòng nhập tên người dùng.',
                'email.required' => 'Vui lòng nhập địa chỉ email.',
                'email.unique' => 'Địa chỉ email này đã tồn tại.',
                'email.email' => 'Trường email phải là địa chỉ email hợp lệ.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu tối thiểu là 6 chữ số.',
            ]
        );
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role_name,
            'password' => Hash::make($this->password),
        ]);
        $user->save();
        $user->assignRole($this->role_name);
        $this->reset(['name', 'email', 'password', 'role_name']);
        $this->dispatch('success', 'Tạo người dùng mới thành công.');
        $this->reset();

    }
    public function render()
    {
        $this->list_role = Role::get();
        return view('livewire.admin.users.create-user');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
