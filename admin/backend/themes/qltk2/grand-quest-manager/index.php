<?php

use backend\models\search\QuestSearch;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel QuestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Grand quest manager';
$this->params['breadcrumbs'][] = $this->title;
$this->params['active_menu'] = 'grand-quest';
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
                    '<form class="mr-4" action="/admin/grand-quest-manager">'.
                    Html::textInput('QuestSearch[title]',(isset($_GET['QuestSearch']['title'])?$_GET['QuestSearch']['title']:''), ['class' => 'form-control','onchange'=>'$(this).parent().submit()', 'placeholder' => 'Search by title']).
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
                'heading' => ' <span class="text-primary">Grand Quest list</span>'
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
<script src="<?=Yii::$app->request->baseUrl . '/backend/assets/js-view/grand-quest.js'?>"></script>
