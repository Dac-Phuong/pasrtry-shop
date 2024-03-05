<div class="modal fade" id="kt_modal_update" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <div class="card-header mt-2 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $label }}</h4>
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
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit.prevent="submit"
                    enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    <!--begin::Input group-->
                    <div class="mb-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-user">Tiêu đề bài viết</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-user"></i></span>
                                    <input type="text" id="basic-icon-default-user" wire:model.defer="title"
                                        class="form-control" placeholder="Nhập họ và tên" fdprocessedid="40irmg">
                                </div>
                                @error('title')
                                    <span class="error text-danger fs-7">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn ảnh đại diện</label>
                                <input type="file" wire:model.defer="image" class="form-control">
                                @error('image')
                                    <span class="error text-danger fs-7">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3" wire:ignore>
                                <label class="form-label">Mô tả ngắn</label>
                                <textarea class="form-control" wire:model.defer="description" rows="2"></textarea>
                                @error('description')
                                    <span class="error text-danger fs-7">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3" wire:ignore>
                                <label class="form-label">Nội dung bài viết</label>
                                <textarea id="my-ckeditor" class="form-control" wire:model.defer="content" rows="4">{{ $content }}</textarea>
                                @error('content')
                                    <span class="error text-danger fs-7">{{ $message }}</span>
                                @enderror
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

@push('scripts')
    <script>
        let editor;
        ClassicEditor
            .create(document.querySelector('#my-ckeditor'))
            .then(leditor => {
                editor = leditor;
                leditor.model.document.on('change:data', () => {
                    @this.set('content', leditor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
        document.addEventListener("livewire:init", function() {
            Livewire.on("empty", function(empty) {
                editor.setData('');
            });
            Livewire.on("data", function(data) {
                editor.setData(data[0]);
            });
        });
    </script>
@endpush
