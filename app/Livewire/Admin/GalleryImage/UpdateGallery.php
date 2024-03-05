<?php

namespace App\Livewire\Admin\GalleryImage;

use App\Models\Gallery_images;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateGallery extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $gallery_images;
    protected $listeners = ['update' => 'mount'];

    public function mount($id = null)
    {
        $this->gallery_images = Gallery_images::where('id', $id)->first();
        if ($this->gallery_images) {
            $this->title = $this->gallery_images->title;
        }
    }
    public function submit()
    {
        $this->validate(
            [
                'title' => 'required|string',
            ],
            [
                'title.required' => 'Trường tên tên danh mục là bắt buộc.',
            ]
        );
        if ($this->image) {
            Storage::disk('public')->delete('gallery_images/' . $this->gallery_images->image);
            $ext = $this->image->extension();
            $file_name = time() . '-' . 'gallery.' . $ext;
            $this->image->storeAs('gallery_images', $file_name, 'public');
            $this->image = $file_name;
        }
        $this->gallery_images->title = $this->title;
        if ($this->image) {
            $this->gallery_images->image = $this->image;
        }
        $this->gallery_images->save();
        $this->dispatch('success', 'Sửa ảnh gallery thành công');
    }
    public function render()
    {
        return view('livewire.admin.gallery-image.update-gallery');
    }
}
