function Ajax(url, callback = function () {
}, params = {}) {
    var token = 'C1xV2tT2MsigHdLUXVP8r7LjPshYtZ11';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: params,
        headers: {Authorization: `Bearer ${token}`},
        beforeSend: function () {
        },
        success: function (data) {
            if (data.status) {
                callback(data)
            } else {
                toastr.error(data.message, {CloseButton: true, ProgressBar: true});
            }
        },
        complete: function () {
        },
        error: function (r1, r2) {
            toastr.error(r1.responseJSON.message, {CloseButton: true, ProgressBar: true});
        }
    })
}

$(document).ready(function () {
    Ajax('/admin/setting/get-background', function (data) {
        $(".lucky-wheel").css('background', 'url(' + data.data + ')')
    })
    let language = localStorage.getItem('language') || 'en';
    changeLanguage(language)
})
function changeLanguage(lang) {
    fetch(`../assets/json/lang_${lang}.json`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            document.querySelectorAll("[data-translate]").forEach(elt => {
                elt.textContent = data[elt.getAttribute("data-translate")];
            });
        })
        .catch(e => {
            console.log('There was a problem with the fetch operation: ' + e.message);
        });
}