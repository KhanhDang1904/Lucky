<?php

use backend\models\HistoryReward;
use backend\models\Package;
use backend\models\search\HistorySearch;
use yii\helpers\Url;
/* @var $searchModel HistorySearch */

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
            /**@var $model Package*/
            return '<img class="size-image" src="'.$model->image.'" alt="">';
        },
        'format' => 'raw',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
        'label' => 'Title',
        'headerOptions' => ['class' => 'text-primary'],
        'value' => function($model){
            /**@var $model Package*/
            return '<strong class="text-primary">'.$model->title.'</strong>'.'<br>'.'<small>'.$model->note.'</small>';
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
            return number_format($model->total_spin);
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
            return number_format($model->price);
        }

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'label'=>'Status',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-center'],
        'value' => function($model){
            return $model->status==1?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Locked</span>';
        },
        'format' => 'raw',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date',
        'label'=>'Date',
        'headerOptions' => ['class' => 'text-primary', 'width' => '1%'],
        'contentOptions' => ['class' => 'text-center'],
        'value' => function($model){
            return date('d-m-Y', strtotime($model->created));
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'',
        'label'=>'Action',
        'headerOptions' => ['width' => '3%','class'=>'text-primary text-center'],
        'contentOptions' => ['class' => 'text-center text-nowrap'],
        'value'=>function ($model) {
            return '<a href="#" class="btn-edit text-warning mr-4" title="Edit" data-value="'.$model->id.'"><i class="bi bi-pencil-square"></i></a>'
                .'<a href="#" class="btn-delete text-danger mr-4" title="Delete" data-value="'.$model->id.'"><i class="bi bi-trash-fill"></i></a>';
        },
        'format'=>'raw',
    ],

];
?>

