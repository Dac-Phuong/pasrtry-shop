<?php

namespace App\Livewire\Admin\Products;

use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateGalleryImage extends Component
{
    use WithFileUploads;

    public $product;
    public $id;
    public $gallery_images = [];
    protected $listeners = [
        'update' => 'mount',
        'success' => 'render',
    ];
    public function mount($id = null)
    {
        $this->id = $id;
    }
    public function addImages()
    {
        $this->validate([
            'gallery_images.*' => 'image|max:2040',
        ]);
        if (is_array($this->gallery_images) && count($this->gallery_images) > 0 && $this->product) {
            foreach ($this->gallery_images as $image) {
                $ext = $image->extension();
                $file_name = time() . '-' . 'gallery_image.' . $ext;
                $image->storeAs('gallery_images', $file_name, 'public');
                // Retrieve the existing gallery_images array or initialize an empty array
                $galleryImages = json_decode($this->product->gallery_images, true) ?? [];

                // Append the new image to the existing gallery_images array
                $galleryImages[] = $file_name;

                // Update the product's gallery_images field
                $this->product->update(['gallery_images' => json_encode($galleryImages)]);
            }
            $this->reset('gallery_images');
            $this->dispatch('success', 'Thêm ảnh sản phẩm thành công');
        } else {
            $this->dispatch('error', 'Vui lòng chọn ít nhất một ảnh.');
        }

    }
    public function deleteImage($index)
    {
        if ($this->product) {
            $galleryImages = json_decode($this->product->gallery_images, true);
            if (isset($galleryImages[$index])) {
                $fileName = $galleryImages[$index];
                unset($galleryImages[$index]);
                $galleryImages = array_values($galleryImages);
                $this->product->update(['gallery_images' => json_encode($galleryImages)]);
                Storage::disk('public')->delete("uploads/{$fileName}");
            }
        } else {
            $this->dispatch('error', 'Không tìm thấy ảnh sản phẩm cần xóa');

        }

    }
    public function render()
    {
        $this->product = Products::find($this->id);
        return view('livewire.admin.products.create-gallery-image');
    }
}
