    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                            fill="#7367F0" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                            fill="#7367F0" />
                    </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bold">ND's Bakery</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('dashboard') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Bảng điều khiển">Bảng điều khiển</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <div data-i18n="Thống kê">Thống kê</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Layouts -->
            @can('list-customer')
                <li class="menu-item {{ request()->routeIs('customers') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Quản lý khách hàng">Quản lý khách hàng</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('customers') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-customer') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            <li class="menu-item {{ request()->routeIs('users') || request()->routeIs('roles') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Quản lý phân quyền">Quản lý phân quyền</div>
                </a>
                <ul class="menu-sub">
                    @can('list-user')
                        <li class="menu-item {{ request()->routeIs('users') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-user') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    @endcan
                    @can('list-role')
                        <li class="menu-item {{ request()->routeIs('roles') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-role') }}" class="menu-link">
                                <div data-i18n="Vai trò">Vai trò</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @can('list-category')
                <li class="menu-item {{ request()->routeIs('category') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon ti ti-category"></i>
                        <div data-i18n="Quản lý danh mục">Quản lý danh mục</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('category') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-category') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('list-product')
                <li
                    class="menu-item {{ request()->routeIs('list-product') || request()->routeIs('create-product') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon ti ti-brand-producthunt"></i>
                        <div data-i18n="Quản lý sản phẩm">Quản lý sản phẩm</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('list-product') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-product') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('list-order')
                <li class="menu-item {{ request()->routeIs('list-order') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon ti ti-garden-cart"></i>
                        <div data-i18n="Quản lý đơn hàng">Quản lý đơn hàng </div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('list-order') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-order') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('list-posts')
                <li class="menu-item {{ request()->routeIs('list-posts') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon ti ti-file-pencil"></i>
                        <div data-i18n="Quản lý bài viết">Quản lý bài viết</div>

                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('list-posts') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-posts') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('list-banner')
                <li class="menu-item {{ request()->routeIs('list-gallery-images') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon ti ti-photo-filled"></i>
                        <div data-i18n="Quản lý ảnh Gallery">Quản lý ảnh Gallery</div>

                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('list-gallery-images') ? 'active' : '' }}">
                            <a href="{{ url('admin/list-gallery-images') }}" class="menu-link">
                                <div data-i18n="Danh sách">Danh sách</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

        </ul>

    </aside>
