@php
    $total = 0;
    $ship = 30000;
@endphp
@extends('admin.layouts.master')
@section('main')
    <div class="">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
                <h5 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">Đơn hàng #{{ $order->id }}
                </h5>
                <p class="text-body mb-1">Ngày mua: <span id="orderYear">{{ $order->created_at }}</span></p>
                <p class="text-body">Trạng thái đơn hàng:
                    @if ($order->status == 0)
                        <span id="orderYear">Chờ duyệt</span>
                    @elseif($order->status == 1)
                        <span id="orderYear">Đang giao hàng</span>
                    @elseif($order->status == 2)
                        <span id="orderYear">Đã hoàn thành</span>
                    @elseif($order->status == 3)
                        <span id="orderYear">Đang giao hàng</span>
                    @elseif($order->status == 4)
                        <span id="orderYear">Đã hủy</span>
                    @endif
                </p>
            </div>
        </div>
        <!-- Order Details Table -->
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Chi tiết đơn hàng</h5>
                    </div>
                    <div class="card-datatable table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <table class="datatables-order-details table border-top dataTable no-footer dtr-column"
                                id="DataTables_Table_0" style="width: 923px;">
                                <thead>
                                    <tr>
                                        <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                            style="width: 0px; display: none;" aria-label=""></th>

                                        <th class="w-50 sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 356px;" aria-label="Sản phẩm">Sản phẩm</th>
                                        <th class="w-25 sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 155px;" aria-label="Giá">Giá</th>
                                        <th class="w-25 sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 145px;" aria-label="Số lượng">Số lượng</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="min-width: 123px;"
                                            aria-label="Tổng tiền">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_detail as $key => $item)
                                        @php
                                            $total += ($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity;
                                        @endphp
                                        <tr class="odd">
                                            <td class="control" tabindex="0" style="display: none;"></td>
                                            <td class="sorting_1">
                                                <div class="d-flex justify-content-start align-items-center text-nowrap">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar me-2"><img
                                                                src="/uploads/{{ $item['product']->image }}" alt=""
                                                                class="rounded-2"></div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="text-body mb-0">{{ $item['product']->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span>{{ number_format($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) }}
                                                    vnđ</span>
                                            </td>
                                            <td><span class="text-body">{{ $item->quantity }}</span></td>
                                            <td>
                                                <h6 class="mb-0">
                                                    {{ number_format(($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity) }}
                                                    vnđ
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                            <div class="order-calculations">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100 text-heading">Tổng phụ:</span>
                                    <h6 class="mb-0">{{ number_format($total) }} vnđ</h6>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="w-px-100 text-heading">Phí ship:</span>
                                    <h6 class="mb-0">{{ number_format($ship) }} vnđ</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="w-px-100 mb-0">Tổng tiền:</h6>
                                    <h6 class="mb-0">{{ number_format($total + $ship) }} vnđ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title m-0">Chi tiết khách hàng</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-4">
                            <div class="avatar me-2">
                                <img src="../../assets/img/avatars/1.png"  alt="Avatar" class="rounded-circle">
                            </div>
                            <div class="d-flex flex-column">
                                <a href="app-user-view-account.html" class="text-body text-nowrap">
                                    <h6 class="mb-0">{{ $order->name }}</h6>
                                </a>
                                <small class="text-muted">Customer ID: #58909</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center mb-4">
                            <span
                                class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                    class="ti ti-shopping-cart ti-sm"></i></span>
                            <h6 class="text-body text-nowrap mb-0">{{ count($order_customer) }} Đơn hàng</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Thông tin liên lạc</h6>
                        </div>
                        <p class=" mb-1">Email: {{ $order->email }}</p>
                        <p class=" mb-0">Mobile: {{ $order->phone }}</p>
                    </div>
                </div>

                <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between">
                        <h6 class="card-title m-0">Địa chỉ giao hàng</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $order->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
