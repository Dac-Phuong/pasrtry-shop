<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_category = Category::get();
        return view('admin.products.create', ['list_category' => $list_category]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|',
                'price' => 'required|numeric',
                'file_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required',
                'sale' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm.',
                'sale.required' => 'Vui lòng nhập khuyến mãi.',
                'price.required' => 'Vui lòng nhập giá sản phẩm.',
                'price.numeric' => 'Giá sản phẩm phải là một số.',
                'file_upload.required' => 'Vui lòng chọn ảnh đại diện.',
                'file_upload.image' => 'Tệp tải lên phải là ảnh.',
                'file_upload.mimes' => 'Định dạng ảnh không hợp lệ. Chấp nhận các định dạng: jpeg, png, jpg, gif, svg.',
                'file_upload.max' => 'Kích thước ảnh không được vượt quá 2MB.',
                'category_id.required' => 'Vui lòng chọn danh mục.',
            ]
        );

        if ($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $image_product = $request->file('file_upload');
            $ext = $image->extension();
            $file_name_product = time() . '-' . 'product.' . $ext;
            $file_name = time() . '-' . 'gallery_image.' . $ext;
            $image->storeAs('gallery_images', $file_name, 'public');
            $image_product->move(public_path('uploads'), $file_name_product);
            $request->merge(['image' => $file_name_product]);
            $galleryImages[] = $file_name;
        }
        if ($request->hasFile('gallery_images')) {
            $originName = $request->file('gallery_images')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('gallery_images')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '_' . $extension;
            // Move the uploaded file to the 'public/uploads' directory
            $request->file('upload')->move(public_path('uploads'), $fileName);

            // Get the URL of the uploaded file
            $url = asset('uploads/' . $fileName);
            // Return a JSON response with file information
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
        Products::create(
            [
                'name' => $request->name,
                'image' => $request->image,
                'sale' => $request->sale,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'classification' => $request->classification,
                'gallery_images' => json_encode($galleryImages) ?? null
            ]
        );
        return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $list_category = Category::get();
        return view('admin.products.update', ['product' => $product, 'list_category' => $list_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|',
                'price' => 'required|numeric',
                'category_id' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm.',
                'price.required' => 'Vui lòng nhập giá sản phẩm.',
                'price.numeric' => 'Giá sản phẩm phải là một số.',
                'category_id.required' => 'Vui lòng chọn danh mục.',
            ]
        );
        $product = Products::find($id);
        $galleryImages = null;
        if ($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $image_product = $request->file('file_upload');
            $ext = $image->extension();
            $file_name_product = time() . '-' . 'product.' . $ext;
            $file_name = time() . '-' . 'gallery_image.' . $ext;
            $image->storeAs('gallery_images', $file_name, 'public');
            $image_product->move(public_path('uploads'), $file_name_product);
            $request->merge(['image' => $file_name_product]);
            $galleryImages[] = $file_name;
        }
        if ($request->hasFile('gallery_images')) {
            $originName = $request->file('gallery_images')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('gallery_images')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '_' . $extension;
            // Move the uploaded file to the 'public/uploads' directory
            $request->file('upload')->move(public_path('uploads'), $fileName);

            // Get the URL of the uploaded file
            $url = asset('uploads/' . $fileName);
            // Return a JSON response with file information
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
        $product->update([
            'name' => $request->name,
            'image' => $request->image ?? $product->image,
            'sale' => $request->sale ?? 0,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'classification' => $request->classification,
            'gallery_images' => $galleryImages != null ? json_encode($galleryImages) : $product->gallery_images
        ]);
        return redirect()->route('list-product')->with('success', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
