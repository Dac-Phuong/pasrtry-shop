<div class="container-fluid mt-4">
    <div class="heading-page clearfix">
        <h1 class="text-center">Thông tin tài khoản</h1>
    </div>
    <div class="row my-3">
        <div class="col-md-3 col-box-shadow " style="max-height: 300px">
            <h2 class="checkout-title my-4" style="font-weight: 600">Thông tin tài khoản</h2>
            <div class="block-content">
                <span>Họ và tên:<strong> {{ $customer->full_name }}</strong></span>
                <p class="mt-2">Email: <strong> {{ $customer->email }}</strong></p>
                <p class="mt-2">Số điện thoại: <strong> {{ $customer->phone }}</strong></p>
            </div>

            <button wire:click="logout" class="button dark mt-4" style="margin-top: 10px;">
                <i class="fa-solid fa-right-from-bracket" style="width: 18px;margin-top: -4px"></i>
                Đăng xuất
            </button>
        </div>
        <div class="col col-box-shadow ml-5 ">
            <h2 class="checkout-title my-4" style="font-weight: 600">Danh sách đơn hàng</h2>
            <table class="table">
                <tbody>
                    <tr class="text-transform font-weight-600">
                        <td>
                            <label class="form-check-label fs-6 cursor-pointer" for="flexRadioDefault2">
                                STT
                            </label>
                        </td>
                        <td class="text-center">
                            <label class="form-check-label fs-6 cursor-pointer" for="flexRadioDefault2">
                                Mã đơn hàng
                            </label>
                        </td>
                        <td class="text-center">
                            <label class="form-check-label fs-6 cursor-pointer" for="flexRadioDefault2">
                                Thời gian mua
                            </label>
                        </td>
                        <td class="text-center">
                            <label class="form-check-label fs-6 cursor-pointer" for="flexRadioDefault2">
                                Phương thức thanh toán
                            </label>
                        </td>
                        <td class="text-center">
                            <label class="form-check-label fs-6 cursor-pointer" for="flexRadioDefault2">
                                Trạng thái
                            </label>
                        </td>
                        <td class="text-center">
                            <label class="form-check-label fs-6 cursor-pointer" for="flexRadioDefault2">
                                Xem chi tiết
                            </label>
                        </td>
                    </tr>
                    @if (count($order) > 0)
                        @foreach ($order as $key => $item)
                            <tr>
                                <td style="font-size: 14px">{{ ++$key }}</td>
                                <td class="text-center" style="font-size: 14px">#{{ $item->id }}</td>
                                <td class="text-center text-center" style="font-size: 14px">
                                    {{ $item->created_at }}
                                </td>
                                <td class="text-center {{ $item->payment_method == 1 ? 'text-info' : 'text-black' }}"
                                    style="font-size: 14px; ">
                                    {{ $item->payment_method == 0 ? 'Nhận hàng thanh toán' : 'Thanh toán chuyển khoản' }}
                                </td>
                                @if ($item->status == 0)
                                    <td class="text-center" style="font-size: 14px;color: #0D6EFD">
                                        Chờ xác nhận
                                    </td>
                                @elseif($item->status == 1)
                                    <td class="text-center" style="font-size: 14px;color: #0DCAF0">
                                        Chuẩn bị giao hàng
                                    </td>
                                @elseif($item->status == 2)
                                    <td class="text-center" style="font-size: 14px;color: #198754">
                                        Đã hoàn thành
                                    </td>
                                @elseif($item->status == 3)
                                    <td class="text-center" style="font-size: 14px;color: #FFC107">
                                        Đang giao hàng
                                    </td>
                                @elseif($item->status == 4)
                                    <td class="text-center" style="font-size: 14px;color: #DC3545">
                                        Đã hủy
                                    </td>
                                @endif
                                <td class="text-center text-center" style="font-size: 14px">
                                    <a href="{{ url('order/order-detail/' . $item->id) }}" wire:navigate
                                        class="button dark" style="border-radius:20px ">Xem
                                    </a>
                                </td>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12" style="text-align:center; color:red">
                                Chưa có thông tin đơn hàng.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
