<?php

use backend\models\search\DailyQuestSearch;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel DailyQuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Daily quest manager';
$this->params['breadcrumbs'][] = $this->title;
$this->params['active_menu'] = 'daily-quest';
echo  $this->render('_modal');
CrudAsset::register($this);
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
                ['content' =>
                    '<form class="mr-4" action="/admin/user">'.
                    Html::textInput('DailyQuestSearch[title]',(isset($_GET['DailyQuestSearch']['title'])?$_GET['DailyQuestSearch']['title']:''), ['class' => 'form-control','onchange'=>'$(this).parent().submit()', 'placeholder' => 'Search by title']).
                    '</form>'.
                    Html::a('<span class="bi bi-plus-circle"></span> Create','#', ['class' => 'btn btn-primary btn-border-radius btn-create', 'title' => 'Create'])
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
                'heading' => '<i class="bi bi-list"></i> <span class="text-primary">Daily Quest list</span>'
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
<script src="<?=Yii::$app->request->baseUrl . '/backend/assets/js-view/daily-quest.js'?>"></script>
