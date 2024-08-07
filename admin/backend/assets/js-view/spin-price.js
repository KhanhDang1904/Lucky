$(document).ready(function () {
    $(document).on('click', '.btn-create', function (event) {
        event.preventDefault();
        AjaxGet('/admin/spin-price/add', function (data) {
            $("#SpinPriceModal").modal("show").find('.modal-body').html(data);
            loadNumber()
        })
    })
    $(document).on('click', '.btn-save', function (event) {
        event.preventDefault();
        AjaxPost('/admin/spin-price/save', function (data) {
            toastr.success(data.message, {
                CloseButton: true,
                ProgressBar: true
            });
            setTimeout(function () {
                location.reload();
            },1000)
        }, new FormData($("#SpinPriceModal form")[0]))
    })
    $(document).on('click', '.btn-edit', function (event) {
        event.preventDefault();
        AjaxGet('/admin/spin-price/edit?id='+$(this).data('value'), function (data) {
            $("#SpinPriceModal").modal("show").find('.modal-body').html(data);
            loadNumber()
        })
    })
    $(document).on('click', '.btn-delete', function (event) {
        event.preventDefault();
        deleteRow('/admin/spin-price/delete',$(this).data('value'))

    })
})

