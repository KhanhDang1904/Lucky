$(document).ready(function () {
    $(".select2").select2()
    $(document).on('click', '.btn-history', function (event) {
        event.preventDefault();
        callHistory('/admin/user/history?id=' + $(this).data('value'),"#historyModal .modal-body");
    })
    $(document).on('click', '.btn-gift', function (event) {
        event.preventDefault();
        callGift('/admin/user/gift?id=' + $(this).data('value'),"#giftModal .modal-body");
    })
    $(document).on('click', '.btn-package', function (event) {
        event.preventDefault();
        callPackage('/admin/user/package?id=' + $(this).data('value'),"#packageModal .modal-body");
    })
    $(document).on('click', '.btn-success-gift', function (event) {
        event.preventDefault();
        $id = $(this).attr('data-id');
        $data = new FormData()
        $data.append('id', $(this).data('value'))
        $data.append('_csrf-backend', $("#token_form").val())
        AjaxPost('/admin/user/update-gift?',function(data){
            toastr.success("Give gift successfully", {
                CloseButton: true,
                ProgressBar: true
            });
            callGift('/admin/user/gift?id=' + $id,"#giftModal .modal-body");
            if ($(".select2").length>0){
                setTimeout(function () {
                    location.reload();
                },1000)
            }
        },$data)
    })
})

function callHistory($url, $elm) {
    AjaxGet($url, function (data) {
        $("#historyModal").modal("show").find('.modal-body').html(data);
        pagination($elm, 'callHistory')
    });
}
function callGift($url, $elm) {
    AjaxGet($url, function (data) {
        $("#giftModal").modal("show").find('.modal-body').html(data);
        pagination($elm, 'callGift')
    });
}
function callPackage($url, $elm) {
    AjaxGet($url, function (data) {
        $("#packageModal").modal("show").find('.modal-body').html(data);
        pagination($elm, 'callPackage')
    });
}