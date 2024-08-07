<?php

use backend\models\PackageUser;
use backend\models\search\PackageUserSearch;
/* @var $searchModel PackageUserSearch */

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'STT',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'image',
        'label' => 'Image',
        'headerOptions' => ['class' => 'text-primary','width' => '1%'],
        'value' => function($model){
            /**@var $model PackageUser*/
            return '<img class="size-image" src="'.$model->package->image.'" alt="">';
        },
        'format' => 'raw',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
        'label' => 'Title',
        'headerOptions' => ['class' => 'text-primary'],
        'value' => function($model){
            /**@var $model PackageUser*/
            return $model->package->title;
        },
        'format' => 'raw',

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'total_spin',
        'label' => 'Spin',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'format' => 'raw',
        'contentOptions' => ['class' => 'text-right'],
        'value' => function($model){
            return number_format($model->package->total_spin);
        }

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'price',
        'label' => 'Price',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'format' => 'raw',
        'contentOptions' => ['class' => 'text-right'],
        'value' => function($model){
            return number_format($model->package->price);
        }

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date',
        'label'=>'Date',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-center'],
        'value' => function($model){
            return date('H:i d-m-Y', strtotime($model->created));
        }
    ],
];
?>

