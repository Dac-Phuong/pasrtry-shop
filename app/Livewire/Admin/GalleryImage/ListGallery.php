<?php

namespace App\Livewire\Admin\GalleryImage;

use App\Models\Gallery_images;
use Livewire\Component;

class ListGallery extends Component
{
    public $gallery_images;
    public $search = '';
    public $perpage = 10;
    protected $listeners = [
        'success' => 'update',
        'delete' => 'delete'
    ];
    public function render()
    {
        return view('livewire.admin.gallery-image.list-gallery',['list_gallery' => Gallery_images::search($this->search)->paginate($this->perpage)]);
    }
    public function update()
    {
        $this->gallery_images = Gallery_images::all();
    }
    public function delete($id)
    {
        $gallery_images = Gallery_images::find($id);
        if (!is_null($gallery_images)) {
            Gallery_images::disk('public')->delete('gallery_images/' . $gallery_images->image);
            $gallery_images->image = null;
            $gallery_images->delete();
        }
        $this->dispatch('success', 'Xóa ảnh gallery thành công.');
    }
}
