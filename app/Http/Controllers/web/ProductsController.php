<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function detail($id)
    {
        // lấy ra chi tiết sản phẩm
        $product = Products::find($id);
        // lấy ra danh mục sản phẩm
        $category = Category::select('id', 'name')->get();
        // lấy ra sản phẩm liên quan
        $related_products = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('web.products.detail', ['product' => $product, 'related_products' => $related_products, 'category' => $category]);
    }
    public function products()
    {
        return view('web.products.index');
    }
    public function products_new()
    {
        return view('web.products.new');
    }
    public function products_selling()
    {
        return view('web.products.selling');
    }
    public function products_category($id)
    {
        // lấy ra sản phẩm thuộc danh mục ...
        $category = Category::find($id);
        return view('web.products.product-category', ['id' => $id,'category'=>$category]);
    }

}
