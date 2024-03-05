<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $order = Order::find($id);
        $order_customer = Order::where('customer_id', $order->customer_id)->get();
        $order_detail = OrderDetail::where('order_id', $id)->get();        foreach ($order_detail as $key => $item) {
            $item["product"] = Products::find($item->product_id);
        }
        return view('admin.order.order-detail', ['order_detail' => $order_detail, 'order' => $order, 'order_customer' => $order_customer]);
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
