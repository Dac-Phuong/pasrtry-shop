@extends('admin.layouts.master')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y p-0">
        <div class="app-ecommerce">
            <form class="form" action="{{ route('post-create-product') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Add Product -->
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h4 class="mb-1 mt-3">Thêm một sản phẩm mới</h4>
                        <p class="text-muted">Đơn đặt hàng được đặt trên cửa hàng của bạn</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <div class="d-flex gap-3">
                            <a href={{ url('admin/list-product') }} class="btn btn-label-secondary waves-effect"
                                fdprocessedid="xbelb8">Trở lại</a>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" fdprocessedid="ykmlqe"> Lưu
                            sản phẩm
                        </button>
                    </div>

                </div>
                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Thông tin sản phẩm</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="ecommerce-product-name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="ecommerce-product-name"
                                        placeholder="Nhập tên sản phẩm" name="name" aria-label="Nhập tên sản phẩm"
                                        fdprocessedid="bmjsvr">
                                    @error('name')
                                        <span class="error text-danger fs-7">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col"><label class="form-label" for="ecommerce-product-barcode">Giá sản
                                            phẩm</label>
                                        <input type="number" class="form-control" placeholder="Nhập giả sản phẩm"
                                            name="price">
                                        @error('price')
                                            <span class="error text-danger fs-7">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col"><label class="form-label" for="ecommerce-product-sku">Khuyến mãi (%)
                                        </label>
                                        <input type="number" class="form-control" id="ecommerce-product-sku"
                                            placeholder="Nhập % khuyến mãi" value="0" name="sale"
                                            aria-label="Product SKU" fdprocessedid="y615ne">
                                        @error('sale')
                                            <span class="error text-danger fs-7">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- Description -->
                                <div>
                                    <label class="form-label">Mô tả (không bắt buộc)</label>
                                    <textarea id="editor" class="form-control" name="description" id="bs-validation-bio" name="bs-validation-bio"
                                        rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Information -->

                    </div>
                    <!-- /Second column -->

                    <!-- Second column -->
                    <div class="col-12 col-lg-4">
                        <!-- Organize Card -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Category -->
                                <div class="mb-3">
                                    <label class="form-label" for="ecommerce-category-image">Ảnh đại diện</label>
                                    <input class="form-control" name="file_upload" type="file"
                                        id="ecommerce-category-image">
                                    @error('file_upload')
                                        <span class="error text-danger fs-7">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col ecommerce-select2-dropdown">
                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                        <label class="form-label mb-1" for="status-org">Danh mục sản phẩm
                                        </label>
                                        <div class="position-relative">
                                            <select class="select form-select" name="category_id" requied tabindex="-1">
                                                <option value="">Chọn danh mục</option>
                                                @if (isset($list_category))
                                                    @foreach ($list_category as $key => $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('category_id')
                                                <span class="error text-danger fs-7">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col ecommerce-select2-dropdown">
                                    <div class="mb-3 col ecommerce-select2-dropdown">
                                        <label class="form-label mb-1" for="status-org">Phân loại
                                        </label>
                                        <div class="position-relative">
                                            <select class="select form-select" name="type">
                                                <option value="0">Loại thường</option>
                                                <option value="1">Hộp bánh</option>
                                            </select>
                                            @error('type')
                                                <span class="error text-danger fs-7">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="mb-3 col ecommerce-select2-dropdown">
                                    <label class="form-label mb-1" for="status-org">Trạng thái
                                    </label>
                                    <div class="position-relative">
                                        <select class="select form-select " name="status" tabindex="-1">
                                            <option value="1">Hiện sản phẩm</option>
                                            <option value="0">Ẩn sản phẩm</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /Organize Card -->
                    </div>
                    <!-- /Second column -->
                </div>
            </form>
        </div>
    </div>
@endsection
