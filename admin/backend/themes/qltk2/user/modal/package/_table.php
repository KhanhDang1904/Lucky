<?php

use backend\models\search\HistorySearch;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="user-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
            ],
            'emptyText' => 'Data not found',
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'responsiveWrap' => false,
            'tableOptions' => ['class' => 'table table-borderd table-stripped text-nowrap'],
        ]) ?>
    </div>
</div>
