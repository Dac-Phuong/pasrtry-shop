<div class="container-fluid">
    <div class="row">
        <div class="wrap-collection-body clearfix">
            <div class="wrap-collection-body d-flex clearfix">
                <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
                    <div class="wrap-filter">
                        <div class="box_sidebar">
                            <div class="block left-module">
                                <div class=" filter_xs">
                                    <div class="layered">
                                        <div class="group-menu">
                                            <div class="block_content layered layered-category">
                                                <div class="layered-content">
                                                    <ul class="tree-menu">
                                                        <li class="">
                                                            <span></span>
                                                            <a href="{{ url('products/all') }}" wire:navigate
                                                                style="font-size: 14px">
                                                                Tất cả sản phẩm
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <span></span>
                                                            <a href="{{ url('products/new') }}" wire:navigate
                                                                style="font-size: 14px">
                                                                Sản phẩm mới
                                                            </a>
                                                        </li>
                                                        <li class="active">
                                                            <span></span>
                                                            <a href="{{ url('products/selling') }}" wire:navigate
                                                                style="font-size: 14px">
                                                                Sản phẩm bán chạy
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <span></span>
                                                            <a class="" href="{{ url('blogs/news') }}"
                                                                wire:navigate>
                                                                Tin tức &amp; Khuyến mại
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block_content">
                                            <!-- ./filter brand -->
                                            <!-- ./filter price -->
                                            <div class="group-filter" aria-expanded="true">
                                                <div class="layered_subtitle dropdown-filter"><span>Giá sản
                                                        phẩm</span><span class="icon-control"><i
                                                            class="fa fa-minus"></i></span></div>
                                                <div class="layered-content bl-filter filter-price">
                                                    <ul class="check-box-list">
                                                        <li>
                                                            <input type="checkbox" id="p1"
                                                                wire:model.live="showProductsUnder100k">
                                                            <label for="p1"
                                                                style="font-weight: 500;cursor: pointer;">
                                                                <span
                                                                    style="font-weight: 500;cursor: pointer;">Dưới</span>
                                                                100,000₫
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="p2"
                                                                wire:model.live="showProducts100kTo300k">
                                                            <label for="p2"
                                                                style="font-weight: 500;cursor: pointer;">
                                                                100,000₫ - 300,000₫
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="p3"
                                                                wire:model.live="showProducts300kTo500k">
                                                            <label for="p3"
                                                                style="font-weight: 500;cursor: pointer;">
                                                                300,000₫ - 500,000₫
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="p4"
                                                                wire:model.live="showProducts500kTo1m">
                                                            <label for="p4"
                                                                style="font-weight: 500;cursor: pointer;">
                                                                500,000₫ - 1,000,000₫
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" id="p5"
                                                                wire:model.live="showProductsOver1m">
                                                            <label for="p5" style="font-weight: 500">
                                                                <span>Trên</span> 1,000,000₫
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="wrap-collection-title row ">
                        <div class="heading-collection row">
                            <div class="col-md-8 col-sm-12 col-xs-12 mb-4">
                                <h1 class="title">
                                    Sản phẩm bán chạy
                                </h1>
                                <div class="alert-no-filter"></div>
                            </div>
                            <div class="col-md-4 hidden-sm hidden-xs">
                                <div class="option browse-tags">
                                    <span class="custom-dropdown custom-dropdown--grey">
                                        <select class="sort-by custom-dropdown__select" wire:model.live="sortOrder"
                                            wire:change="sortOrder" fdprocessedid="bwzthr">
                                            <option value="asc">
                                                Giá: Tăng dần</option>
                                            <option value="desc">
                                                Giá: Giảm dần</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="content-product-list row">
                                @if (isset($products))
                                    @foreach ($products as $key => $product)
                                        <div class="col-md-3 col-sm-6 col-xs-6 pro-loop ">
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
                                                                src="/uploads/{{ $product->image }}"
                                                                alt="Bánh Croissant" sizes="262px"
                                                                style="height: 100%;">
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
