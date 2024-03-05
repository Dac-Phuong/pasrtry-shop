<?php

namespace App\Livewire\Admin\GalleryImage;

use App\Models\Gallery_images;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateGallery extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public function submit()
    {
        $this->validate(
            [
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'Trường tên tiêu đề là bắt buộc.',
                'image.required' => 'Trường ảnh danh mục là bắt buộc.',
                'image.max' => 'Vui lòng chọn ảnh dưới 2MB',
                'image.image' => 'Trường hình ảnh phải là một hình ảnh.',
                'image.mimes' => 'Vui lòng chọn một trong những đinh dạng sau, jpeg,png,jpg,gif.',
            ]
        );
        if ($this->image) {
            $ext = $this->image->extension();
            $file_name = time() . '-' . 'gallery_images.' . $ext;
            $this->image->storeAs('gallery_images', $file_name, 'public');
            $this->image = $file_name;
        }
        $gallery = Gallery_images::create([
            'title' => $this->title,
            'image' => $this->image,
        ]);
        $gallery->save();
        $this->dispatch('success', 'Thêm ảnh gallery thành công');
        $this->reset(['title', 'image']);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.gallery-image.create-gallery');
    }
}
