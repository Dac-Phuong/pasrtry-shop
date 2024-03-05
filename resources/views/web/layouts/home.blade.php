@extends('web.layouts.master')
@section('content')
    <main class="mainContent-theme">
        <div id="home-slider">
            <div id="homepage_slider" class="owl-carousels owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style=" transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                        <div class="owl-item active" style="">
                            <div class="item ">
                                <a href="{{ url('/') }}" wire:navigate title="Sản phẩm" aria-label="Banner 1">
                                    <picture>
                                        <img src="{{ asset('images/banner.png') }}" alt="Sản phẩm">
                                    </picture>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Danh mục sản phẩm --}}
        <div class="wrapper-home-banner-top">
            <div class="list-slider-banner owl-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @if (isset($category))
                            @foreach ($category as $key => $item)
                                <div class="owl-item active" style="width: 594.333px;">
                                    <div class="home-banner-pd">
                                        <div class="block-banner-category ">
                                            <a class="link-banner ratiobox lazyloaded"
                                                href="{{ url('category/products/' . $item->id) }}" wire:navigate
                                                aria-label="Banner 2" data-expand="-1">
                                                <img class=" lazyautosizes ls-is-cached lazyloaded" data-sizes="auto"
                                                    src="{{ asset('storage/uploads/' . $item->image) }}"
                                                    alt="{{ $item->name }}" sizes="590px">
                                            </a>
                                            <div class="caption_banner_slide">
                                                <h3>{{ $item->name }}</h3>
                                                <a class="button" href="{{ url('category/products/' . $item->id) }}"
                                                    wire:navigate>Xem
                                                    ngay</a>
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
        <section class="section section-collection">
            {{-- Sản phẩm Mới --}}
            <div class="wrapper-heading-home animation-tran text-center active">
                <div class="container-fluid">
                    <div class="site-animation">
                        <h2>
                            <a href="{{ url('products/new') }}" wire:navigate>
                                Sản phẩm mới
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="wrapper-collection-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="clearfix content-product-list d-flex flex-wrap">
                            @if (isset($products))
                                @foreach ($products as $key => $product)
                                    <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">
                                        <div class="product-block product-resize fixheight">
                                            <div class="product-img ">
                                                @if ($product->sale > 0)
                                                    <div class="product-sale">
                                                        <span>-{{ $product->sale }}%</span>
                                                    </div>
                                                @endif
                                                <a href="{{ url('products/detail/' . $product->id) }}" wire:navigate
                                                    class="image-resize ratiobox lazyloaded" data-expand="-1">
                                                    <picture>
                                                        <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto"
                                                            src="/uploads/{{ $product->image }}"
                                                            alt="Croffle Chocolate Đen" sizes="457px">
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
                                                    <div class="box-pro-prices">
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
                            <div class="text-center btnSeemore m-auto">
                                <a class="button dark" href="{{ url('products/new') }}" wire:navigate>Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Hộp bánh --}}
            <div class="wrapper-home-banner">
                <div class="clearfix d-flex">
                    @if ($cake_box)
                        @foreach ($cake_box as $key => $product)
                            <div class="col-xs-12 col-sm-4 col-md-4 home-banner-pd">
                                <div class="block-banner-category ratiobox h-100">
                                    <a class="link-banner lazyloaded h-100"
                                        href="{{ url('products/detail/' . $product->id) }}" wire:navigate>
                                        <img class="lazyautosizes ls-is-cached lazyloaded h-100" data-sizes="auto"
                                            src="/uploads/{{ $product->image }}" alt="" width="100%"
                                            sizes="630px">
                                    </a>
                                    <div class="caption_banner">
                                        <span class="subtitle"></span>
                                        <h3></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            {{-- Sản bán chạy --}}
            <div class="wrapper-heading-home animation-tran text-center active">
                <div class="container-fluid">
                    <div class="site-animation">
                        <h2>
                            <a href="{{ url('products/selling') }}" wire:navigate>
                                Sản bán chạy
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="wrapper-collection-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="clearfix content-product-list d-flex flex-wrap">
                            @if (isset($bestSellingProducts))
                                @foreach ($bestSellingProducts as $key => $product)
                                    <div class="col-md-4 col-sm-6 col-xs-6 pro-loop ">
                                        <div class="product-block product-resize fixheight">
                                            <div class="product-img ">
                                                @if ($product->sale > 0)
                                                    <div class="product-sale">
                                                        <span>-{{ $product->sale }}%</span>
                                                    </div>
                                                @endif
                                                <a href="{{ url('products/detail/' . $product->id) }}"
                                                    title="Croffle Chocolate Đen" class="image-resize ratiobox lazyloaded"
                                                    data-expand="-1">
                                                    <picture>
                                                        <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto"
                                                            src="/uploads/{{ $product->image }}"
                                                            alt="Croffle Chocolate Đen" sizes="457px">
                                                    </picture>
                                                </a>
                                            </div>
                                            <div class="product-detail clearfix">
                                                <div class="box-pro-detail">
                                                    <h3 class="pro-name">
                                                        <a href="" title="Croffle Chocolate Đen">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h3>
                                                    <div class="box-pro-prices">
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
                            <div class="text-center btnSeemore m-auto">
                                <a class="button dark" href="{{ url('products/selling') }}" wire:navigate>Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="wrapper-home-information animation-tran active">
            <div class="container-fluid ">
                <div class="flex-container-information">
                    <div class="col-md-6 col-sm-12 col-xs-12 wrap-pd-infor wrap-flex-align flex-column box_stick mb-2" style="position: relative !important">
                        <div class="box-banner-inf">
                            <div class="content site-animation">
                                <h2 class="title dark">Về chúng tôi</h2>

                                <a class="button" href="{{ url('blogs/introduce') }}" wire:navigate title="Xem ngay">
                                    <span>Xem ngay</span>
                                </a>
                            </div>
                        </div>
                        <div class="container-background">
                            <img class=" ls-is-cached lazyloaded"
                                src="//theme.hstatic.net/1000104153/1001164818/14/home_about_image.jpg?v=51"
                                data-src="//theme.hstatic.net/1000104153/1001164818/14/home_about_image.jpg?v=51"
                                alt="Về chúng tôi">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 wrap-pd-infor wrap-flex-align flex-column">
                        <div class="inf-content site-animation">
                            <p style="text-align: justify;">Có lẽ những người yêu thích bánh ngọt, đặc biệt là bánh được
                                làm theo phong cách Pháp không xa lạ gì với thương hiệu&nbsp;Nguyễn Sơn Bakery.</p>
                            <div style="text-align: justify;">Mỗi chiếc bánh ở Nguyễn Sơn Bakery lại mang một vẻ riêng, từ
                                hương vị đến cách trang trí. Hình thức giản dị chỉ với hai màu đen trắng làm chủ đạo nhưng
                                chất lượng nhờ cách làm tinh tế và tỉ mỉ. Bánh có vị ngọt không quá đậm, vị béo thì thanh
                                nên không gây cảm giác ngán cho người thưởng thức. Cũng rất hiếm khi tìm thấy sự trùng lặp
                                trong các loại bánh ở Nguyễn Sơn Bakery vì tất cả chúng, từ bánh mì, bánh ngọt, bánh quy đều
                                được làm&nbsp;100% hand-made.</div>
                            <div style="text-align: justify;">Hơn nữa, ông chủ của tiệm bánh, Chef Nguyễn Sơn, cũng là
                                người khá khó tính trong việc lựa chọn nguyên liệu cho các sản phẩm của cửa hàng.</div>
                            <div style="text-align: justify;">&nbsp;</div>
                            <div style="text-align: justify;">Xuất thân trong gia đình có nghề làm bánh mỳ truyền thống,
                                Chef Nguyễn Sơn cũng có thời gian dài làm việc tại Công ty Bodega rồi Sofitel Metropole. Anh
                                có hơn 10 năm kinh nghiệm làm Chef bánh tại khách sạn danh tiếng Sofitel Metropole Legende
                                Hanoi.</div>
                            <div style="text-align: justify;">&nbsp;</div>
                            <div style="text-align: justify;">Và cũng chính ông chủ Nguyễn Sơn vẫn tự tay làm ra những
                                chiếc bánh ngọt độc đáo. Bên cạnh việc kinh doanh, với ông chủ trẻ này
                                thì<strong>&nbsp;</strong>“ làm bánh là một nghệ thuật đầy sáng tạo, được thể hiện cầu kỳ và
                                nghiêm ngặt từ khâu chế biến cho đến việc trang trí, trình bày các họa tiết ". Mỗi chiếc
                                bánh được anh làm ra đều thỏa mãn hai ước mơ: nghệ thuật và kinh doanh.</div>
                            <div style="text-align: justify;">&nbsp;</div>
                            <div style="text-align: justify;">Đến nay&nbsp;Nguyễn Sơn Bakery&nbsp;đã phát triển với một
                                chuỗi cửa hàng tại Hà Nội, Hải Phòng, Bắc Ninh, Hưng Yên. Mỗi nơi có một phong cách, một ấn
                                tượng riêng nhưng tất cả đều hướng tới một điều là chất lượng và trang nhã.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
