<div class="modal fade" id="kt_modal_update" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <div class="card-header mt-2 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Thư viện ảnh sản phẩm</h4>
                </div>
                <!--end::Modal title-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </div>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body mb-3">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit.prevent="addImages"
                    enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <!--begin::Input group-->
                    <div class="mb-4">
                        <div class=" w-100 m-auto ">
                            @if (!empty($product->gallery_images))
                                <div class="image-gallery pb-4 d-flex flex-wrap">
                                    @foreach (json_decode($product->gallery_images) as $index => $image)
                                        <div class="w-20 border" style="position:relative">
                                            <img width="100px" height="100px"
                                                src="{{ asset('storage/gallery_images/' . $image) }}"
                                                alt="Product Image">
                                            <div class="btn-delete-image" wire:click="deleteImage({{ $index }})">
                                                <i class="ti ti-square-rounded-x"></i></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="custom-file-input ">
                                <label for="fileInput"><i class="ti ti-download ml-2"></i></label>
                                <input wire:model.defer="gallery_images" type="file" id="fileInput"
                                    name="fileInput" />
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                            wire:loading.attr="disabled">Hủy</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Lưu</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                ...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
