<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateCategory extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $category;
    public $status;
    public $description;
    protected $listeners = ['update' => 'mount'];

    public function mount($id = null)
    {
        $this->category = Category::where('id', $id)->first();
        if ($this->category) {
            $this->name = $this->category->name;
            $this->description = $this->category->description;
            $this->status = $this->category->status;
        }
    }
    public function submit()
    {
        $this->validate(
            [
                'name' => 'required|string',
            ],
            [
                'name.required' => 'Trường tên tên danh mục là bắt buộc.',
            ]
        );
        if ($this->image) {
            Storage::disk('public')->delete('uploads/' . $this->category->image);
            $ext = $this->image->extension();
            $file_name = time() . '-' . 'category.' . $ext;
            $this->image->storeAs('uploads', $file_name, 'public');
            $this->image = $file_name;
        }
        $this->category->name = $this->name;
        $this->category->status = $this->status;
        $this->category->description = $this->description;
        if ($this->image) {
            $this->category->image = $this->image;
        }
        $this->category->save();
        $this->dispatch('success', 'Sửa danh mục thành công');
        $this->reset(['name', 'image', 'status', 'description']);
    }
    public function render()
    {
        return view('livewire.admin.category.update-category');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
