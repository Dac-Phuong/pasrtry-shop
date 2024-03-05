<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;

    public $search = '';
    public $category;
    public $perpage = 10;
    protected $listeners = [
        'success' => 'update',
        'delete' => 'delete'
    ];
    public function render()
    {
        return view('livewire.admin.category.list-category', ['list_category' => Category::search($this->search)->paginate($this->perpage)]);
    }
    public function update()
    {
        $this->category = Category::all();
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            Storage::disk('public')->delete('uploads/' . $category->image);
            $category->image = null;
            $category->delete();
        }
        $this->dispatch('success', 'Xóa danh mục thành công.');
    }
}
