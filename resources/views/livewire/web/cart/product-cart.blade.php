<div class="container-fluid my-4">
    <div class="heading-page text-center">
        <div class="header-page">
            <h1>Giỏ hàng của bạn</h1>
            <p class="count-cart">Có <span>{{ count($cart) }} sản phẩm</span> trong giỏ hàng</p>
        </div>
    </div>
    <div class="row wrapbox-content-cart">
        <div class="col-md-8 col-sm-8 col-xs-12 contentCart-detail">
            <div class="cart-container">
                @if (count($cart) > 0)
                    <div class="cart-col-left">
                        <div class="main-content-cart">
                            <div id="cartformpage">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table-cart w-100">
                                            <thead>
                                                <tr>
                                                    <th class="image">&nbsp;</th>
                                                    <th class="item">Tên sản phẩm</th>
                                                    <th class="remove">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $key => $item)
                                                    @php
                                                        $total += ($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity;
                                                    @endphp
                                                    <tr class="line-item-container relative"
                                                        data-variant-id="1114111257">
                                                        <td class="image">
                                                            <div class="product_image">
                                                                <a href="{{ url('products/detail/' . $item['product']->id) }}"
                                                                    wire:navigate>
                                                                    <img src="uploads/{{ $item['product']->image }}"
                                                                        alt="Bánh Custard Bun">
                                                                </a>

                                                            </div>
                                                        </td>
                                                        <td class="item">
                                                            <h3><a href="{{ url('products/detail/' . $item['product']->id) }}"
                                                                    wire:navigate>{{ $item['product']->name }}</a>
                                                            </h3>
                                                            <p>
                                                                <span
                                                                    class="pri">{{ number_format($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) }}₫</span>
                                                            </p>
                                                            <p class="variant">
                                                            </p>
                                                            <div class="qty quantity-partent qty-click clearfix">
                                                                <button type="button"
                                                                    wire:click="decrease({{ $item['product']->id }})"
                                                                    class="qtyminus qty-btn"
                                                                    fdprocessedid="gi9njc">-</button>
                                                                <input type="text" size="4" name="updates[]"
                                                                    min="1" id="updates_1114111257"
                                                                    data-price="1500000" value="{{ $item->quantity }}"
                                                                    class="tc line-item-qty item-quantity"
                                                                    fdprocessedid="pez2xu">
                                                                <button type="button"
                                                                    wire:click="increase({{ $item['product']->id }})"
                                                                    class="qtyplus qty-btn"
                                                                    fdprocessedid="ss70e">+</button>
                                                            </div>
                                                            <p class="price">
                                                                <span
                                                                    class="line-item-total">{{ number_format(($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity) }}₫</span>
                                                            </p>
                                                        </td>
                                                        <td class="remove">
                                                            <button wire:click="deleteCart({{ $item->id }})"
                                                                class="cart">
                                                                <img
                                                                    src="//theme.hstatic.net/1000104153/1001164818/14/ic_close.png?v=51"></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-7 col-sm-12 col-xs-12 hidden-xs">
                                        <div class="sidebox-group sidebox-policy">
                                            <h4>Chính sách mua hàng</h4>
                                            <ul>
                                                <li></li>
                                                <li>Vui lòng kiểm tra kỹ sản phẩm và số lượng trước khi nhận hàng thanh
                                                    toán
                                                </li>
                                                <li>Liên hệ hotline 02438222228 để được tư vấn chi tiết</li>
                                                <li>Sản phẩm sale Bánh của tháng chỉ áp dụng khi mua tại cửa hàng</li>
                                            </ul>
                                        </div>
                                        <div class="cart-buttons hidden">
                                            <button type="submit" id="update-cart"
                                                class="btn-update button dark hidden" name="update" value="">Cập
                                                nhật</button>
                                            <button type="submit" id="checkout"
                                                class="btn-checkout button dark hidden" name="checkout"
                                                value="">Thanh toán</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="expanded-message">
                        <p class="cart-empty">Giỏ hàng của bạn đang trống</p>
                    </div>
                @endif
            </div>
            <!-- End cart -->
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 sidebarCart-sticky">
            <div class="sidebox-order">
                <div class="sidebox-order-inner">
                    <div class="sidebox-order_title">
                        <h3>Thông tin đơn hàng</h3>
                    </div>
                    <div class="sidebox-order_total">
                        <p>Tổng tiền:
                            <span class="total-price">{{ number_format($total) }}₫</span>
                        </p>
                    </div>
                    <div class="sidebox-order_text">
                        <p>Phí vận chuyển sẽ được tính ở trang thanh toán.<br>
                            Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                    </div>
                    <div class="sidebox-order_action">
                        <a href="{{ count($cart) > 0 ? url('checkout') : url('/cart') }} " wire:navigate class="button dark btncart-checkout">THANH
                            TOÁN</a>
                        <p class="link-continue text-center">
                            <a href="{{ url('products/all') }}" wire:navigate>
                                <i class="fa fa-reply fs-6"></i> Tiếp tục mua hàng
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="sidebox-group sidebox-policy visible-xs">
                <h4>Chính sách mua hàng</h4>
                <ul>
                    <li></li>
                    <li>Vui lòng kiểm tra kỹ sản phẩm và số lượng trước khi nhận hàng thanh toán</li>
                    <li>Liên hệ hotline 02438222228 để được tư vấn chi tiết</li>
                    <li>Sản phẩm sale Bánh của tháng chỉ áp dụng khi mua tại cửa hàng</li>
                </ul>
            </div>

        </div>
    </div>
</div>
