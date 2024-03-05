// update
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.querySelector("#kt_modal_update");
    if (modal) {
        modal.addEventListener("show.bs.modal", (e) => {
            Livewire.dispatch("update", {
                id: e.relatedTarget.getAttribute("data-id"),
            });
        });
    }
});

// delete
document
    .querySelectorAll('[data-kt-action="delete_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function (e) {
            swal.fire({
                text: "Bạn có chắc chắn muốn xóa không?",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch("delete", {
                        id: this.getAttribute("data-id"),
                    });
                }
            });
        });
    });

document.addEventListener("livewire:init", function () {
    Livewire.on("success", function (success) {
        $("#kt_modal_add").modal("hide");
        $("#kt_modal_update").modal("hide");
        toastr.options = {
            closeButton: true,
            progressBar: true,
        };
        toastr.success(success);
    });
});

document.addEventListener("livewire:init", function () {
    Livewire.on("error", function (error) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
        };
        toastr.error(error);
    });
});
