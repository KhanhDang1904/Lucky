$(document).ready(function () {
    $(document).on('click', '.btn-create', function (event) {
        event.preventDefault();
        AjaxGet('/admin/daily-quest-manager/add', function (data) {
            $("#DailyQuestModal").modal("show").find('.modal-body').html(data);
        })
    })
    $(document).on('click', '.btn-save', function (event) {
        event.preventDefault();
        AjaxPost('/admin/daily-quest-manager/save', function (data) {
            toastr.success(data.message, {
                CloseButton: true,
                ProgressBar: true
            });
            setTimeout(function () {
                location.reload();
            },1000)
        }, new FormData($("#DailyQuestModal form")[0]))
    })
    $(document).on('click', '.btn-edit', function (event) {
        event.preventDefault();
        AjaxGet('/admin/daily-quest-manager/edit?id='+$(this).data('value'), function (data) {
            $("#DailyQuestModal").modal("show").find('.modal-body').html(data);
        })
    })
    $(document).on('click', '.btn-delete', function (event) {
        event.preventDefault();
        deleteRow('/admin/daily-quest-manager/delete',$(this).data('value'))

    })
})

