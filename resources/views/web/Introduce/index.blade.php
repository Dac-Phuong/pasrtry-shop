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
                                    <span class="text-infos ml-1"> Giới thiệu</span>
                                    <meta itemprop="position" content="2">
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
                                    <h1>Giới thiệu</h1>
                                </div>
                                <div class="wrapbox-content-page">
                                    <div class="content-page ">
                                        <p style="text-align: justify;">Có lẽ những người yêu thích bánh ngọt, đặc biệt là
                                            bánh được làm theo phong cách Pháp không xa lạ gì với thương hiệu&nbsp;Nguyễn
                                            Sơn Bakery.</p>
                                        <div style="text-align: justify;">Mỗi chiếc bánh ở Nguyễn Sơn Bakery lại mang một vẻ
                                            riêng, từ hương vị đến cách trang trí. Hình thức giản dị chỉ với hai màu đen
                                            trắng làm chủ đạo nhưng chất lượng nhờ cách làm tinh tế và tỉ mỉ. Bánh có vị
                                            ngọt không quá đậm, vị béo thì thanh nên không gây cảm giác ngán cho người
                                            thưởng thức. Cũng rất hiếm khi tìm thấy sự trùng lặp trong các loại bánh ở
                                            Nguyễn Sơn Bakery vì tất cả chúng, từ bánh mì, bánh ngọt, bánh quy đều được
                                            làm&nbsp;100% hand-made.</div>
                                        <div style="text-align: justify;">Hơn nữa, ông chủ của tiệm bánh, Chef Nguyễn Sơn,
                                            cũng là người khá khó tính trong việc lựa chọn nguyên liệu cho các sản phẩm của
                                            cửa hàng.</div>
                                        <div style="text-align: justify;">&nbsp;</div>
                                        <div style="text-align: justify;">Xuất thân trong gia đình có nghề làm bánh mỳ
                                            truyền thống, Chef Nguyễn Sơn cũng có thời gian dài làm việc tại Công ty Bodega
                                            rồi Sofitel Metropole. Anh có hơn 10 năm kinh nghiệm làm Chef bánh tại khách sạn
                                            danh tiếng Sofitel Metropole Legende Hanoi.</div>
                                        <div style="text-align: justify;">&nbsp;</div>
                                        <div style="text-align: justify;">Và cũng chính ông chủ Nguyễn Sơn vẫn tự tay làm ra
                                            những chiếc bánh ngọt độc đáo. Bên cạnh việc kinh doanh, với ông chủ trẻ này
                                            thì<strong>&nbsp;</strong>“ làm bánh là một nghệ thuật đầy sáng tạo, được thể
                                            hiện cầu kỳ và nghiêm ngặt từ khâu chế biến cho đến việc trang trí, trình bày
                                            các họa tiết ". Mỗi chiếc bánh được anh làm ra đều thỏa mãn hai ước mơ: nghệ
                                            thuật và kinh doanh.</div>
                                        <div style="text-align: justify;">&nbsp;</div>
                                        <div style="text-align: justify;">Đến nay&nbsp;Nguyễn Sơn Bakery&nbsp;đã phát triển
                                            với một chuỗi cửa hàng tại Hà Nội, Hải Phòng, Bắc Ninh, Hưng Yên. Mỗi nơi có một
                                            phong cách, một ấn tượng riêng nhưng tất cả đều hướng tới một điều là chất lượng
                                            và trang nhã.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
