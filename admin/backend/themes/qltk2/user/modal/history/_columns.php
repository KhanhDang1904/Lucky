<?php

use backend\models\HistoryReward;
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
            /**@var $model HistoryReward*/
            return '<img class="size-image" src="'.$model->getReward()['image'].'" alt="">';
        },
        'format' => 'raw',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
        'label' => 'Title',
        'headerOptions' => ['class' => 'text-primary'],
        'value' => function($model){
            /**@var $model HistoryReward*/
            return $model->getReward()['title'];
        },
        'format' => 'raw',

    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'type',

        'label'=>'Type',
        'headerOptions' => ['class' => 'text-primary','width' => '1%'],
        'contentOptions' => ['class' => 'text-center'],
        'value' => function($model){
            return '<strong>'.$model->type.'</strong>';
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
            return date('H:i d-m-Y', strtotime($model->created));
        }
    ],
];
?>

