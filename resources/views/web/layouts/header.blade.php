<?php
$category = \App\Models\category::get();
?>
<div class="mainHeader--height" style="min-height: 256px;">
    <header id="site-header" class="main-header mainHeader_temp03">
        <div class="topbar topbar_temp03" id="topbar">
            <div class="container-fluid">
                <div class="topbar-content text-center">
                    <p>Bánh ngọt ND's Bakery - Hotline: 02438222228</p>
                </div>
            </div>
        </div>
        <div class="header-upper-middle">
            <livewire:web.header.header-home />
        </div>
        <div class="header-menu-desktop menu-desktop hidden-sm hidden-xs">
            <div class="container-fluid">
                <div class="header-navbar-menu">
                    <div class="wrap-logo wrap-logo-sticky">
                        <a href="" aria-label="Nguyễn Sơn Bakery">
                            <img src="" alt="Nguyễn Sơn Bakery" class="img-responsive logoimg">
                        </a>
                    </div>
                    <div class="navbar-mainmenu">
                        <div id="nav">
                            <nav class="main-nav text-center">
                                <ul class="clearfix">
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ url('/') }}" wire:navigate title="Trang chủ">
                                            Trang chủ
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('products') ? 'active' : '' }}">
                                        <a href="{{ url('products/all') }}" wire:navigate title="Bánh ngọt và Bánh mỳ">
                                            Bánh ngọt và Bánh mỳ
                                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="sub_menu">
                                            @if (isset($category))
                                                @foreach ($category as $key => $item)
                                                    <li class="">
                                                        <a href="{{ url('category/products/' . $item->id) }}"
                                                            wire:navigate>
                                                            {{ $item->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                                        <a href="{{ url('blogs/gallery') }}" wire:navigate>
                                            Gallery
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('news') ? 'active' : '' }}">
                                        <a href="{{ url('blogs/news') }}" wire:navigate>
                                            Tin tức &amp; Khuyến mại
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{url('pages/contact')}}" wire:navigate title="Liên hệ">
                                            Liên hệ
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-search-mobile search-bar-mobile">
            <div class="search-box wpo-wrapper-search">
                <form action="/search" class="searchform searchform-categoris ultimate-search">
                    <div class="wpo-search-inner">
                        <input type="hidden" name="type" value="product">
                        <input required="" id="inputSearchAuto-mb" name="q" maxlength="40" autocomplete="off"
                            class="searchinput input-search search-input" type="text" size="20"
                            placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                        <span class="close-search"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                </path>
                            </svg></span>
                    </div>
                    <button type="submit" class="btn-search btn" id="search-header-btn-mb" aria-label="Tìm kiếm">
                        <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27"
                            style="enable-background:new 0 0 24 27;" xml:space="preserve">
                            <path
                                d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                            </path>
                            <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                width="4" height="8"></rect>
                        </svg>
                    </button>
                </form>
                <div id="ajaxSearchResults-mb" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                    <div class="resultsContent"></div>
                </div>
            </div>
        </div>
    </header>
</div>
