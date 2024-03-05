<div class="container-fluid my-4">
    <h2 class="title text-center " style="font-weight: 600">THÔNG TIN THANH TOÁN</h2>
    <div class="mt-3">
        <form action="" wire:submit.prevent="submit">
            <div class="row gx-5 mt-3 px-3">
                <div class="col-md-5 pl-0">
                    <h2 class="checkout-title">Thông tin khách hàng</h2>
                    <div class="g-col-4">
                        <div class="mb-2">
                            <label for="formGroupExampleInput" class="form-label">Họ và tên</label>
                            <input type="text" disabled class="form-control" value="{{ $customer->full_name ?? '' }}"
                                id="formGroupExampleInput" placeholder="Nhập Họ và tên">
                        </div>
                        <div class="mb-2">
                            <label for="formGroupExampleInput2" class="form-label">Số điện thoại</label>
                            <input type="number" disabled class="form-control" value="{{ $customer->phone ?? '' }}"
                                id="formGroupExampleInput2" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-2" wire:ignore>
                            <label class="form-check-label cursor-pointer">
                                Tỉnh thành phố
                            </label>
                            <select id="myDropdown" wire:model.live="province_id" style="width: 100%;" >
                                <option value="">Chọn tỉnh thành phố</option>
                                @foreach ($provinces as $key => $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('province_id')
                                <span class="error text-danger" style="font-size: 13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2" wire:model.live="district_id" style="width: 100%;">
                            <label class="form-check-label cursor-pointer">
                                Quận huyện
                            </label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="">Chọn tỉnh quận huyện</option>
                                @foreach ($districts as $key => $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <span class="error text-danger" style="font-size: 13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2" wire:model.live="ward_id" style="width: 100%;">
                            <label class="form-check-label cursor-pointer">
                                Phường xã
                            </label>
                            <select class="form-select" style="width: 100%;">
                                <option value="">Chọn tỉnh phường xã</option>
                                @foreach ($wards as $key => $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                @endforeach
                            </select>
                            @error('ward_id')
                                <span class="error text-danger" style="font-size: 13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="formGroupExampleInput2" class="form-label">Địa chỉ cụ thể</label>
                            <input type="text" class="form-control" wire:model.defer="address"
                                id="formGroupExampleInput2" placeholder="Nhập địa chỉ cụ thể">
                            @error('address')
                                <span class="error text-danger" style="font-size: 13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <label class="form-check-label mt-2  cursor-pointer">
                            Chọn phương thức thanh toán
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" wire:model.defer="payment_method" type="radio"
                                name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label cursor-pointer" wire:click="cashPayment"
                                for="flexRadioDefault2">
                                Nhận hàng thanh toán
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label cursor-pointer" wire:click="paymentBanking"
                                for="flexRadioDefault1">
                                Thanh toán banking
                            </label>
                        </div>
                        @if ($isOpen)
                            <div class="mb-3 w-100">
                                <img width="100%" style="max-height: 450px" src="{{ asset('images/payment.png') }}"
                                    alt="">
                            </div>
                        @endif
                         
                        <div class="mb-3">
                            <div class="sidebox-group">
                                <h4>Ghi chú đơn hàng</h4>
                                <div class="checkout-note clearfix">
                                    <textarea id="note" name="note" wire:model.defer="note" rows="4" placeholder="Ghi chú"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="g-col-8">
                        <h2 class="checkout-title">Thông tin sản phẩm</h2>
                        <table class="table">
                            <tbody>
                                <tr style="border-style: hidden" class="text-transform font-weight-600">
                                    <td style="max-width: 250px;">
                                        <label class="form-check-label cursor-pointer" for="flexRadioDefault2">
                                            Tên sản phẩm
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="form-check-label cursor-pointer" for="flexRadioDefault2">
                                            Số lượng
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="form-check-label cursor-pointer" for="flexRadioDefault2">
                                            Giá
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="form-check-label cursor-pointer" for="flexRadioDefault2">
                                            Tổng
                                        </label>
                                    </td>
                                </tr>
                                @foreach ($cart as $key => $item)
                                    @php
                                        $total += ($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity;
                                    @endphp
                                    <tr>
                                        <td style="font-size: 14px">{{ $item['product']->name }}</td>
                                        <td class="text-center,font-size: 14px text-center">{{ $item->quantity }}</td>
                                        <td class="text-center" style="font-size: 14px">
                                            {{ number_format($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) }}₫
                                        </td>
                                        <td class="text-center" style="font-size: 14px">
                                            {{ number_format(($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity) }}₫
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Tổng cộng :</td>
                                    <td class="text-center" style="border-bottom-width: 0px;">
                                        {{ number_format($total) }}₫</td>
                                </tr>
                                <tr style="border-style: hidden">
                                    <td colspan="3">
                                        <p style="font-size: 12px;">(Phí giao hàng)</p>
                                    </td>
                                    <td class="text-center" style="border-bottom-width: 0px;">30,000đ
                                    </td>
                                </tr>
                                <tr style="background: #f4f4f4;border-style: hidden !important"
                                    class="bg-danger custom-background">
                                    <td colspan="3">
                                        <p style="font-size: 16px; color: red;">Thành tiền</p>
                                        <span style="font-weight: 100; font-style: italic;">(Tổng số tiền thanh
                                            toán)</span>
                                    </td>
                                    <td class="text-center">
                                        <p style="font-size: 16px; color: red;">
                                            {{ number_format($total + $ship) }}₫
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" style="width: 100%;border-radius:0px" class="button dark "
                        fdprocessedid="rk6tzl">Đặt hàng</button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener("livewire:navigated", function() {
            $('#myDropdown').select2();
            $('#myDropdown').on('change', function(e) {
                var data = $('#myDropdown').val();
                Livewire.dispatch("province_id", {
                    id: data,
                });
            });
        });
    </script>
@endpush
