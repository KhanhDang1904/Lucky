<?php

use backend\models\search\HistorySearch;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Give gift';
$this->params['breadcrumbs'][] = $this->title;
$this->params['active_menu'] = 'give-gift';

?>
<div class="user-index">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'pjax' => true,
            'columns' => require(dirname(__DIR__) . '/user/modal/gift/_columns.php'),
            'toolbar' => [
                ['content' =>
                    '<form action="/admin/give-gift">'.
                    Html::dropDownList('HistorySearch[user_id]',(isset($_GET['HistorySearch']['user_id'])?$_GET['HistorySearch']['user_id']:null),[\yii\helpers\ArrayHelper::map(\common\models\User::find()->all(),'id','hoten')], ['class' => 'form-control select2','prompt'=>'-- Select user --','onchange'=>'$(this).parent().submit()']).
                    '</form>'
                ],
            ],
            'emptyText' => 'Data not found',
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'responsiveWrap' => false,
            'tableOptions' => ['class' => 'table table-borderd table-stripped text-nowrap'],
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="bi bi-list"></i> <span class="text-primary"> Give gift</span>'
            ],
            'summary' => "Show {begin} - {end} total count {totalCount}",

        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    'size' => Modal::SIZE_LARGE,
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>
<script src="<?=Yii::$app->request->baseUrl . '/backend/assets/js-view/user.js'?>"></script>
