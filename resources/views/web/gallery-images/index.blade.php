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
                                    <span class="text-info ml-1"> Gallery /</span>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="heading-page clearfix mt-4">
                            <h1 class="text-center">
                                Bộ sưu tập
                            </h1>
                        </div>
                        <div class="blog-content">
                            <div class="list-article-gallery blog-posts d-flex flex-wrap ">
                                @if (isset($gallery))
                                    @foreach ($gallery as $key => $item)
                                        <div class="col-gl col-md-4 col-sm-6 col-xs-12">
                                            <div class="image-gallery">
                                                <a href="{{ asset('storage/gallery_images/' . $item->image) }}" class="light-link">
                                                    <img src="{{ asset('storage/gallery_images/' . $item->image) }}">
                                                </a>
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
    </main>
@endsection
