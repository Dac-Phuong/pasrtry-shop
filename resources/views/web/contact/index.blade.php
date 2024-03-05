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
                                <li class="active">
                                    <span itemprop="item">
                                        <span itemprop="name" class="ml-1">Liên hệ</span>
                                    </span>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper-row pd-page py-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="sidebar-page">
                                <div class="group-menu">
                                    <div class="page_menu_title title_block">
                                        <h2>Danh mục trang</h2>
                                    </div>
                                    <div class="layered layered-category">
                                        <div class="layered-content">
                                            <ul class="tree-menu">
                                                <li class="">
                                                    <span></span>
                                                    <a class="" href="{{ url('products/new') }}" wire:navigate
                                                        title="Sản phẩm mới" target="_self">
                                                        Sản phẩm mới
                                                    </a>
                                                </li>

                                                <li class="">
                                                    <span></span>
                                                    <a class="" href="{{ url('products/selling') }}" wire:navigate
                                                        title="Sản phẩm bán chạy" target="_self">
                                                        Sản phẩm bán chạy
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <span></span>
                                                    <a class="" href="{{ url('products/all') }}" wire:navigate
                                                        title="Tất cả sản phẩm" target="_self">
                                                        Tất cả sản phẩm
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <span></span>
                                                    <a class="" href="{{ url('/blogs/news') }}" wire:navigate
                                                        title="Tin tức &amp; Khuyến mại" target="_self">
                                                        Tin tức &amp; Khuyến mại
                                                    </a>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="box_image visible-lg visible-md">
                                    <div class="banner">
                                        <a href="/">
                                            <img src="//theme.hstatic.net/1000104153/1001164818/14/page_banner.jpg?v=51"
                                                alt="Nguyễn Sơn Bakery">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="page-wrapper">
                                <div class="heading-page">
                                    <h1 class="">Thông tin liên hệ</h1>
                                </div>
                                <div class="wrapbox-content-page">
                                    <div class="content-page ">
                                        <div class="mb-2"><a href="#">Bánh ngọt ND's Baker - Thái nguyên</a></div>
                                        <p>
                                            🏠 z115 Quyết Thắng, Thái Nguyên - ĐT: 0243 632 0304
                                            <br>
                                            🏠 94 Đào Tấn, Ba Đình, Hà Nội - ĐT: 02437712551
                                            <br>
                                            🏠 64 Cửa Bắc, Ba Đình ĐT: 024 3826 0066
                                            <br>
                                            🏠 637 Kim Mã, Ba Đình, ĐT: 024 3771 2550
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="form-contact mt-4">
                                    <h2 class="my-2 fw-bold">Form liên hệ</h2>
                                    <form action="">
                                        <div class="d-flex row ">
                                            <div class="mb-2 col-md">
                                                <label for="formGroupExampleInput" class="form-label">Họ và tên</label>
                                                <input type="text" class="form-control" value=""
                                                    id="formGroupExampleInput" placeholder="Nhập Họ và tên">
                                            </div>
                                            <div class="mb-2 col-md">
                                                <label for="formGroupExampleInput2" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="Nhập địa chỉ email">
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label for="validationTextarea" class="form-label">Nội dung liên hệ</label>
                                            <textarea class="form-control" wire:model.defer="note" id="validationTextarea" rows="4"
                                                placeholder="Nhập nội dung liên hệ"></textarea>
                                            <div class="invalid-feedback">
                                                Nhập nội dung liên hệ
                                            </div>
                                        </div>
                                        <button class="button dark" style="min-width: 200px">Gửi</button>
                                    </form>
                                </div> --}}
                                <div class="mt-5 border">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.255707547779!2d105.81561221185714!3d21.57593958013136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135272fdc96c33f%3A0xa5a8acff54467bba!2zSG_DoG5nIEdpYSwgVMOibiBUaOG7i25oLCBUcC4gVGjDoWkgTmd1ecOqbiwgVGjDoWkgTmd1ecOqbiwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1705317952403!5m2!1sen!2s"
                                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
