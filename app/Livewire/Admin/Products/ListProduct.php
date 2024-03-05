<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $products;
    public $list_category;
    public $gallery_images = [];
    public $search = '';
    public $perpage = 10;
    protected $listeners = [
        'delete' => 'delete',
    ];

    public function render()
    {
        $this->list_category = Category::get();
        return view('livewire.admin.products.list-product', [
            'list_product' => Products::search($this->search)->paginate($this->perpage)
        ]);
    }

    public function delete($id)
    {
        $product = Products::find($id);
        if (!is_null($product)) {
            $filePath = public_path('uploads/' . $product->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $product->delete();
        }
        $this->dispatch('success', 'Xóa sản phẩm thành công');
    }

}
