<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $role;
    public $permissions = [];
    public function submit()
    {
        $this->validate([
            'role' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ], [
            'role.required' => 'Vui lòng nhập tên vai trò.',
            'role.unique' => 'Tên vai trò đã tồn tại.',
        ]);

        $role = Role::create(['name' => $this->role]);
        $role->syncPermissions($this->permissions);
        
        $this->reset(['role', 'permissions']);
        $this->dispatch('success', 'Thêm vai trò thành công');
    }
    public function render()
    {
        return view('livewire.admin.roles.create-role');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
