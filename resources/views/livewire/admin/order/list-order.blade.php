<!-- Responsive Datatable -->
<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Danh sách đơn hàng</h5>
    </div>
    <div class="col-md-2 w-100 justify-content-between mb-4 mr-3 d-flex px-4">
        <div class="col-md-2 ml-auto mr-3" style="margin-left:auto;margin-right:25px">
            <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search..."
                    aria-label="Search..." aria-describedby="basic-addon-search31" fdprocessedid="pjzbzc">
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap p-3 mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Tổng số tiền</th>
                    <th>Ngày mua</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tình trạng đơn hàng</th>
                    <th style="width:80px">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($list_order) > 0)
                    @foreach ($list_order as $key => $order)
                        <tr class="odd">
                            <td>{{ ++$key }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }} </td>
                            <td>{{ number_format($order->total_money) }} vnđ</td>
                            <td>{{ $order->created_at }} </td>
                            <td>{{ $order->payment_method == 0 ? 'Nhận hàng thanh toán' : 'Thanh toán chuyển khoản' }}
                            <td>
                                <div class="d-flex ">
                                    @if ($order->status == 0 && $order->payment_method == 1)
                                        <button wire:click="updateStatusOrder({{ $order->id }})"
                                            class="btn btn-primary waves-effect waves-light">
                                            Xác nhận thanh toán
                                        </button>
                                    @elseif($order->status == 0)
                                        <button wire:click="updateStatusOrder({{ $order->id }})"
                                            class="btn btn-secondary waves-effect waves-light">
                                            Duyệt đơn hàng
                                        </button>
                                    @elseif($order->status == 1)
                                        <button wire:click="updateStatusOrder({{ $order->id }})"
                                            class="btn btn-info waves-effect waves-light">
                                            Giao hàng
                                        </button>
                                    @elseif($order->status == 2)
                                        <button disabled wire:click="updateStatusOrder({{ $order->id }})"
                                            class="btn btn-success waves-effect waves-light">
                                            Hoàn thành
                                        </button>
                                    @elseif($order->status == 3)
                                        <button wire:click="updateStatusOrder({{ $order->id }})"
                                            class="btn btn-warning waves-effect waves-light">
                                            Đang giao hàng
                                        </button>
                                    @elseif($order->status == 4)
                                        <button disabled class="btn btn-danger waves-effect waves-light">
                                            Đã hủy
                                        </button>
                                    @endif
                                    @if ($order->status == 0 || $order->status == 1)
                                        <button wire:click="cancelOrder({{ $order->id }})"
                                            class="btn btn-danger waves-effect waves-light "
                                            style="margin-left: 5px">Hủy</button>
                                    @endif
                                </div>
                            </td>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('admin/detail-order', $order->id) }}"><i
                                                class="ti ti-pencil me-1"></i> Xem chi tiết</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" style="text-align:center; color:red">
                            Không có dữ liệu.
                        </td>
                    </tr>
                @endif
        </table>
        <div class="mt-3">
            {{ $list_order->links() }}
        </div>
    </div>
</div>
</div>
