<div class="modal fade" id="kt_modal_update" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered " style="min-width:750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header mb-3" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <div class="card-header px-0 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Thêm vai trò mới</h4>
                </div>
                <!--end::Modal title-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </div>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-0 mb-4">
                <!--begin::Form-->
                <form wire:submit.prevent="submit" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="col-12 mb-3 fv-plugins-icon-container">
                        <label class="form-label fs-6" for="modalRoleName">Tên vai trò</label>
                        <input type="text" id="modalRoleName" required wire:model.defer="role_name"
                            class="form-control" placeholder="Nhập tên vai trò" tabindex="-1">
                        @error('role')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div
                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="col-12">
                        <h5>Quyền của vai trò</h5>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quyền truy cập của quản trị viên <i
                                                class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                aria-label="Cho phép truy cập đầy đủ vào hệ thống"
                                                data-bs-original-title="Cho phép truy cập đầy đủ vào hệ thống"></i></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                                <label class="form-check-label" for="selectAll">
                                                    Chọn tất cả
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý người dùng</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-user" id="userManagementView">
                                                    <label class="form-check-label" for="userManagementView">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-user" id="userManagementRead">
                                                    <label class="form-check-label" for="userManagementRead">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-user" id="userManagementWrite">
                                                    <label class="form-check-label" for="userManagementWrite">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-user" id="userManagementCreate">
                                                    <label class="form-check-label" for="userManagementCreate">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý khách hàng</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-customer" id="customerManagement">
                                                    <label class="form-check-label" for="customerManagement">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-customer"
                                                        id="customerManagementAdd">
                                                    <label class="form-check-label" for="customerManagementAdd">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-customer"
                                                        id="customerManagementUpdate">
                                                    <label class="form-check-label" for="customerManagementUpdate">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-customer"
                                                        id="customerManagementDelete">
                                                    <label class="form-check-label" for="customerManagementDelete">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý sản phẩm</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-product" id="productView">
                                                    <label class="form-check-label" for="productView">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-product"
                                                        id="contentManagementRead">
                                                    <label class="form-check-label" for="contentManagementRead">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-product"
                                                        id="contentManagementWrite">
                                                    <label class="form-check-label" for="contentManagementWrite">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-product"
                                                        id="contentManagementCreate">
                                                    <label class="form-check-label" for="contentManagementCreate">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý vai trò</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-role" id="roleView">
                                                    <label class="form-check-label" for="roleView">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-role" id="dispManagementRead">
                                                    <label class="form-check-label" for="dispManagementRead">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-role" id="dispManagementWrite">
                                                    <label class="form-check-label" for="dispManagementWrite">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-role"
                                                        id="dispManagementCreate">
                                                    <label class="form-check-label" for="dispManagementCreate">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý danh mục</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-category" id="roleViewCategory">
                                                    <label class="form-check-label" for="roleViewCategory">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-category"
                                                        id="dbManagementRead">
                                                    <label class="form-check-label" for="dbManagementRead">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-category"
                                                        id="dbManagementWrite">
                                                    <label class="form-check-label" for="dbManagementWrite">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-category"
                                                        id="dbManagementCreate">
                                                    <label class="form-check-label" for="dbManagementCreate">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý bài viết</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-posts" id="reportingRead">
                                                    <label class="form-check-label" for="reportingRead">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-posts" id="reportingAdd">
                                                    <label class="form-check-label" for="reportingAdd">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-posts" id="reportingWrite">
                                                    <label class="form-check-label" for="reportingWrite">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-posts" id="reportingCreate">
                                                    <label class="form-check-label" for="reportingCreate">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý Banner</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-banner" id="apiRead">
                                                    <label class="form-check-label" for="apiRead">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-banner" id="apiWrite">
                                                    <label class="form-check-label" for="apiWrite">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-banner" id="apiCreate">
                                                    <label class="form-check-label" for="apiCreate">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-banner" id="deleteBanner">
                                                    <label class="form-check-label" for="deleteBanner">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý liên hệ</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-contact" id="repoRead">
                                                    <label class="form-check-label" for="repoRead">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="create-contact" id="repoWrite">
                                                    <label class="form-check-label" for="repoWrite">
                                                        Thêm
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="update-contact" id="repoWrite">
                                                    <label class="form-check-label" for="repoWrite">
                                                        Sửa
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="delete-contact" id="repoCreate">
                                                    <label class="form-check-label" for="repoCreate">
                                                        Xóa
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Quản lý đơn hàng</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="list-order" id="finManagementRead">
                                                    <label class="form-check-label" for="finManagementRead">
                                                        Xem
                                                    </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="status-order" id="finManagementWrite">
                                                    <label class="form-check-label" for="finManagementWrite">
                                                        Quản lý trạng thái
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model.defer="permissions"
                                                        type="checkbox" value="detail-order"
                                                        id="finManagementCreate">
                                                    <label class="form-check-label" for="finManagementCreate">
                                                        xem chi tiết
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit"
                            class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Lưu</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                            aria-label="Close">hủy</button>
                    </div>
                    <input type="hidden">
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
