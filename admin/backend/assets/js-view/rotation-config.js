$(document).ready(function () {
    $(document).on('click', '.btn-create', function (event) {
        event.preventDefault();
        AjaxGet('/admin/wheel/add', function (data) {
            $("#wheelModal").modal("show").find('.modal-body').html(data);
            loadNumber()
        })
    })
    $(document).on('click', '.btn-save', function (event) {
        event.preventDefault();
        AjaxPost('/admin/wheel/save', function (data) {
            toastr.success(data.message, {
                CloseButton: true,
                ProgressBar: true
            });
            setTimeout(function () {
                location.reload();
            },1000)
        }, new FormData($("#wheelModal form")[0]))
    })
    $(document).on('click', '.btn-edit', function (event) {
        event.preventDefault();
        AjaxGet('/admin/wheel/edit?id='+$(this).data('value'), function (data) {
            $("#wheelModal").modal("show").find('.modal-body').html(data);
            loadNumber()
        })
    })
    $(document).on('click', '.btn-delete', function (event) {
        event.preventDefault();
        deleteRow('/admin/wheel/delete',$(this).data('value'))

    })
})

