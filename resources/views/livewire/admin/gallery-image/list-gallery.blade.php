<!-- Responsive Datatable -->
<div class="card">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header">Danh sách Gallery</h5>
        <button class="dt-button add-new btn btn-primary ms-2 waves-effect waves-light" style="margin-right:24px"
            type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add">
            <span>
                <i class="ti ti-plus ti-xs me-0 me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Thêm mới</span>
            </span>
        </button>
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
                    <th>Ảnh gallery</th>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th style="width:80px">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($list_gallery) > 0)
                    @foreach ($list_gallery as $key => $gallery)
                        <tr class="odd">
                            <td>{{ ++$key }}</td>
                            <td><img src="{{ asset('storage/gallery_images/' . $gallery->image) }}" alt=""
                                    width="100px" height="50px" style="object-fit: cover"></td>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <button data-kt-action="update" data-id={{ $gallery->id }}
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_update"
                                            class="dropdown-item"><i class="ti ti-pencil me-1"></i> Sửa</button>
                                        <button wire:click="delete({{ $gallery->id }})" class="dropdown-item"
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
            {{ $list_gallery->links() }}
        </div>
    </div>
</div>
</div>
