<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;
    public $name;
    public $status;
    public $description;
    public $image;

    public function submit()
    {
        $this->validate(
            [
                'name' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Trường tên danh mục là bắt buộc.',
                'image.required' => 'Trường ảnh danh mục là bắt buộc.',
                'image.max' => 'Vui lòng chọn ảnh dưới 2MB',
                'image.mimes' => 'Ảnh không đúng định dạng',
            ]
        );
      
        if ($this->image) {
            $ext = $this->image->extension();
            $file_name = time() . '-' . 'category.' . $ext;
            $this->image->storeAs('uploads', $file_name, 'public');
            $this->image = $file_name;
        }
        $data = Category::create(
            [
                'name' => $this->name,
                'image' => $this->image,
                'status' => $this->status ?? 0,
                'description' => $this->description,
            ]
        );
        $data->save();
        $this->dispatch('success', 'Thêm danh mục thành công');
        $this->reset(['name', 'image', 'status', 'description']);
        $this->reset();

    }
    public function render()
    {
        return view('livewire.admin.category.create-category');
    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
