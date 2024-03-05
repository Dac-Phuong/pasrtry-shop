<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Customers;
use Livewire\Component;
use Livewire\WithPagination;

class ListCustomer extends Component
{
    use WithPagination;
    public $customers;
    public $search = '';
    public $perpage = 10;
    protected $listeners = [
        'success' => 'update',
        'delete' => 'delete'
    ];
    public function render()
    {
        return view('livewire.admin.customers.list-customer', ['list_customer' => Customers::search($this->search)->paginate($this->perpage)]);
    }
    public function update()
    {
        $this->customers = Customers::all();
    }
    public function delete($id)
    {
        $customer = Customers::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        $this->dispatch('success', 'Xóa người dùng thành công.');
    }
}
