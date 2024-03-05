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
                                            <a href="{{ url('blogs/news/detail/'. $posts->id) }}" wire:navigate>
                                                <img class=" lazyloaded"
                                                    src="{{ asset('storage/image_posts/' . $posts->image) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h3>
                                                <a href="{{ url('blogs/news/detail/'. $posts->id) }}"
                                                    wire:navigate>{{ $posts->title }}</a>
                                            </h3>
                                            <span class="author">
                                                <a href="{{ url('blogs/news/detail/'. $posts->id) }}"
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
                                            <a class="" href="{{ url('/') }}" wire:navigate title="Trang chủ"
                                                target="_self">
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
                                            <a class="" href="{{ url('/blogs/gallery') }}" wire:navigate title="Gallery" target="_self">
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
                                            <a class="" href="javascript:void(0)" title="Liên hệ" target="_self">
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
                <div class="heading-page clearfix">
                    <h1>Tin tức &amp; Khuyến mại</h1>
                </div>
                @if (isset($list_posts))
                    @foreach ($list_posts as $key => $posts)
                        <article class="blog-loop mb-3">
                            <div class="blog-post row">
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <a href="{{ url('blogs/news/detail/'. $posts->id) }}" wire:navigate
                                        class="blog-post-thumbnail overflow-hidden" style="display: block">
                                        <img class="lazyloaded"
                                            src="{{ asset('storage/image_posts/' . $posts->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-12">
                                    <h3 class="blog-post-title">
                                        <a href="{{ url('blogs/news/detail/'. $posts->id) }}"
                                            wire:navigate>{{ $posts->title }}</a>
                                    </h3>
                                    <div class="blog-post-meta mt-1">
                                        <span class="author vcard text-gray">Người viết: {{ $posts->author }}</span>
                                        <span class="date">
                                            <time pubdate="">{{ $posts->created_at }}</time>
                                        </span>
                                    </div>
                                    <p class="entry-content mt-1">{{ $posts->description }}</p>
                                </div>

                            </div>
                        </article>
                    @endforeach
                @endif
                {{ $list_posts->links() }}
            </div>
        </div>
    </div>
</div>
