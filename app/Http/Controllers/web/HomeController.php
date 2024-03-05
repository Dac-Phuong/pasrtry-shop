<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where('status', 1)->get();
        $products = Products::where('type', 0)->orderBy('created_at', 'desc')->take(6)->get();
        $cake_box = Products::where('type', 1)->take(3)->get();
        $bestSellingProducts = Products::where('type', 0)->orderBy('number_sold', 'desc')
        ->take(6)
        ->get();
        return view('web.layouts.home', ['category' => $category, 'products' => $products, 'cake_box' => $cake_box, 'bestSellingProducts' => $bestSellingProducts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
