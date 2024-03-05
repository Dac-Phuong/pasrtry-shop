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
                                        <span itemprop="name" class="ml-1">Tin tức & khuyến mại /</span>
                                    </span>
                                    <meta itemprop="position" content="3">
                                </li>
                                <li class="active">
                                    <span itemprop="item">
                                        <span itemprop="name" class="ml-1">{{ $item_posts->title }}</span>
                                    </span>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper-row pd-page mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12 ">
                            <div class="sidebar-blog">
                                <div class="news-latest">
                                    <div class="sidebarblog-title title_block">
                                        <h2>Bài viết mới nhất<span class="fa fa-angle-down"></span></h2>
                                    </div>
                                    @if (isset($posts_new))
                                        @foreach ($posts_new as $key => $posts)
                                            <div class="list-news-latest layered">
                                                <div class="item-article clearfix">
                                                    <div class="post-image">
                                                        <a href="{{ url('blogs/news/detail/' . $posts->id) }}"
                                                            wire:navigate>
                                                            <img class=" lazyloaded"
                                                                src="{{ asset('storage/image_posts/' . $posts->image) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h3>
                                                            <a href="{{ url('blogs/news/detail/' . $posts->id) }}"
                                                                wire:navigate>{{ $posts->title }}</a>
                                                        </h3>
                                                        <span class="author">
                                                            <a href="{{ url('blogs/news/detail/' . $posts->id) }}"
                                                                wire:navigate>{{ $posts->author }}</a>
                                                        </span>
                                                        <p class="date fs-6">
                                                            {{ $posts->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="menu-blog">
                                    <div class="group-menu">
                                        <div class="sidebarblog-title title_block">
                                            <h2>Danh mục blog<span class="fa fa-angle-down"></span></h2>
                                        </div>
                                        <div class="layered layered-category">
                                            <div class="layered-content">
                                                <ul class="tree-menu">
                                                    <li class="">
                                                        <span></span>
                                                        <a class="" href="{{ url('/') }}" wire:navigate
                                                            title="Trang chủ" target="_self">
                                                            Trang chủ
                                                        </a>
                                                    </li>

                                                    <li class="tree-menu-lv1 has-child  menu-collap ">
                                                        <a class="" href="{{ url('products/all') }}" wire:navigate
                                                            target="_self">
                                                            <span class="">Bánh ngọt và Bánh mỳ</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <span></span>
                                                        <a class="" href="{{ url('/blogs/gallery') }}" wire:navigate
                                                            title="Gallery" target="_self">
                                                            Gallery
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a class=" current" href="{{ url('blogs/news') }}" wire:navigate
                                                            target="_self">
                                                            Tin tức &amp; Khuyến mại
                                                        </a>
                                                    </li>
                                                    <li class="tree-menu-lv1 has-child  menu-collap ">
                                                        <a class="" href="javascript:void(0)" title="Liên hệ"
                                                            target="_self">
                                                            <span class="">Liên hệ</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="pb-3 posts-content">
                                {!! $item_posts->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
