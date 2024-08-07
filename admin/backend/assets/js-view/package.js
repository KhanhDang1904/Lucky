$(document).ready(function () {
    $(document).on('click', '.btn-create', function (event) {
        event.preventDefault();
        AjaxGet('/admin/package/add', function (data) {
            $("#packageModal").modal("show").find('.modal-body').html(data);
            loadNumber()
        })
    })
    $(document).on('click', '.btn-save', function (event) {
        event.preventDefault();
        AjaxPost('/admin/package/save', function (data) {
            toastr.success(data.message, {
                CloseButton: true,
                ProgressBar: true
            });
            setTimeout(function () {
                location.reload();
            },1000)
        }, new FormData($("#packageModal form")[0]))
    })
    $(document).on('click', '.btn-edit', function (event) {
        event.preventDefault();
        AjaxGet('/admin/package/edit?id='+$(this).data('value'), function (data) {
            $("#packageModal").modal("show").find('.modal-body').html(data);
            loadNumber()
        })
    })
    $(document).on('click', '.btn-delete', function (event) {
        event.preventDefault();
        deleteRow('/admin/package/delete',$(this).data('value'))

    })
})

