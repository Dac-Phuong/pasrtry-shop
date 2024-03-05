<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UpdateRole extends Component
{
    public $permissions = [];
    public $role_name;
    public $role;

    protected $listeners = ['update' => 'mount'];
    public function mount($id = null)
    {
        $this->role = Role::find($id);
        if ($this->role) {
            $this->role_name = $this->role->name;
            $this->permissions = $this->role->permissions->pluck('name')->toArray();
        }
    }

    public function submit()
    {
        $this->validate([
            'role' => 'required',
            'permissions' => 'required|array',
        ], [
            'role.required' => 'Vui lòng nhập tên vai trò.',
        ]);
        $this->role->name = $this->role_name;
        $this->role->save();
        $this->role->syncPermissions($this->permissions);

        $this->dispatch('success', 'Sửa vai trò thành công');
    }
    public function render()
    {
        return view('livewire.admin.roles.update-role');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
