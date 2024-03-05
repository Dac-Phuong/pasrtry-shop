<div class="product-detail-wrapper  mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row product-detail-main pr_style_03">
                    <div class="col-md-5 col-sm-12 col-xs-12 product-content-img" wire:ignore>
                        <div class="product-gallery">
                            <div class="product-image-detail box__product-gallery scroll">
                                @if (!empty($product->gallery_images))
                                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                        class="swiper mySwiper2">
                                        <div class="swiper-wrapper">
                                            @foreach (json_decode($product->gallery_images) as $index => $image)
                                                <div class="swiper-slide">
                                                    <img class="img-slide-product" loading="lazy"
                                                        src="{{ asset('storage/gallery_images/' . $image) }}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper mySwiper">
                                        <div class="swiper-wrapper mt-3">
                                            @foreach (json_decode($product->gallery_images) as $index => $image)
                                                <div class="swiper-slide cursor-pointer border">
                                                    <img class="img-slide-product" loading="lazy" height="100px"
                                                        src="{{ asset('storage/gallery_images/' . $image) }}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12 product-content-desc" id="detail-product" >
                        <div class="product-title">
                            <h1>{{ $product->name }}</h1>
                        </div>
                        <div class="product-price" id="price-preview">
                            @if ($product->sale > 0)
                                <span class="pro-sale">-{{ $product->sale }}% </span>
                            @endif
                            <span
                                class="pro-price">{{ number_format($product->price - ($product->sale / 100) * $product->price) }}₫</span>
                            @if ($product->sale > 0)
                                <del>{{ number_format($product->price) }}₫</del>
                            @endif
                        </div>
                        <div class="selector-actions">
                            <div class="quantity-area clearfix">
                                <button type="button" class="qty-btn" wire:click="decrease"><i
                                        class="fa-solid fa-minus"></i></button>
                                <span class="quantity-selector">{{ $quantity }}</span>
                                <button type="button" class="qty-btn" wire:click="increase"><i
                                        class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="wrap-addcart clearfix">
                                <button type="button" wire:click="addToCart({{ $product->id }})"
                                    class="add-to-cartProduct button dark btn-addtocart addtocart-modal">Thêm vào
                                    giỏ</button>
                            </div>
                            <div class="product-description">
                                <div class="title-bl">
                                    <h2>Mô tả</h2>
                                </div>
                                <div class="description-content">
                                    <div class="description-productdetail">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-productRelated mt-4" >
                        <div class="heading-title text-center">
                            <h2>Sản phẩm liên quan</h2>
                        </div>
                        <div class="content-product-list row">
                            @if (isset($related_products))
                                @foreach ($related_products as $key => $product)
                                    <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">
                                        <div class="product-block product-resize fixheight" style="height: 346px;">
                                            <div class="product-img ">
                                                @if ($product->sale > 0)
                                                    <div class="product-sale">
                                                        <span>-{{ $product->sale }}%</span>
                                                    </div>
                                                @endif
                                                <a href="{{ url('products/detail/' . $product->id) }}" wire:navigate
                                                    class="image-resize ratiobox lazyloaded" data-expand="-1"
                                                    style="height: 245px;">
                                                    <picture>
                                                        <img class="img-loop lazyautosizes lazyloaded"
                                                            src="/uploads/{{ $product->image }}" alt="Bánh Croissant"
                                                            sizes="262px" style="height: 100%;">
                                                    </picture>
                                                </a>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="box-pro-detail">
                                                    <h3 class="pro-name">
                                                        <a href="{{ url('products/detail/' . $product->id) }}"
                                                            wire:navigate>
                                                            {{ $product->name }}
                                                        </a>
                                                    </h3>
                                                    <div class="box-pro-prices d-flex align-items-center">
                                                        <p class="pro-price ">
                                                            <span>{{ number_format($product->price - ($product->sale / 100) * $product->price) }}₫</span>
                                                        </p>
                                                        @if ($product->sale > 0)
                                                            <span class="pro-price-del d-flex">
                                                                <del class="compare-price">
                                                                    {{ number_format($product->price) }}₫
                                                                </del>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            autoplay: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,

            },
        });
    </script>
@endpush
