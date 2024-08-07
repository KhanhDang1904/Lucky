<?php
use yii\helpers\Url;
/* @var $searchModel \common\models\UserSearch */

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'STT',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hoten',
        'label' => 'Họ tên',
        'headerOptions' => ['class' => 'text-primary']

    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'dien_thoai',
        'label' => 'Điện thoại',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%']

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'total_spin',
        'label'=>'Spin',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-right'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'point',
        'label'=>'Point',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-right'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'role',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%']
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'',
        'label'=>'Action',
        'headerOptions' => ['width' => '3%','class'=>'text-primary text-center'],
        'contentOptions' => ['class' => 'text-center text-nowrap'],
        'value'=>function ($model) {
            return '<a href="#" class="btn-history mr-4" title="History" data-value="'.$model->id.'"><i class="bi bi-clock-history"></i></a>'
                .'<a href="#" class="btn-gift text-danger mr-4" title="Gift" data-value="'.$model->id.'"><i class="bi bi-gift"></i></a>'
                .'<a href="#" class="btn-package text-success" title="Buy package" data-value="'.$model->id.'"><i class="bi bi-cart-check"></i></a>'
                ;
        },
        'format'=>'raw',
    ],


];
?>

