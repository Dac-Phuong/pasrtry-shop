<div class="container-fluid my-4">
    <div class="heading-page clearfix">
        <h1 class="text-center">Chi tiết đơn hàng</h1>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-lg-8 col-box-shadow">
            <div class="mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0 py-3 pl-2" style="font-weight: 500">Thông tin sản phẩm</h5>
                </div>
                <div class=" table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <table class="datatables-order-details table border-top dataTable no-footer dtr-column"
                            id="DataTables_Table_0" style="width: 923px;">
                            <thead>
                                <tr>
                                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                        style="width: 0px; display: none;"></th>
                                    <th class="w-50 sorting_disabled" rowspan="1" colspan="1"
                                        style="font-weight: 500">Sản phẩm
                                    </th>
                                    <th class="w-25 sorting_disabled" rowspan="1" colspan="1"
                                        style="font-weight: 500">Giá</th>
                                    <th class="w-25 sorting_disabled" rowspan="1" colspan="1"
                                        style="font-weight: 500">Số lượng
                                    </th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1"
                                        style="min-width: 170px;font-weight: 500">Tổng tiền</th>
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
                                                    <div class="avatar me-2"><img width="80px" height="100px"
                                                            src="/uploads/{{ $item['product']->image }}" alt=""
                                                            class="rounded-2"></div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="text-body mb-0">{{ $item['product']->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span>{{ number_format($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) }}₫</span>
                                        </td>
                                        <td><span class="text-body">{{ $item->quantity }}</span></td>
                                        <td>
                                            <h6 class="mb-0">
                                                {{ number_format(($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity) }}₫
                                            </h6>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                        <div class="order-calculations">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Tổng phụ:</span>
                                <h6 class="mb-0">{{ number_format($total) }}₫</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Phí ship:</span>
                                <h6 class="mb-0">{{ number_format($ship) }}₫</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0 fw-bold text-danger">Tổng tiền:</h6>
                                <h6 class="mb-0 fw-bold text-danger ml-2">{{ number_format($total + $ship) }}₫
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  ml-4 col-box-shadow" style="width: 32%;max-height: 400px">
            <div class="mb-4">
                <div class="card-header">
                    <h6 class="card-title m-0 py-3" style="font-weight: 500">Thông tin đặt hàng</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <div class="avatar me-2">
                            <img src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" width="50px" height="50px" alt="Avatar"
                                class="rounded-circle">
                        </div>
                        <div class="d-flex flex-column">

                            <h6 class="mb-0">{{ $customer->full_name }}</h6>

                            <small class="text-muted">Khách hàng ID: #{{ $customer->id }}</small>
                        </div>
                    </div>
                    <p class=" mb-1">Email: {{ $customer->email }}</p>
                    <p class=" mb-1">Số điện thoại: {{ $customer->phone }}</p>
                    <p class=" mb-1">Địa chỉ đặt hàng: {{ $order->address }}.</p>
                    <p class=" mb-1">Phương thức thanh toán:
                        {{ $order->payment_method == 1 ? 'Thanh toán chuyển khoản' : 'Nhận hàng thanh toán' }}.
                    </p>
                    <div class="py-2 justify-content-between">
                        <h6 style="font-weight: 500">Tình trạng đơn hàng</h6>
                        <p class=" mb-1">Trạng thái: @if ($order->status == 0)
                                <span id="orderYear" style="color: #0D6EFD">Chờ duyệt</span>
                            @elseif($order->status == 1)
                                <span id="orderYear" style="color: #0DCAF0">Chuẩn bị giao hàng</span>
                            @elseif($order->status == 2)
                                <span id="orderYear" style="color: #198754">Đã hoàn thành</span>
                            @elseif($order->status == 3)
                                <span id="orderYear" style="color: #FFC107">Đang giao hàng</span>
                            @elseif($order->status == 4)
                                <span id="orderYear" style="color: #DC3545">Đã hủy</span>
                            @endif
                        </p>
                    </div>
                    @if (!($order->status == 4 || $order->status == 2))
                        <button class="button dark mt-2" wire:click="cancelOrder({{ $order->id }})">
                            Hủy đơn hàng
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
