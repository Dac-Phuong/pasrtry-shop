<!-- Responsive Datatable -->
<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Danh sách sản phẩm</h5>
        <a href="{{ route('create-product') }}" class="dt-button add-new btn btn-primary ms-2 waves-effect waves-light"
            style="margin-right:24px">
            <span>
                <i class="ti ti-plus ti-xs me-0 me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Thêm mới</span>
            </span>
        </a>
    </div>
    <div class="col-md-2 ml-auto mr-3" style="margin-left:auto;margin-right:25px">
        <div class="input-group input-group-merge">
            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
            <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search..."
                aria-label="Search..." aria-describedby="basic-addon-search31" fdprocessedid="pjzbzc">
        </div>
    </div>
    <div class="table-responsive text-nowrap p-3 mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Khuyến mãi (%)</th>
                    <th>Loại sản phẩm</th>
                    <th>Thư viện ảnh</th>
                    <th>Đã bán</th>
                    <th style="width:80px">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($list_product) > 0)
                    @foreach ($list_product as $key => $product)
                        <tr class="odd">
                            <td>{{ ++$key }}</td>
                            <td><img src="/uploads/{{ $product->image }}" alt="" width="100px" height="50px"
                                    style="object-fit: contain"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price) }} vnđ</td>
                            <td>{{ $product->sale }} %</td>
                            @foreach ($list_category as $category)
                                @if ($product->category_id == $category->id)
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                @endif
                            @endforeach
                            <td><button type="button" data-kt-action="update" data-id={{ $product->id }}
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update"
                                    class="btn rounded-pill btn-primary waves-effect waves-light"
                                    fdprocessedid="01ot3">Gallery</button></td>
                            <td>{{ $product->number_sold }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('admin/edit-product', $product->id) }}"><i
                                                class="ti ti-pencil me-1"></i> Sửa</a>
                                        <button wire:click="delete({{ $product->id }})" class="dropdown-item"
                                            href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Xóa</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" style="text-align:center; color:red">
                            Không có dữ liệu.
                        </td>
                    </tr>
                @endif
        </table>
        <div class="mt-3">
            {{ $list_product->links() }}
        </div>
    </div>
</div>
