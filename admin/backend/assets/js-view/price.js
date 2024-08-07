$(document).ready(function () {
    $(document).on('click', '.btn-create', function (event) {
        event.preventDefault();
        AjaxGet('/admin/price-manager/add', function (data) {
            $("#priceModal").modal("show").find('.modal-body').html(data);
            $('#price-note').tagsInput()
            $("#price-note_tag").attr('placeholder', $("#price-note").attr('placeholder'));
        })
    })
    $(document).on('click', '.btn-save', function (event) {
        event.preventDefault();
        AjaxPost('/admin/price-manager/save', function (data) {
            toastr.success(data.message, {
                CloseButton: true,
                ProgressBar: true
            });
            setTimeout(function () {
                location.reload();
            },1000)
        }, new FormData($("#priceModal form")[0]))
    })
    $(document).on('click', '.btn-edit', function (event) {
        event.preventDefault();
        AjaxGet('/admin/price-manager/edit?id='+$(this).data('value'), function (data) {
            $("#priceModal").modal("show").find('.modal-body').html(data);
            $('#price-note').tagsInput()
            $("#price-note_tag").attr('placeholder', $("#price-note").attr('placeholder'));
        })
    })
    $(document).on('click', '.btn-delete', function (event) {
        event.preventDefault();
        deleteRow('/admin/price-manager/delete',$(this).data('value'))

    })
})

