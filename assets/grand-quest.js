$(document).ready(function () {    loadDailyQuestion()    $(document).on('click',".btn-go-now",function (){        Ajax('/admin/daily-quest/update', function (data) {            loadDailyQuestion()        },{id:$(this).attr('data-id')})    })})function loadDailyQuestion() {    Ajax('/admin/quest', function (data) {        $str = ''        $.each(data.data, function (i, item) {            $str += `<div class="col-6 mb-4">              <div class="card mb-3 `+(item.active?'finish':'')+` vertical-card">                <h5 class="card-times" data-translate="Log in 7 days">                  `+item.total_press+`/`+item.total_success+`                </h5>                <div class="box-img-card">                  <img src=".`+item.image+`" class="img-fluid rounded-start img-card" alt="...">                  `+(item.active?'<img src="./assets/lucky/img/white-finish.png" class="img-finish" alt="finish">':'')+`                </div>                <div class="card-body text-center">                    <h5 class="card-title ">`+item.title+`</h5>                    <span class="price fw-bold `+(!item.active?'text-primary':'')+`" data-translate="spin">`+item.quantity_spin+` spin</span>                </div>              </div>            </div>`        })        $("#pills-home .row").html($str)    })}// Sử dụng hàm