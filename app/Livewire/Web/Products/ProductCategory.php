<?php

namespace App\Livewire\Web\Products;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class ProductCategory extends Component
{
    public $product_category;
    public $category;
    public $id;
    public $sortOrder = 'asc';
    public $sortField = 'price';
    public $showProductsUnder100k = false;
    public $showProducts100kTo300k = false;
    public $showProducts300kTo500k = false;
    public $showProducts500kTo1m = false;
    public $showProductsOver1m = false;
    public function mount($id)
    {
        $this->category = Category::find($id);
        $this->id = $id;
    }
    public function render()
    {
        $productsQuery = Products::query();
        if ($this->showProductsUnder100k) {
            $productsQuery->orWhere('price', '<=', 100000);
        }
        if ($this->showProducts100kTo300k) {
            $productsQuery->orWhereBetween('price', [100000, 300000]);
        }

        if ($this->showProducts300kTo500k) {
            $productsQuery->orWhereBetween('price', [300000, 500000]);
        }

        if ($this->showProducts500kTo1m) {
            $productsQuery->orWhereBetween('price', [500000, 1000000]);
        }

        if ($this->showProductsOver1m) {
            $productsQuery->orWhere('price', '>', 1000000);
        }
        $productsQuery->where('category_id', $this->id)->orderBy('price', $this->sortOrder);
        $this->product_category = $productsQuery->get();
        return view('livewire.web.products.product-category');
    }
}
