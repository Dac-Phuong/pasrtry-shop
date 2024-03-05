@extends('web.layouts.master')
@section('content')
    <main class="mainContent-theme">
        <div id="product" class="productDetail-page">
            <div class="breadcrumb-shop">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                            <ol class="breadcrumb breadcrumb-arrows">
                                <li itemprop="itemListElement">
                                    <span class="text-info">Trang chủ /</span>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="">
                                    <span class="text-info ml-1"> Danh mục /</span>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li class="active">
                                    <span itemprop="item">
                                        <span itemprop="name" class="ml-1">Tất cả sản phẩm</span>
                                    </span>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <livewire:web.products.product-all/>
        </div>
    </main>
@endsection
