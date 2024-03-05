<?php

namespace App\Livewire\Web\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;

class ProductAll extends Component
{
    use WithPagination;
    public $perpage = 20;
    public $products;
    public $sortOrder;
    public $showProductsUnder100k = false;
    public $showProducts100kTo300k = false;
    public $showProducts300kTo500k = false;
    public $showProducts500kTo1m = false;
    public $showProductsOver1m = false;
    public function render()
    {
        $productsQuery = Products::query();

        if ($this->showProductsUnder100k) {
            $productsQuery->where('price', '<=', 100000);
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
        if ($this->sortOrder) {
            $productsQuery->when($this->sortOrder, function ($query, $sortOrder) {
                return $query->orderBy('price', $sortOrder);
            });
        }
        $this->products = $productsQuery->get();

        return view('livewire.web.products.product-all');
    }
}
