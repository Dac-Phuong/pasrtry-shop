<div class="container-fluid" id="menu">
    <div class="flexContainer-header">
        <div class="header-upper-navbar  visible-sm visible-xs">
            <div class="header-action header-action_menu">
                <div class="header-action_text">
                    <a class="header-action__link header-action-toggle" href="javascript:void(0)" id="site-menu-handle"
                        aria-label="Menu" title="Menu">
                        <span class="hamburger-menu " aria-hidden="true">
                            <span class="bar"></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-upper-logo">
            <div class="header-logo wrap-logo" itemscope="" itemtype="http://schema.org/Organization">
                <a href="{{ url('/') }}" wire:navigate itemprop="url">
                    <img itemprop="logo" src="{{ asset('images/logo.png') }}" alt="Nguyễn Sơn Bakery"
                        class="img-responsive logoimg">
                </a>

            </div>
        </div>
        <div class="header-upper-search">
            <div class="header-search">
                <div class="search-box wpo-wrapper-search">
                    <div class="searchform-product ultimate-search">
                        <div class="wpo-search-inner">
                            <input required="" id="inputSearchAuto-3" class="input-search" name="q"
                                maxlength="40" autocomplete="off" wire:model.live.debounce.300ms="search" type="text"
                                size="20" placeholder="Tìm kiếm sản phẩm..." aria-label="input search">
                            <span class="close-search"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                    </path>
                                </svg></span>
                        </div>
                        <button type="submit" class="btn-search " id="search-header-btn" aria-label="Tìm kiếm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="20" height="20">
                                <path
                                    d="M37.613,36.293l-9.408-9.432a15.005,15.005,0,1,0-1.41,1.414L36.2,37.707A1,1,0,1,0,37.613,36.293ZM3.992,17A12.967,12.967,0,1,1,16.959,30,13,13,0,0,1,3.992,17Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    @if ($search != '')
                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults">
                            <div class="resultsContent">
                                @if (count($search_product) > 0)
                                    @foreach ($search_product as $key => $product)
                                        <div class="item-ult">
                                            <div class="thumbs">
                                                <a href="{{ url('products/detail/' . $product->id) }}" wire:navigate>
                                                    <img src="/uploads/{{ $product->image }}">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('products/detail/' . $product->id) }}"
                                                    wire:navigate>{{ $product->name }}</a>
                                                <p class="f-initial">
                                                    {{ number_format($product->price - ($product->sale / 100) * $product->price) }}₫
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="dataEmpty">
                                        Không có sản phẩm nào...
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="header-upper-icon">
            <div class="header-wrap-icon">
                <div class="header-action header-action_account">
                    <div class="header-action_text">
                        @if ($customer)
                            <button class="header-action__link  header-action-toggle " id="site-account-handle">
                                <span class="box-icon">
                                    <svg class="svg-ico-account" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="510px"
                                        height="510px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;"
                                        xml:space="preserve">
                                        <g>
                                            <g id="account-circle">
                                                <path
                                                    d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
                                                         c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
                                                         c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="box-icon--close">
                                        <svg viewBox="0 0 19 19" role="presentation">
                                            <path
                                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                                <a href="{{ url('account/information') }}" wire:navigate>
                                    <span class="box-text text-left">
                                        {{ $customer->full_name }}
                                        <span class="txtbl"> {{ $customer->email }}
                                        </span>
                                    </span>
                                </a>
                            </button>
                        @else
                            <button class="header-action__link  header-action-toggle " id="site-account-handle"
                                wire:click="toggleLogin">
                                <span class="box-icon">
                                    <svg class="svg-ico-account" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="510px"
                                        height="510px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;"
                                        xml:space="preserve">
                                        <g>
                                            <g id="account-circle">
                                                <path
                                                    d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
                                                         c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
                                                         c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="box-icon--close">
                                        <svg viewBox="0 0 19 19" role="presentation">
                                            <path
                                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                                <span class="box-text">
                                    Đăng nhập / Đăng ký
                                    <span class="txtbl">Tài khoản của tôi <i class="fa fa-angle-down"
                                            aria-hidden="true"></i></span>
                                </span>
                            </button>
                        @endif

                    </div>
                    @if ($isOpen)
                        <div class="header-action_dropdown" style="{{ $customer ? 'width: 100px;' : '' }}">
                            <span class="box-triangle">
                                <svg viewBox="0 0 20 9" role="presentation">
                                    <path
                                        d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                        fill="#ffffff"></path>
                                </svg>
                            </span>
                            <div class="header-dropdown_content"
                                style="{{ $customer ? 'padding: 15px 15px;' : '' }}">
                                <div class="site_account " id="siteNav-account">
                                    <div class="site_account_panel_list">
                                        <div id="header-login-panel"
                                            class="site_account_panel site_account_default is-selected">
                                            <header class="site_account_header">
                                                <h2 class="site_account_title heading">Đăng nhập tài khoản</h2>
                                                <p class="site_account_legend">Nhập email và mật khẩu của bạn:
                                                </p>
                                            </header>
                                            <div class="site_account_inner">
                                                <form accept-charset="UTF-8" action="#"
                                                    wire:submit.prevent="login" id="customer_login" method="post">
                                                    <input name="form_type" type="hidden" value="customer_login">
                                                    <input name="utf8" type="hidden" value="✓">

                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <div class="relative">
                                                            <input type="email" id="floating_outlined1"
                                                                wire:model.defer="email"
                                                                class=" block px-2.5 pb-2.5 pt-2 w-full text-sm text-black bg-transparent border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer"
                                                                placeholder=" " required
                                                                style="border: 1px solid #d4d6d8;" />
                                                            <label for="floating_outlined1"
                                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                                                        </div>
                                                        @error('email')
                                                            <span
                                                                class="error text-danger fs-7">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <div class="relative">
                                                            <input type="text" id="floating_outlined"
                                                                wire:model.defer="password"
                                                                class=" block px-2.5 pb-2.5 pt-2 w-full text-sm text-black bg-transparent border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer"
                                                                placeholder=" " required
                                                                style="border: 1px solid #d4d6d8;" />
                                                            <label for="floating_outlined"
                                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Mật
                                                                khẩu</label>
                                                        </div>

                                                        @error('password')
                                                            <span
                                                                class="error text-danger fs-7">{{ $message }}</span>
                                                        @enderror
                                                        <div class="sitebox-recaptcha">
                                                            This site is protected by reCAPTCHA and the Google
                                                            <a href="https://policies.google.com/privacy"
                                                                target="_blank" rel="noreferrer">Privacy
                                                                Policy</a>
                                                            and <a href="https://policies.google.com/terms"
                                                                target="_blank" rel="noreferrer">Terms of
                                                                Service</a> apply.
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="form__submit button dark"
                                                        id="form_submit-login">Đăng nhập</button>

                                                    <input id="0e9f24383eb54e93923cd7a122990890"
                                                        name="g-recaptcha-response" type="hidden"><noscript
                                                        src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></noscript><noscript>grecaptcha.ready(function()
                                                        {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-',
                                                        {action: 'submit'}).then(function(token)
                                                        {document.getElementById('0e9f24383eb54e93923cd7a122990890').value
                                                        = token;});});</noscript>
                                                </form>
                                                <div class="site_account_secondary-action">
                                                    <p>Khách hàng mới?
                                                        <button wire:click="toggleRegister" class="link">Tạo tài
                                                            khoản</button>
                                                    </p>
                                                    <p>Quên mật khẩu?
                                                        <button aria-controls="header-recover-panel"
                                                            class="js-link link">Khôi phục mật khẩu</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($isOpenRegister)
                        <div class="header-action_dropdown ">
                            <span class="box-triangle">
                                <svg viewBox="0 0 20 9" role="presentation">
                                    <path
                                        d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                        fill="#ffffff"></path>
                                </svg>
                            </span>
                            <div class="header-dropdown_content">
                                <div class="site_account " id="siteNav-account">
                                    <div class="site_account_panel_list">
                                        <div id="header-login-panel"
                                            class="site_account_panel site_account_default is-selected">
                                            <header class="site_account_header">
                                                <h2 class="site_account_title heading">Đăng ký tài khoản</h2>
                                                <p class="site_account_legend">Nhập họ tên , email và mật khẩu của bạn:
                                                </p>
                                            </header>
                                            <div class="site_account_inner mt-1">
                                                <form accept-charset="UTF-8" action="#"
                                                    wire:submit.prevent="register" id="customer_login">
                                                    <div
                                                        class="relative form__input-wrapper form__input-wrapper--labelled">
                                                        <input type="text" id="floating_outlined"
                                                            wire:model.defer="full_name"
                                                            class=" block px-2.5 pb-2.5 pt-2 w-full text-sm text-black bg-transparent border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer"
                                                            placeholder=" " required
                                                            style="border: 1px solid #d4d6d8;" />
                                                        <label for="floating_outlined"
                                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Họ
                                                            và tên</label>
                                                    </div>
                                                    @error('full_name')
                                                        <span class="error text-danger fs-7">{{ $message }}</span>
                                                    @enderror
                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <div class="relative">
                                                            <input type="text" id="floating_outlined1"
                                                                wire:model.defer="phone"
                                                                class=" block px-2.5 pb-2.5 pt-2 w-full text-sm text-black bg-transparent border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer"
                                                                placeholder=" " required
                                                                style="border: 1px solid #d4d6d8;" />
                                                            <label for="floating_outlined1"
                                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Số
                                                                điện thoại</label>
                                                        </div>
                                                        @error('phone')
                                                            <span
                                                                class="error text-danger fs-7">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <div class="relative">
                                                            <input type="text" id="floating_outlined2"
                                                                wire:model.defer="email"
                                                                class=" block px-2.5 pb-2.5 pt-2 w-full text-sm text-black bg-transparent border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer"
                                                                placeholder=" " required
                                                                style="border: 1px solid #d4d6d8;" />
                                                            <label for="floating_outlined2"
                                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                                                        </div>
                                                        @error('email')
                                                            <span
                                                                class="error text-danger fs-7">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <div class="relative">
                                                            <input type="text" id="floating_outlined3"
                                                                wire:model.defer="password"
                                                                class=" block px-2.5 pb-2.5 pt-2 w-full text-sm text-black bg-transparent border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer"
                                                                placeholder=" " required
                                                                style="border: 1px solid #d4d6d8;" />
                                                            <label for="floating_outlined3"
                                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-gray-600 peer-focus:dark:text-gray-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Mật
                                                                khẩu</label>
                                                        </div>
                                                        @error('password')
                                                            <span
                                                                class="error text-danger fs-7">{{ $message }}</span>
                                                        @enderror
                                                        <div class="sitebox-recaptcha">
                                                            This site is protected by reCAPTCHA and the Google
                                                            <a href="https://policies.google.com/privacy"
                                                                target="_blank" rel="noreferrer">Privacy
                                                                Policy</a>
                                                            and <a href="https://policies.google.com/terms"
                                                                target="_blank" rel="noreferrer">Terms of
                                                                Service</a> apply.
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="form__submit button dark"
                                                        id="form_submit-login">Đăng Ký</button>

                                                    <input id="0e9f24383eb54e93923cd7a122990890"
                                                        name="g-recaptcha-response" type="hidden"><noscript
                                                        src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></noscript><noscript>grecaptcha.ready(function()
                                                        {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-',
                                                        {action: 'submit'}).then(function(token)
                                                        {document.getElementById('0e9f24383eb54e93923cd7a122990890').value
                                                        = token;});});</noscript>
                                                </form>
                                                <div class="site_account_secondary-action">
                                                    <p>Quay lại?
                                                        <button wire:click="toggleLogin" class="link">Đăng
                                                            nhập</button>
                                                    </p>
                                                    <p>Quên mật khẩu?
                                                        <button aria-controls="header-recover-panel"
                                                            class="js-link link">Khôi phục mật khẩu</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="header-action header-action_cart">
                    <div class="header-action_text">
                        <button class="header-action__link header-action-toggle" wire:click="toggleCart">
                            <span class="box-icon">
                                <svg class="svg-ico-cart" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27"
                                    style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                    <g>
                                        <path d="M0,6v21h24V6H0z M22,25H2V8h20V25z"></path>
                                    </g>
                                    <g>
                                        <path d="M12,2c3,0,3,2.3,3,4h2c0-2.8-1-6-5-6S7,3.2,7,6h2C9,4.3,9,2,12,2z">
                                        </path>
                                    </g>
                                </svg>
                                <span class="box-icon--close">
                                    <svg viewBox="0 0 19 19" role="presentation">
                                        <path
                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                            fill="currentColor" fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span class="count-holder">
                                    <span class="count">{{ count($cart) }}</span>
                                </span>
                            </span>
                            <span class="box-text">
                                <span class="txtbl">Giỏ hàng</span>
                            </span>
                        </button>
                    </div>
                    @if ($isOpenCart)
                        <div class="header-action_dropdown" style="transition: none;transform: none; margin: 20px">
                            <span class="box-triangle">
                                <svg viewBox="0 0 20 9" role="presentation">
                                    <path
                                        d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                        fill="#ffffff"></path>
                                </svg>
                            </span>
                            <div class="header-dropdown_content">
                                <div class="site-cart">
                                    <div class="cart-ttbold">
                                        <p class="ttbold">Giỏ hàng</p>
                                    </div>
                                    <div class="cart-view clearfix">
                                        <div class="cart-view-scroll">
                                            <table id="clone-item-cart" class="table-clone-cart">
                                                <tbody>
                                                    <tr class="item_2 hidden">
                                                        <td class="img"><a href="" title=""><img
                                                                    src="" alt=""></a></td>
                                                        <td>
                                                            <p class="pro-title">
                                                                <a class="pro-title-view" href=""
                                                                    title=""></a>
                                                                <span class="variant"></span>
                                                            </p>
                                                            <div class="mini-cart_quantity">
                                                                <div class="pro-quantity-view"><span
                                                                        class="qty-value"></span>
                                                                </div>
                                                                <div class="pro-price-view"></div>
                                                            </div>
                                                            <div class="remove_link remove-cart"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table id="cart-view">
                                                <tbody>
                                                    @if (count($cart) <= 0)
                                                        <tr class="item-cart_empty">
                                                            <td>
                                                                <div class="svgico-mini-cart">
                                                                    <svg width="50" height="50"
                                                                        viewBox="0 0 81 70">
                                                                        <g transform="translate(0 2)" stroke-width="4"
                                                                            stroke="#1e2d7d" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <circle stroke-linecap="square"
                                                                                cx="34" cy="60" r="6">
                                                                            </circle>
                                                                            <circle stroke-linecap="square"
                                                                                cx="67" cy="60" r="6">
                                                                            </circle>
                                                                            <path
                                                                                d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                                            </path>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                                Hiện chưa có sản phẩm
                                                            </td>
                                                        </tr>
                                                    @elseif($customer)
                                                        @foreach ($cart as $key => $item)
                                                            @php
                                                                $total += ($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) * $item->quantity;
                                                            @endphp
                                                            <tr class="item_2 ">
                                                                <td class="img">
                                                                    <a
                                                                        href="{{ url('products/detail/' . $item['product']->id) }}">
                                                                        <img src="/uploads/{{ $item['product']->image }}"
                                                                            alt="Crepe Chocolate">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <p class="pro-title">
                                                                        <a class="pro-title-view"
                                                                            href="{{ url('products/detail/' . $item['product']->id) }}"
                                                                            title="Crepe Chocolate">{{ $item['product']->name }}</a>
                                                                    </p>
                                                                    <div class="mini-cart_quantity">
                                                                        <div class="pro-quantity-view">
                                                                            <span
                                                                                class="qty-value">{{ $item->quantity }}</span>
                                                                        </div>
                                                                        <div class="pro-price-view">
                                                                            {{ number_format($item['product']->price - ($item['product']->sale / 100) * $item['product']->price) }}₫
                                                                        </div>
                                                                    </div>
                                                                    <div class="remove_link remove-cart">
                                                                        <button
                                                                            wire:click="deleteCart({{ $item->id }})">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                x="0px" y="0px" viewBox="0 0 1000 1000"
                                                                                enable-background="new 0 0 1000 1000"
                                                                                xml:space="preserve">
                                                                                <g>
                                                                                    <path
                                                                                        d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z">
                                                                                    </path>
                                                                                </g>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="line"></div>
                                        <div class="cart-view-total">
                                            <table class="table-total">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left">TỔNG TIỀN:</td>
                                                        <td class="text-right" id="total-view-cart">
                                                            {{ number_format($total) }}₫
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="{{ url('cart') }}" wire:navigate
                                                                class="linktocart button dark">Xem giỏ
                                                                hàng</a>
                                                        </td>

                                                        <td><a href="{{ $customer && count($cart) > 0 ? url('checkout') : '' }}"
                                                                wire:navigate class="linktocheckout button dark">Thanh
                                                                toán</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
